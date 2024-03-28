<?php

if (isset ($_REQUEST['action'])) {
    require "../../../includes/dbconnect.php";
    $action = $_GET['action'];
    $id =$_GET['id'];
    $sql = "UPDATE lottary SET status = '$action' WHERE id = $id";

    if(mysqli_query($conn, $sql)){
        header("location: ../lott-sec.php?success");
    }else{
        header("location: ../lott-sec.php?error");
    }
}