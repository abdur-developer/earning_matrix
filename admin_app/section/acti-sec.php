<?php

if(isset($_COOKIE['login'])){
    $is_login = $_COOKIE['login'];
    if($is_login == "login"){
        ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
        <!-- Boxicons CSS -->
        <link href="../style.css" rel="stylesheet" />
    </head>

    <body>
        <div class="header bg-primary text-white row">
        <h1 class="text-center col-1">
            <a class="btn btn-light" href="../home.php">Home</a>
        </h1>
        <h1 class="py-2 text-center col-11">Activation Section</h1>
        </div>
        <div class="container p-3">


            <div class="card bg-info p-2 mb-3">
                <div class="row card-body">
                    <div class="user-sec text-black col-9">
                        <h2 class="card-title text-left">All Request</h2>
                        <p class="card-text text-left">
                            myearningbd<a href="acti-details/?type=all" class="stretched-link"></a>
                        </p>
                        
                    </div>
                    <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                        <img src="../arrow.png" alt="" class="color-img" >
                    </div>
                </div>
                
            </div>


            <div class="card bg-success p-2 mb-3">
                <div class="row card-body">
                    <div class="user-sec text-white col-9">
                        <h2 class="card-title text-left">Approved Request</h2>
                        <p class="card-text text-left">myearningbd
                            <a href="acti-details/?type=act" class="stretched-link"></a>
                        </p>
                    </div>
                    <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                        <img src="../arrow.png" alt="" class="color-change-img" >
                    </div>
                </div>
                
            </div>


            <div class="card bg-warning p-2 mb-3">
                <div class="row card-body">
                    <div class="user-sec text-black col-9">
                        <h2 class="card-title text-left">Pending Request</h2>
                        <p class="card-text text-left">myearningbd
                            <a href="acti-details/?type=pen" class="stretched-link"></a>
                        </p>
                    </div>
                    <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                        <img src="../arrow.png" alt="" class="color-img" >
                    </div>
                </div>
                
            </div>
            <div class="card bg-danger p-2 mb-3">
                <div class="row card-body">
                    <div class="user-sec text-white col-9">
                        <h2 class="card-title text-left">Ban Request</h2>
                        <p class="card-text text-left">myearningbd
                            <a href="acti-details/?type=ban" class="stretched-link"></a>
                        </p>
                    </div>
                    <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                        <img src="../arrow.png" alt="" class="color-change-img" >
                    </div>
                </div>
                
            </div>
        </div>

























    </body>
    </html>

<?php
    }else{
        header("location: admin.php?$is_login");
    }
}else{
    header("location: admin.php");
}

?>