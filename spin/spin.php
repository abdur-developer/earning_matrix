<?php 
require '../includes/dbconnect.php';
session_start();
$id = $_SESSION["id"];


if(isset($_REQUEST['number'])){
    $number = $_REQUEST['number'];
    //============================
    $sql = "SELECT balance FROM users WHERE id = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    
    
    if(mysqli_query($conn, $sql)){
        $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$id', 'you spent on spin', '10', '0')";
        mysqli_query($conn, $sql);//add trx history
        $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$id', 'win balance from spin', '$number', '1')";
        mysqli_query($conn, $sql);//add trx history

        $number += $row['balance'];
        $number -= 10;
        $sql = "UPDATE users SET balance = '$number', last_spin = NOW() WHERE id = '$id'";
        if(mysqli_query($conn, $sql)){//update balance
            header("location: ../home/?q=lucky");
        }
    }
    
 }
?>