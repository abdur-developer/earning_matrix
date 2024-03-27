<?php
if(isset($_REQUEST['pass']) && $_REQUEST['pass'] == "12345ID"){
    $id = $_REQUEST['id'];
    $user_id = $_REQUEST['user_id'];
    $action = $_REQUEST['action'];

    require "../../../includes/dbconnect.php";

    if($action == "Ban"){
        $sql = "UPDATE active SET status = 'Ban' WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        
        header("location: index.php");
    }else if($action == "Approved"){

        $sql = "UPDATE active SET status = 'Approved' WHERE id = $id";// approved active status
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

                }
            }
        }
        header("location: index.php");
    }else echo "No action, contact developer";


























}


?>