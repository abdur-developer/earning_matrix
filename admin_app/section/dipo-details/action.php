<?php
if(isset($_REQUEST['pass']) && $_REQUEST['pass'] == "12345ID"){
    $id = $_REQUEST['id'];
    $user_id = $_REQUEST['user_id'];
    $action = $_REQUEST['action'];
    $amount = $_REQUEST['amount'];

    require "../../../includes/dbconnect.php";

    if($action == "Ban"){
        $sql = "UPDATE deposit SET status = 'Ban' WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        
        header("location: index.php");
    }else if($action == "Approved"){

        $sql = "UPDATE deposit SET status = 'Approved' WHERE id = $id";// approved deposit status
        mysqli_query($conn, $sql);

        $sql = "SELECT balance FROM users WHERE id = $user_id";// get 1st get ref code
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));


        $balance = $row['balance'] + $amount;
        $sql = "UPDATE users SET balance = '$balance' WHERE id = $user_id";
        mysqli_query($conn, $sql); //update balance

        $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$user_id', 'diposite balance $amount', '35', '1')";
        mysqli_query($conn, $sql); //add trx history

        header("location: index.php");
    }else echo "No action, contact developer";


























}


?>