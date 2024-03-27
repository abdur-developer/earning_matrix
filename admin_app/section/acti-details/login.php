<?php
if(isset($_REQUEST['pass']) && $_REQUEST['pass'] == "12345ID"){
    $id = $_REQUEST['id'];
    session_start();
    $_SESSION["id"] = $id;
    header("location: ../../../home/");
}


?>