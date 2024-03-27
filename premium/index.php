<?php
require '../includes/dbconnect.php';
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT balance, daily_task FROM users WHERE id = $sessionId"));
$balance = $user['balance'];
$daily_task = $user['daily_task'];

if(isset($_REQUEST['buying'])){
    $tk = $_REQUEST['buying'];
    $plan_id = $_REQUEST['id'];
    $task = $_REQUEST['task'];
    $validity = $_REQUEST['validity'];

    if($balance >= $tk){
      $balance -= $tk;
      $daily_task += $task;
      $sql = "UPDATE users SET balance = '$balance', daily_task = '$daily_task' WHERE id = $sessionId";
      mysqli_query($conn, $sql);//update balance

      $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$sessionId', 'buy a plan', '$tk', '0')";
      mysqli_query($conn, $sql);//add trx history

      $sql = "INSERT INTO buy_plan (user_id, amount, validity) VALUES ('$sessionId', '$tk', '$validity')";

      if(mysqli_query($conn,$sql)){
        echo "<script> window.location.href='?q=premium&success' ;</script>";
      }else{
        echo "<script> window.location.href='?q=premium&failed' ;</script>";
      }
    }else{
      echo "<script> window.location.href='?q=premium&failed' ;</script>";
    }
  }elseif (isset($_REQUEST['success'])) { 
    echo "<script> Swal.fire({ title: 'Success...!', text: 'Successfully buying this plan.... you can buy many plan ...!', icon: 'success' }); </script>";

  }elseif (isset($_REQUEST['failed'])) { 
    echo "<script> Swal.fire({ title: 'Failed...!', text: 'Failed to buying this plan.... You don\'t have enough money ...!', icon: 'error' }); </script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <style>
        .vip-img {
            height: 100px;
            width: 100%;
        }
        .card-header {
            padding: 0%;
        }
        .card {
            margin-top: 15px;
        }
        .card:hover {
            box-shadow: 3px 3px 8px green;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header d-flex justify-content-center mt-3">
            <img src="../assets/images/task.jpg" class="img-fluid m-2" height="30px" width="30px">
            <h3 class="m-2 text-info">Premium Membership</h3>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php
                    $sql = "SELECT * FROM premium WHERE status='1'";
                    $query = mysqli_query($conn,$sql);
                    $num_of_rows = mysqli_num_rows($query);
                    if($num_of_rows > 0){
                        while($row = mysqli_fetch_array($query)){
                            $plan_id = $row['id'];
                            $price = $row['price'];
                            $num_of_task = $row['num_of_task'];
                            $task_in = $row['task_earning'];
                            $validity = $row['validity'];
                            $one = $row['1st'];
                            $two = $row['2nd'];
                            $three = $row['3rd'];
                            $four = $row['4th'];
                            $five = $row['5th'];
                            echo "<div class='col-md-6 col-lg-4 px-sm-3 mt-3'>
                            <div class='card'>
                                <div class='card-header'>
                                    <img src='../assets/images/lottary.jpg' class='vip-img img-fluid'>
                                </div>
                                <div class='card-footer'>
                                    <h4 class='text-center'>Price: ৳$price</h4>
                                    <p class='text-center text-white bg-danger rounded mx-3'>Extra Benefits</p>
                                    <ul>
                                        <li>Dayli: $num_of_task Guaranteed task</li>
                                        <li>Dayli Task Earning: ৳ $task_in</li>
                                        <li>Sponsor Income: ৳10</li>
                                        <li>1st Gen income: ৳$one</li>
                                        <li>2nd Gen income: ৳$two</li>
                                        <li>3rd Gen income: ৳$three</li>
                                        <li>4th Gen income: ৳$four</li>
                                        <li>5th Gen income: ৳$five</li>
                                        <li>Validity: <span class='text-center text-black bg-warning rounded px-3'>$validity days</span></li>
                                    </ul>
                                    <form action='' method='post'>
                                        <input type='hidden' name='q' value='premium'/>
                                        <input type='hidden' name='buying' value='$price'/>
                                        <input type='hidden' name='id' value='$plan_id'/>
                                        <input type='hidden' name='task' value='$num_of_task'/>
                                        <input type='hidden' name='validity' value='$validity'/>
                                        <button type='submit' class='btn btn-success text-white mt-3 w-100'>Buy Plan</button>
                                    </form>
                                </div>
                            </div>
                        </div>";
                        }
                    }else{
                        echo "
                    <div class='container-fluid'>
                        <img src='../assets/images/sorry.jpg' class='img-fluid d-block m-auto mt-4' width='80px' height='80px'>
                        <div class='text-danger mt-5'>
                            <p class='text-center small'><b>
                                আমরা আন্তরিক ভাবে দুঃখিত ! আমাদের Premium Membership বর্তমানে বন্ধ রয়েছে। <br> অতি শীঘ্রই আমাদের এই অপশনটি সচল হবে।<br> সচল হলে আপনাদের নোটিশ জানিয়ে দেওয়া হবে।
                            </b></p>
                        </div>
                    </div>";
                    }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>