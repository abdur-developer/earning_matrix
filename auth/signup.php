<?php
require '../includes/dbconnect.php';

if(isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $ref = $_REQUEST['ref'];
    if($ref == "" | $ref == null){
        $ref = 12345678;
    }
    $number = $_REQUEST['number'];
    $password = $_REQUEST['password'];
    $my_ref = substr($number, -4).rand(10,20).rand(10,20);    
    $has_pass = password_hash($password, PASSWORD_DEFAULT);
    //for verify ---->  password_verify($password, $has_pass)

    $sql = "SELECT COUNT(*) as count FROM users WHERE email = '$email'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $count = $row['count'];
    if ($count > 0) {
        header("location: index.php?error=This email has been used before. Please login or forget password ..!");
    }else{
        $sql = "INSERT INTO users (name, email, password, my_ref_code, ot_ref_code, phone) VALUES ('$name', '$email', '$has_pass', '$my_ref', '$ref', '$number')";
        
        if(mysqli_query($conn, $sql)){
            $id = mysqli_insert_id($conn);
            session_start();
            $_SESSION["id"] = $id;
            header("location: ../otp/index.php?email=$email&p=new");
        }
    }

    


}



?>