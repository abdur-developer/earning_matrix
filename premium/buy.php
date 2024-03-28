<?php
require '../includes/dbconnect.php';



if(isset($_REQUEST['buying'])){
    $plan_id = $_REQUEST['buying'];
    //$task = $_REQUEST['task'];
    //$validity = $_REQUEST['validity'];
    $balance = $_REQUEST['balance'];
    $daily_task = $_REQUEST['user_daily_task'];
    $sessionId = $_REQUEST['sessionId'];

    $sql = "SELECT * FROM premium WHERE id = $plan_id";
    $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    $tk = $row['price'];
    $task = $row['num_of_task'];
    $validity = $row['validity'];

    $amountList = [$row['1st'], $row['2nd'], $row['3rd'], $row['4th'], $row['5th']];
    //var_dump($amountList);

    if($balance >= $tk){
      $balance -= $tk;
      $daily_task += $task;
      $sql = "UPDATE users SET balance = '$balance', daily_task = '$daily_task' WHERE id = $sessionId";
      mysqli_query($conn, $sql);//update balance

      $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$sessionId', 'buy a plan', '$tk', '0')";
      mysqli_query($conn, $sql);//add trx history

      $sql = "INSERT INTO buy_plan (user_id, amount, validity, plan_id) VALUES ('$sessionId', '$tk', '$validity', '$plan_id')";

      if(mysqli_query($conn,$sql)){
        genaretionBonus($sessionId, $amountList);
        echo "<script> window.location.href='../home/?q=premium&success' ;</script>";
      }else{
        echo "<script> window.location.href='../home/?q=premium&failed' ;</script>";
      }
    }else{
      echo "<script> window.location.href='../home/?q=premium&failed' ;</script>";
    }
    ///////////////////////////////////////////////////
  }
  function genaretionBonus($userId, $amountList){
    require '../includes/dbconnect.php';
    $currentUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ot_ref_code FROM users WHERE id = $userId"));
    $othersCode = $currentUser['ot_ref_code'];
    
    for($x = 0; $x < 5; $x++){
      $sql = "SELECT id, balance, bonus, ot_ref_code FROM users WHERE my_ref_code = $othersCode";
      $quary = mysqli_query($conn, $sql);
      $num_of_row = mysqli_num_rows($quary);
      if($num_of_row < 1){
        break;
      }
      $user = mysqli_fetch_assoc($quary);
      $othersCode = $user['ot_ref_code'];
      $id = $user['id'];
      $balance = $user['balance'];
      $bonus = $user['bonus'];

      $amount = $amountList[$x];
      $balance += $amount;
      $bonus += $amount;
      $sql = "UPDATE users SET balance = '$balance', bonus = '$bonus' WHERE id = $id";
      mysqli_query($conn, $sql);//update balance

      $sql = "INSERT INTO trx_history (user_id, note, amount, is_add)
      VALUES ('$id', 'One bought a plan, for that $x generation bonus', '$amount', '1')";
      mysqli_query($conn, $sql);//add trx history

    }

  }
?>