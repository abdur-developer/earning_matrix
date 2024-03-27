<?php

if (isset ($_REQUEST['action'])) {
    require "../../../includes/dbconnect.php";
    $action = $_GET['action'];
    $id =$_GET['id'];
    $sql = "UPDATE premium SET status = '$action' WHERE id = $id";

    if(mysqli_query($conn, $sql)){
        header("location: ../premium-sec.php?success");
    }else{
        header("location: ../premium-sec.php?error");
    }
}