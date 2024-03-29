<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>submit</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php

require '../includes/dbconnect.php';
if(isset($_FILES['screensort'])){
    $task_id = $_REQUEST['id'];
    $taka = $_REQUEST['taka'];
    $user_id = $_REQUEST['user_id'];
    
    $imgData = $_FILES['screensort'];
    //var_dump($imgData);
    $img_name = uniqid().$imgData['name'];

    $tmp_name = $imgData['tmp_name'];

    $location = "../assets/screensort/$img_name";
    if(move_uploaded_file($tmp_name,$location)){
        ///////////////////////////////////////////////////////////////////////////
        $sql = "SELECT auto_approved_task FROM system WHERE id = '1'";
        $r = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $auto_approved_task = $r['auto_approved_task'];
        
        if($auto_approved_task == 0){
            $sql = "INSERT INTO submit_task (user_id, task_id, taka, screenshot) VALUES ('$user_id', '$task_id', '$taka', '$location')";
        }else{
            $sql = "SELECT balance FROM users WHERE id = '$user_id'";
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));                        

            if(mysqli_query($conn, $sql)){
                $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$user_id', 'earning from task', '$taka', '1')";
                mysqli_query($conn, $sql);//add trx history

                $taka += $row['balance'];
                $sql = "UPDATE users SET balance = '$taka' WHERE id = '$user_id'";
                mysqli_query($conn, $sql);
            }


            $sql = "INSERT INTO submit_task (user_id, task_id, taka, screenshot, status) VALUES ('$user_id', '$task_id', '$taka', '$location', 'Approved')";
        }
        
        
        if(mysqli_query($conn,$sql)){
            echo "<script> Swal.fire({ title: 'Success...!',
                text: 'Successfully submited you task.... ',
                icon: 'success' }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = '../home/?q=task';
                }
                }); </script>";
///////////////////////////////////////////////////////////////////////////////
            
        }else{
            unlink($location);
            echo "<script> Swal.fire({ title: 'Opps...!',
                text: 'Somthing wet wrong.... ',
                icon: 'error' }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = '../home/?q=task';
                }
                }); </script>";
        }
        
    }else{
        echo "<script> Swal.fire({ title: 'Opps...!',
            text: 'Somthing wet wrong.... ',
            icon: 'error' }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = '../home/?q=task';
            }
            }); </script>";
    }
}

?>
</body>
</html>