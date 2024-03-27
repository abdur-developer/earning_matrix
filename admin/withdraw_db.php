<?php
require "../includes/dbconnect.php";

if(isset($_REQUEST['password']) && $_REQUEST['password'] == "abdur"){
    $section = $_REQUEST['section'];
    if($section == "all"){
        $sql = "SELECT * FROM withdraw ORDER BY id DESC";
    }else{
        $sql = "SELECT * FROM withdraw WHERE status = 'Pending' ORDER BY id DESC";
    }
    $query = mysqli_query($conn, $sql);

    $data = [];
    while ($row = $query->fetch_assoc()) {
        $data[] = $row;
    }
    // Convert data to JSON format
    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    // Output the JSON data
    header('Content-Type: application/json');
    echo $json_data;
}

if(isset($_REQUEST['click'])){
    $action = $_REQUEST['click'];
    $id = $_REQUEST['id'];
    $user_id = $_REQUEST['user_id'];
    $amount = $_REQUEST['amount'];

    if($action == "reject"){
        $sql = "UPDATE withdraw SET status = 'Ban' WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        if($query){
            $sql = "SELECT * FROM users WHERE id = $user_id";
            $fatch = mysqli_query($conn, $sql);
            $user_data = mysqli_fetch_assoc($fatch);
            $balance = $user_data['balance'] + $amount;

            $sql = "UPDATE users SET balance = '$balance' WHERE id = $user_id";
            mysqli_query($conn, $sql);//update balance


            $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$user_id', 'reject withdraw and refund', '$amount', '1')";
            mysqli_query($conn, $sql);//add trx history
            echo "successfully rejected";
        }else{
            echo "Rejection failed";
        }
    }else if($action == "approved"){

        $method = $_REQUEST['method'];

        $sql = "UPDATE withdraw SET status = 'Approved' WHERE id = $id";// approved withdraw status
        mysqli_query($conn, $sql);

        
    
    }
}
?>