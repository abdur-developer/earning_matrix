<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body class="" style="background-color: #E0F7FA;">
    <div class="header bg-primary text-white">
        <h1 class="py-2 text-center">All user</h1>
    </div>
    <div class="container">
        



    <?php
    $data = $_GET;
    $queryString = http_build_query($data);
    //print_r($data);
    $id = $data['id'];
    $status = $data['status'];
    $email_verify = $data['email_verify'];
    $image = "../../../assets/profile_img/".$data['image'];
    ?>
    <div class="profile mt-3">
        <img src="<?= $image ?>" alt=""
        class="img-fluid d-block m-auto rounded-circle w-25">
    </div>
    <div class="name text-center mt-3">
        <span class="h3 fw-bolder"><?= $data['name']; ?> </span><img src="<?php 
                                if($status == 'Approved'){
                                    echo "../img/success.png";
                                }elseif ($status == 'Ban') {
                                    echo "../img/reject.png";
                                }else {
                                    echo "../img/run.png";
                                }
                            ?>" alt="" class="img-fluid mb-2" width="20px">
        <p class="small <?php if($email_verify == 'Pending') echo "bg-danger"; else echo "bg-success" ?> text-white">
        <?= $data['email']; ?></p>
    </div>
    <div class="card">
        <div class="row justify-content-center">
            <div class="col-3 rounded bg-success text-white m-2">
                <h6 class="text-center">Balance</h6>
                <h6 class="text-center"><?= $data['balance']; ?></h6>
            </div>
            <div class="col-3 rounded bg-warning m-2">
                <h6 class="text-center">Bonus</h6>
                <h6 class="text-center"><?= $data['bonus']; ?></h6>
            </div>
            <div class="col-3 rounded bg-success text-white m-2">
                <h6 class="text-center">T withdraw</h6>
                <h6 class="text-center"><?= $data['t_withdraw']; ?></h6>
            </div>
        </div>
        <!-- ================================================ -->
        <div class="row justify-content-center">
            <div class="col-3 rounded bg-warning m-2">
                <h6 class="text-center">TWR</h6>
                <h6 class="text-center"><?= $data['t_ref_for_withdraw']; ?></h6>
            </div>
            <div class="col-3 rounded bg-success text-white m-2">
                <h6 class="text-center">T Refer</h6>
                <h6 class="text-center"><?= $data['t_refer']; ?></h6>
            </div>
            <div class="col-3 rounded bg-warning m-2">
                <h6 class="text-center">T Deposit</h6>
                <h6 class="text-center"><?= $data['t_deposite']; ?></h6>
            </div>
        </div>
    </div>
    <div class="card mt-3 p-2">
        <div class="row justify-content-center">
            
            <!-- adding balance starts here  -->
            <form class="col-5 row" action="balance.php">
                <input type="number" class="number col-6 m-1" placeholder="jog" name="in_bl" required>
                <input type="hidden" value="add" name="action">
                <input type="hidden" value="<?= $id ?>" name="id">
                <input type="hidden" value="<?= $data['balance'] ?>" name="balance">
                <input type="submit" class="btn btn-info col-4 m-1" value="Add">
            </form>
            <div class="col-1"></div>
            <!-- adding balance ends here  -->

            <!-- mainajing balance starts here  -->
            <form class="col-5 row" action="balance.php">
                <input type="number" class="number col-6 m-1" placeholder="biyog" name="in_bl" required>
                <input type="hidden" value="bad" name="action">
                <input type="hidden" value="<?= $id ?>" name="id">
                <input type="hidden" value="<?= $data['balance'] ?>" name="balance">
                <input type="submit" class="btn btn-danger col-4 m-1" value="bad">
            </form>
            <!-- minajing balance ends here  -->
        </div>
    </div>
    <div class="card my-3 p-2">

        <div class="row h5">
            <div class="col-6">Phone number : </div>
            <div class="col-6"><?= $data['phone']; ?></div>
            <div class="col-6">My refer code :  </div>
            <div class="col-6"><?= $data['my_ref_code']; ?></div>
        </div>
        <hr>
        <div class="row h5">
            <div class="col-6">Other Refer code :  </div>
            <div class="col-6"><?= $data['ot_ref_code']; ?></div>
            <div class="col-6">Joining Date :  </div>
            <div class="col-6"><?= $data['join_time']; ?></div>
        </div>
        <hr>
        <div class="row h5">
            <div class="col-6">Last spining time :  </div>
            <div class="col-6"><?= $data['last_spin']; ?></div>
            <div class="col-6">Last Updated time :  </div>
            <div class="col-6"><?= $data['last_update']; ?></div>
        </div>
        <hr>
        <div class="row h5">
            <div class="col-6">Verification code :  </div>
            <div class="col-6"><?= $data['verification_code']; ?></div>
            <div class="col-6">Jela :  </div>
            <div class="col-6"><?= $data['jela']; ?></div>
        </div>

        
    </div>

    <div class="card my-3 p-2">
        <div class="row">
            <div class="col-6">
                <a href="login.php?id=<?= $id ?>&pass=12345ID" rel="noopener noreferrer" class="btn btn-secondary w-100">User Login</a>
            </div>
            <div class="col-6">
                <?php
                    if($status == "Pending"){
                        echo "<a href='action.php?id=$id&pass=12345ID&action=Ban' class='btn btn-danger w-100'>Ban user</a>";

                    }elseif($status == "Approved"){
                        echo "<a href='action.php?id=$id&pass=12345ID&action=Ban' class='btn btn-danger w-100'>Ban user</a>";

                    }elseif($status == "Ban"){
                        echo "<a href='action.php?id=$id&pass=12345ID&action=Approved' class='btn btn-success w-100'>Active user</a>";

                    }
                ?>
            </div>
        </div>
    </div>











    
    </div>
</body>
</html>