<?php
require "../../../includes/dbconnect.php";

if(isset($_REQUEST['email'])) {
	
    $email = $_REQUEST['email'];
    $type = $_REQUEST['type'];

    $sql = "INSERT INTO subscriber (email) VALUES ('$email')" ;

        if(mysqli_query($conn, $sql)){
            if($type == 'launch'){
                header("location: ../../?s");
            }else{
                header("location: ../../../?s");
            }
        }else{
            if($type == 'launch'){
                header("location: ../../?e");
            }else{
                header("location: ../../../?e");
            }
        }
}

?>