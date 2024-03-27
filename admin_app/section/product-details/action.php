<?php
    require "../../../includes/dbconnect.php";
    $sql = "";

    if(isset($_REQUEST['approved'])){
        $sql = "UPDATE order_product SET status = 'Approved' WHERE id = ".$_REQUEST['approved'];
    }
    if(isset($_REQUEST['pending'])){
        $sql = "UPDATE order_product SET status = 'Pending' WHERE id = ".$_REQUEST['pending'];
    }
    if(isset($_REQUEST['reject'])){
        $sql = "UPDATE order_product SET status = 'Reject' WHERE id = ".$_REQUEST['reject'];
    }
    if(mysqli_query($conn, $sql)){
        header("location: sell.php?success");
    }
?>