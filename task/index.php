<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <style>
        .task-item {
            border: 2px solid green;
            border-radius: 5px;
            padding: 0%;
        }
        .task-item:hover {
            box-shadow: 2px 2px 8px green;
        }
        .line {
            border-width: 2px;
            box-shadow: 1px 1px 3px black;
            background-color: darkgrey;
        }
        .task-title {
            max-height: 1.5rem;
            overflow: hidden;
            line-height: 1.2em;
        }
        .task-desc {
            max-height: 3rem;
            overflow: hidden;
            line-height: 1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header d-flex justify-content-center mt-3">
            <img src="../assets/images/task.jpg" class="img-fluid m-2" height="30px" width="30px">
            <h3 class="m-2 text-info">Daily Task</h3>
        </div>
        <div class="container-fluid">

            <div class="task">
                <div class="row justify-content-center">
                    <?php
                    function decryptNumber($encrypted, $key){
                        $chiper = 'aes-256-cbc';
                        $data = base64_decode($encrypted);
                        $iv_lenght = openssl_cipher_iv_length($chiper);
                        $iv = substr($data, 0, $iv_lenght);
                        $encrypted = substr($data, $iv_lenght);
                        return openssl_decrypt($encrypted, $chiper, $key, 0, $iv);
                      }
                    function encryptNumber($number, $key){
                        $chiper = 'aes-256-cbc';
                        $iv_length = openssl_cipher_iv_length($chiper);
                        $iv = openssl_random_pseudo_bytes($iv_length);
                        $encrypted = openssl_encrypt($number, $chiper, $key, 0, $iv);
                        $x = base64_encode($iv. $encrypted);
                        if(decryptNumber($x, $key) == $number){
                            return $x;
                        }else{
                            encryptNumber($number, $key);
                        }
                    }
                    $sessionId = $_SESSION["id"];
                    $total_task = $user['daily_task'];
                    require '../includes/dbconnect.php';

                    $sql = "SELECT * FROM task";
                    $query = mysqli_query($conn,$sql);
                    $num_of_rows = mysqli_num_rows($query);

                    

                    if($total_task > $num_of_rows){
                        $total_task = $num_of_rows;
                    }

                    if($total_task <= 0 || $num_of_rows <= 0){
                         ?>
                            <div class="no_data">
                                <img src="../assets/images/sorry.jpg" class="img-fluid d-block m-auto mt-4" width="80px" height="80px">
                                <div class="text-danger mt-5">
                                    <p class="text-center small"><b>
                                        আমরা আন্তরিক ভাবে দুঃখিত ! আপনার জন্য বর্তমানে কোনো Task নেই।
                                    </b></p>
                                </div>
                            </div>
                            <?php 
                    }else{
                        for($x=0 ; $x < $total_task; $x++){
                            $row = mysqli_fetch_array($query);
                            $key = 'abdur';
                            $task_id = encryptNumber($row['id'],$key);
                            // echo $task_id;
                            $title = $row['title'];
                            $description = $row['description'];
                            $taka = $row['taka'];
                ?>
                            <div class="col-md-5 col-lg-3 task-item mx-1 mt-3"> <?php 
                                $sql = "SELECT status FROM submit_task WHERE user_id = '".$user['id']."' AND task_id = '".$row['id']."'";
                                $query = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($query) == 0){
                                    echo "<button class='btn btn-success mt-3 mx-4'>Available</button>";
                                }else{
                                    $status = mysqli_fetch_array($query);
                                    $status = $status['status'];
                                    echo "<button class='btn btn-warning mt-3 mx-4'>$status</button>";
                                }
                                ?>
                                <hr class="line">
                                <h4 class="text-black text-center px-2 task-title"><?= $title ?></h4>
                                <p class="text-secondary px-3 task-desc"><?= $description ?></p>
                                <h5 class="text-success px-3"><b>$ <?= $taka ?></b></h5>
                                <div class="d-flex justify-content-end">
                                    <a href="../task/details.php?name=<?= $task_id ?>" class="btn btn-outline-secondary m-1">see more</a>
                                </div>
                            </div>
                    <?php }} ?>
                </div>
            </div>

            
        </div>
    </div>
</body>
</html>