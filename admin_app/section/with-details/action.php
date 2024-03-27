<?php
if(isset($_REQUEST['pass']) && $_REQUEST['pass'] == "12345ID"){
    $id = $_REQUEST['id'];
    $action = $_REQUEST['action'];
    require "../../../includes/dbconnect.php";
    $sql = "UPDATE withdraw SET status = '$action' WHERE id = $id";
    if(mysqli_query($conn, $sql)){
        header("location: index.php");
    }else{
        echo "Contact Developer";
    }
}


?>