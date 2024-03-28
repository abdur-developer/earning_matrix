<?php
if(isset($_GET['id'])){
    require '../../../includes/dbconnect.php';
    $sql = "DELETE FROM lottary WHERE id = ".$_GET['id'];
    if(mysqli_query($conn,$sql)){
        header("location: ../lottary-sec.php?success");
    }
}
?>