<?php
// =1&=1&ss=../assets/screensort/6606cb6982e5awhat-is-ad-network-1.webp
if(isset($_REQUEST['ss'])){
    require '../../../includes/dbconnect.php';
    $task_id = $_REQUEST['task_id'];
    $user_id = $_REQUEST['user_id'];
    $status = $_REQUEST['status'];
    $id = $_REQUEST['id'];
    $taka = $_REQUEST['taka'];
    $screenshot = $_REQUEST['ss'];

    $sql = "SELECT name, email FROM users WHERE id = '$user_id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $name = $row['name'];
    $email = $row['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <title>Task View</title>
</head>
<body>
<div class="profile mt-3">
        <img src="../../<?= $screenshot ?>" alt=""
        class="img-fluid d-block m-auto rounded w-75">
    </div>
    <div class="card my-3 p-2">

        <div class="row h5">
            <div class="col-6">Name : </div>
            <div class="col-6"><?= $name ?></div>
            <div class="col-6">Email :  </div>
            <div class="col-6"><?= $email ?></div>
        </div>
        <!-- <hr>
        <div class="row h5">
            <div class="col-6">Balance : </div>
            <div class="col-6"><?= $data['amount']." Taka"; ?></div>
            <div class="col-6">Time :  </div>
            <div class="col-6"><?= $data['time']; ?></div>
        </div> -->

        
    </div>

    <div class="card my-3 p-2">
        <div class="row">
            
            
            <?php
                if($status == "Pending"){
                    echo "<div class='col-6'><a href='submit.php?approved=$id&taka=$taka&user_id=$user_id' class='btn btn-success w-100'>Approved</a></div>";

                    echo "<div class='col-6'><a href='submit.php?reject=$id' class='btn btn-danger w-100'>Reject</a></div>";

                }
            ?>
            
        </div>
</body>
</html>








<?php

}
?>