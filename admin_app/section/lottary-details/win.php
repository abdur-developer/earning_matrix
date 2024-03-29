<?php



if(isset($_REQUEST['winner_id']) && isset($_REQUEST['lottary_id'])){
    require "../../../includes/dbconnect.php";

    $winner_id = $_REQUEST['winner_id'];
    $lottary_id = $_REQUEST['lottary_id'];

    $sql = "SELECT win_bonus FROM lottary WHERE id = $lottary_id";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $win_bonus = $row['win_bonus'];

    
    $sql = "SELECT user_id FROM lot_ticket WHERE lottary = $lottary_id AND id = $winner_id";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $user_id = $row['user_id'];
    
    
    $sql = "UPDATE lot_ticket SET result = 'Complete' WHERE lottary = $lottary_id";
    mysqli_query($conn, $sql);

    $sql = "UPDATE lot_ticket SET result = 'Win' WHERE lottary = $lottary_id AND id = $winner_id";
    mysqli_query($conn, $sql);
    
    $sql = "UPDATE lottary SET status = 'Complete' WHERE id = $lottary_id";
    mysqli_query($conn, $sql);
    
    /////////////
    
    $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$user_id', 'win balance from lottery', '$win_bonus', '1')";
    mysqli_query($conn, $sql);//add trx history
    
    $sql = "SELECT balance FROM users WHERE id = '$user_id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $balance = $row['balance'];


    $win_bonus += $row['balance'];
    $win_bonus -= 10;
    $sql = "UPDATE users SET balance = '$win_bonus' WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){//update balance
        header("location: ../lott-sec.php");
    }
    

}



?>