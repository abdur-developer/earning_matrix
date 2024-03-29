<?php

if(isset($_REQUEST['name'])){
    

    require "../../../includes/dbconnect.php";
    
    $name = $_REQUEST['name'];
    $title = $_REQUEST['title'];
    $sell = $_REQUEST['sell'];
    $price = $_REQUEST['price'];
    $win = $_REQUEST['win'];

    $sql = "INSERT INTO lottary (title, sort_des, price, target, win_bonus)
    VALUES ('$name', '$title', '$price', '$sell', '$win');";
   
    if(mysqli_query($conn, $sql)){
        header("location: add.php?success");
    }else{
        header("location: add.php?error");
    }
}
?>