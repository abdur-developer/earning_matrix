<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Submited Section</title>
    <link href='../../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        .card {
            background-color: beige;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <p class="text-center px-2 bg-warning">
        <?php if(isset($_REQUEST['success'])){
            echo "successfully submited";
        }
        if(isset($_REQUEST['error'])){
            echo "Worng , Contact Developer.....";
        } ?>
    </p>
        <div class="row">
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
                require '../../../includes/dbconnect.php';

                if(isset($_REQUEST['approved'])){
                    $id = $_REQUEST['approved'];
                    $taka = $_REQUEST['taka'];
                    $user_id = $_REQUEST['user_id'];
                    $sql = "UPDATE submit_task SET status = 'Approved' WHERE id = $id";
                    $query = mysqli_query($conn,$sql);
                    if($query){
                        $sql = "SELECT balance FROM users WHERE id = '$user_id'";
                        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));                        
                        
                        if(mysqli_query($conn, $sql)){
                            $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$user_id', 'earning from task', '$taka', '1')";
                            mysqli_query($conn, $sql);//add trx history

                            $taka += $row['balance'];
                            $sql = "UPDATE users SET balance = '$taka' WHERE id = '$user_id'";
                            if(mysqli_query($conn, $sql)){
                                header("location: submit.php");
                            }
                        }
                    }
                }
                if(isset($_REQUEST['reject'])){
                    $id = $_REQUEST['reject'];
                    $sql = "UPDATE submit_task SET status = 'Reject' WHERE id = $id";
                    mysqli_query($conn,$sql);
                }
                if(isset($_GET['type'])){
                    $sql = "SELECT * FROM submit_task WHERE status = 'Pending' ORDER BY id DESC";
                }else{
                    $sql = "SELECT * FROM submit_task ORDER BY id DESC";
                }
                
                $query = mysqli_query($conn,$sql);
                $num_of_rows = mysqli_num_rows($query);
                if($num_of_rows > 0){
                    while($row = mysqli_fetch_array($query)){
                        $id = $row['id'];
                        $taka = $row['taka'];
                        $user_id = $row['user_id'];
                        $key = 'abdur';
                        $task_id = encryptNumber($row['task_id'],$key);
                        ?>
                        <div class='col-md-4 col-xl-3 px-sm-3 mt-3'>
                            <div class='card'>
                                <div class="card-header">
                                    <h4 class="text-center">
                                        Amount : <?= $row['taka'] ?>
                                    </h4>
                                </div>
                                <div class='card-footer'>
                                    <div class='row text-center'>
                                        <?php if($row['status'] == 'Pending'){ ?>
                                        <div class='col-4'>
                                            <a class='btn btn-success' href='submit.php?approved=<?= $id ?>&taka=<?= $taka ?>&user_id=<?= $user_id ?>'>Approved</a>
                                        </div>
                                        <div class='col-4'>
                                            <a class='btn btn-danger' href='submit.php?reject=<?= $id ?>'>Reject</a>
                                        </div>
                                        <?php } ?>
                                        <div class='col-4'>
                                            <a class='btn btn-secondary' href='../../../task/details.php?name=<?= $task_id ?>'>View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }else{
                    echo "
                <div class='container-fluid'>
                    <img src='../../../assets/images/sorry.jpg' class='img-fluid d-block m-auto mt-4' width='80px' height='80px'>
                    <div class='text-danger mt-5'>
                        <p class='text-center small'><b>
                            কোনো আইটেম নেই
                        </b></p>
                    </div>
                </div>";
                }
            ?>
            
        </div>
    </div>
</body>
</html>