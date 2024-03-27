<?php
require "../includes/dbconnect.php";

if(isset($_REQUEST['password']) && $_REQUEST['password'] == "abdur"){
    $section = $_REQUEST['section'];
    if($section == "all"){
        $sql = "SELECT * FROM deposit ORDER BY id DESC";
    }else{
        $sql = "SELECT * FROM deposit WHERE status = 'Pending' ORDER BY id DESC";
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

    if($action == "reject"){
        $sql = "UPDATE deposit SET status = 'Ban' WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        if($query){
            echo "successfully rejected";
        }else{
            echo "Rejection failed";
        }
    }else if($action == "approved"){

        $sql = "UPDATE deposit SET status = 'Approved' WHERE id = $id";// approved deposit status
        mysqli_query($conn, $sql);

        $sql = "UPDATE users SET status = 'Approved' WHERE id = $user_id";// approved account status
        mysqli_query($conn, $sql);

        $sql = "SELECT * FROM users WHERE id = $user_id;";// get 1st get ref code
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) != 0){
            $ot_user = mysqli_fetch_assoc($query);
            $ot_ref_code = $ot_user['ot_ref_code'];//1st gen ref code
            $my_ref_code0 = $ot_user['my_ref_code'];//my ref code

            $sql = "SELECT * FROM users WHERE my_ref_code = $ot_ref_code";// get 1st ger user details and 2nd gen ref code
            $query = mysqli_query($conn, $sql);

            if(mysqli_num_rows($query) != 0){
                $ot_user_for_bonus1 = mysqli_fetch_assoc($query);
                $ot_ref_code2 = $ot_user_for_bonus1['ot_ref_code'];//2nd gen ref code

                $balance1 = $ot_user_for_bonus1['balance'] + 35;
                $bonus1 = $ot_user_for_bonus1['bonus'] + 35;
                $t_ref1 = $ot_user_for_bonus1['t_refer'] + 1;
                $user_id1 = $ot_user_for_bonus1['id'];

                $t_ref_for_withdraw1 = $ot_user_for_bonus1['t_ref_for_withdraw'] + 1;

                $sql = "UPDATE users SET balance = '$balance1', bonus = '$bonus1', t_ref_for_withdraw = '$t_ref_for_withdraw1', t_refer = '$t_ref1' WHERE my_ref_code = $ot_ref_code";
                mysqli_query($conn, $sql); //update 1 genaretion data

                $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$user_id1', 'refer bonus from $my_ref_code0', '35', '1')";
                mysqli_query($conn, $sql); //update 1 genaretion trx history data

                $sql = "SELECT * FROM users WHERE my_ref_code = $ot_ref_code2";// get 2nd ger user details
                $query = mysqli_query($conn, $sql);
    
                if(mysqli_num_rows($query) != 0){
                    $ot_user_for_bonus2 = mysqli_fetch_assoc($query);
    
                    $balance2 = $ot_user_for_bonus2['balance'] + 12;
                    $bonus2 = $ot_user_for_bonus2['bonus'] + 12;
                    $user_id2 = $ot_user_for_bonus2['id'];
    
                    $sql = "UPDATE users SET balance = '$balance2', bonus = '$bonus2' WHERE my_ref_code = $ot_ref_code2";
                    mysqli_query($conn, $sql); //update 2 genaretion data

                    $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$user_id2', 'refer bonus from $my_ref_code0', '12', '1')";
                    mysqli_query($conn, $sql); //update 2 genaretion trx history data

                    echo "successfully Approved";
                }
            }
        }
    }
}
?>