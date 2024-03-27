<?php

if(isset($_REQUEST['title'])){
    $title = $_REQUEST['title'];
    $desc = $_REQUEST['desc'];
    $c_price = $_REQUEST['c_price'];
    $d_price = $_REQUEST['d_price'];
    $imgData = $_FILES['file'];
    $user_id = 000;

    require "../../../includes/dbconnect.php";



    $img_name = uniqid().$imgData['name'];
    $tmp_name = $imgData['tmp_name'];

    $sql = "INSERT INTO product (name, description, img, current_price, dis_price) VALUES ('$title', '$desc', '$img_name', '$c_price', '$d_price')";
    if($user_id == 000){
        $sql = "INSERT INTO product (name, description, img, current_price, dis_price, status) VALUES ('$title', '$desc', '$img_name', '$c_price', '$d_price', 'Approved')";
    }


    $location = "../../../assets/product/$img_name";
	if(move_uploaded_file($tmp_name,$location)){
        if(mysqli_query($conn, $sql)){
            header("location: add.php?success");
        }else{
            unlink($location);
            header("location: add.php?error");
        }
	}else{
        header("location: add.php?error");
    }
}
?>