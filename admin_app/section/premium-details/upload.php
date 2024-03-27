<?php

if(isset($_REQUEST['name'])){
    

    require "../../../includes/dbconnect.php";
    
    $name = $_REQUEST['name'];
    $price = $_REQUEST['price'];
    $num_task = $_REQUEST['num-task'];
    $task_in = $_REQUEST['task-in'];
    $_1st = $_REQUEST['1st'];
    $_2nd = $_REQUEST['2nd'];
    $_3rd = $_REQUEST['3rd'];
    $_4th = $_REQUEST['4th'];
    $_5th = $_REQUEST['5th'];
    $validity = $_REQUEST['validity'];

    $sql = "INSERT INTO premium (vip_name, price, num_of_task, task_earning, 1st, 2nd, 3rd, 4th, 5th, validity)
    VALUES ('$name', '$price', '$num_task', '$task_in', '$_1st', '$_2nd', '$_3rd', '$_4th', '$_5th', '$validity');";
   
    if(mysqli_query($conn, $sql)){
        header("location: add.php?success");
    }else{
        header("location: add.php?error");
    }
}
?>