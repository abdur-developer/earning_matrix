<?php
if(isset($_GET['id'])){
    require '../../../includes/dbconnect.php';
    $sql = "DELETE FROM task WHERE id = ".$_GET['id'];
    if(mysqli_query($conn,$sql)){
        header("location: index.php");
    }
}
?>