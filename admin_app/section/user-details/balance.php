<?php
if(isset($_REQUEST['id'])){

    $id = $_REQUEST['id'];
    $action = $_REQUEST['action'];
    $input_balance = $_REQUEST['in_bl'];
    $balance = $_REQUEST['balance'];

    if($action == 'add'){
        $balance += $input_balance;
    }else{
        $balance -= $input_balance;
    }

    require "../../../includes/dbconnect.php";
    $sql = "UPDATE users SET balance = '$balance' WHERE id = $id";
    if(mysqli_query($conn, $sql)){
        header("location: index.php");
    }else{
        echo "Contact Developer";
    }
}


?>