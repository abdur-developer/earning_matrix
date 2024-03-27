<?php
if(isset($_REQUEST['email'])){
    $email = $_REQUEST['email'];
    $pass =$_REQUEST['password'];

    require '../includes/dbconnect.php';
    $sql = "SELECT COUNT(*) as count FROM users WHERE email = '$email'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $count = $row['count'];
    if ($count > 0) {
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $id = $row['id'];
        $has_pass = $row['password'];

        if(password_verify($pass, $has_pass)){
            session_start();
            $time = 60 * 60 * 24 * 2 ; // 2 days
            ini_set('session.gc_maxlifetime', $time);
            ini_set('session.cookie_lifetime', $time);
            $_SESSION["id"] = $id;
            session_write_close();
            header("location: ../home/");
        }else{
            header("location: index.php?error=password wrong..try again/forget password ..!");
        }
    }else{
        header("location: index.php?error=Email not found on our database..!");
    }
}
?>