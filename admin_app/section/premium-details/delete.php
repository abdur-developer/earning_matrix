<?php
if(isset($_GET['id'])){
    require '../../../includes/dbconnect.php';
    $sql = "DELETE FROM premium WHERE id = ".$_GET['id'];
    if(mysqli_query($conn,$sql)){
        header("location: ../premium-sec.php");
    }
}
?>