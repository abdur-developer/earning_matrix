<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body class="" style="background-color: #E0F7FA;">
    <div class="header bg-primary text-white row">
        <h1 class="text-center col-1">
            <a class="btn btn-light" href="../../home.php">Home</a>
        </h1>
        <h1 class="py-2 text-center col-11">Product Details</h1>
    </div>
    <div class="container">
        



    <?php
    $data = $_GET;
    //print_r($data);
    $id = $data['id'];
    $status = $data['status'];
    $image = "../../../assets/product/".$data['img'];
    ?>
    <div class="profile mt-3">
        <img src="<?= $image ?>" alt=""
        class="img-fluid d-block m-auto rounded w-50">
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
    </div>
    <div class="card">
        <div class="row justify-content-center">
            <div class="col-3 rounded bg-warning m-2">
                <h6 class="text-center">Dis Price</h6>
                <h6 class="text-center"><?= $data['dis_price']; ?></h6>
            </div>
            <div class="col-3 rounded bg-success m-2 text-white">
                <h6 class="text-center">Current Price</h6>
                <h6 class="text-center"><?= $data['current_price']; ?></h6>
            </div>
            <div class="col-3 rounded bg-warning m-2">
                <h6 class="text-center">Buy click</h6>
                <h6 class="text-center"><?= $data['buy_click']; ?></h6>
            </div>
        </div>
    </div>
    <div class="card my-3 p-2">

        <div class="row h5">
            <div class="col-6">Updated Time : </div>
            <div class="col-6"><?= $data['update_time']; ?></div>
            <div class="col-6">Adding Time :  </div>
            <div class="col-6"><?= $data['time']; ?></div>
        </div>
        <hr>
        <div class="h3">Description :  </div>
        <div class="small"><?= $data['description']; ?></div>

        
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