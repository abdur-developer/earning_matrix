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
        <link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
        <!-- Boxicons CSS -->
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <div class="header bg-primary text-white">
            <h1 class="py-2 text-center">Earning Matrix</h1>
        </div>
        <div class="container p-3">

            <div class="row justify-content-center">
                <div class="card col-lg-5 mx-3 bg-success p-2 mb-3">
                    <div class="row card-body">
                        <div class="user-sec text-white col-9">
                            <h2 class="card-title text-left">User Section</h2>
                            <p class="card-text text-left">earning matrix</p>
                            <a href="section/user-sec.php" class="stretched-link"></a>
                        </div>
                        <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                            <img src="arrow.png" alt="" class="color-change-img" >
                        </div>
                    </div>
                    
                </div>

                <div class="card col-lg-5 mx-3 bg-warning p-2 mb-3">
                    <div class="row card-body">
                        <div class="user-sec text-black col-9">
                            <h2 class="card-title text-left">Activation Section</h2>
                            <p class="card-text text-left">earning matrix</p>
                            <a href="section/acti-sec.php" class="stretched-link"></a>
                        </div>
                        <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                            <img src="arrow.png" alt="" class="color-img" >
                        </div>
                    </div>
                    
                </div>
                <div class="card col-lg-5 mx-3 p-2 mb-3" style="background-color: indigo;">
                    <div class="row card-body">
                        <div class="user-sec text-white col-9">
                            <h2 class="card-title text-left">Deposite Section</h2>
                            <p class="card-text text-left">earning matrix</p>
                            <a href="section/dipo-sec.php" class="stretched-link"></a>
                        </div>
                        <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                            <img src="arrow.png" alt="" class="color-change-img" >
                        </div>
                    </div>
                    
                </div>

                <div class="card col-lg-5 mx-3 bg-danger p-2 mb-3">
                    <div class="row card-body">
                        <div class="user-sec text-white col-9">
                            <h2 class="card-title text-left">Withdraw Section</h2>
                            <p class="card-text text-left">earning matrix</p>
                            <a href="section/with-sec.php" class="stretched-link"></a>
                        </div>
                        <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                            <img src="arrow.png" alt="" class="color-change-img" >
                        </div>
                    </div>
                    
                </div>

                <div class="card col-lg-5 mx-3 bg-info p-2 mb-3">
                    <div class="row card-body">
                        <div class="user-sec text-black col-9">
                            <h2 class="card-title text-left">Topup Section</h2>
                            <p class="card-text text-left">earning matrix</p>
                            <a href="section/top-sec.php" class="stretched-link"></a>
                        </div>
                        <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                            <img src="arrow.png" alt="" class="color-img" >
                        </div>
                    </div>
                    
                </div>

                <div class="card col-lg-5 mx-3 bg-secondary p-2 mb-3">
                    <div class="row card-body">
                        <div class="user-sec text-white col-9">
                            <h2 class="card-title text-left">Product Section</h2>
                            <p class="card-text text-left">earning matrix</p>
                            <a href="section/product-sec.php" class="stretched-link"></a>
                        </div>
                        <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                            <img src="arrow.png" alt="" class="color-change-img" >
                        </div>
                    </div>
                    
                </div>

                <div class="card col-lg-5 mx-3 bg-primary p-2 mb-3">
                    <div class="row card-body">
                        <div class="user-sec text-white col-9">
                            <h2 class="card-title text-left">Premium Section</h2>
                            <p class="card-text text-left">earning matrix</p>
                            <a href="section/premium-sec.php" class="stretched-link"></a>
                        </div>
                        <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                            <img src="arrow.png" alt="" class="color-change-img" >
                        </div>
                    </div>
                    
                </div>

                <div class="card col-lg-5 mx-3 bg-white p-2 mb-3">
                    <div class="row card-body">
                        <div class="user-sec text-black col-9">
                            <h2 class="card-title text-left">Hisab Section</h2>
                            <p class="card-text text-left">earning matrix</p>
                            <a href="section/hisab-sec.php" class="stretched-link"></a>
                        </div>
                        <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                            <img src="arrow.png" alt="" class="color-img" >
                        </div>
                    </div>
                    
                </div>
                <div class="card col-lg-5 mx-3 p-2 mb-3" style="background-color: deeppink;">
                    <div class="row card-body">
                        <div class="user-sec text-white col-9">
                            <h2 class="card-title text-left">Task Section</h2>
                            <p class="card-text text-left">earning matrix</p>
                            <a href="section/task-sec.php" class="stretched-link"></a>
                        </div>
                        <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                            <img src="arrow.png" alt="" class="color-change-img" >
                        </div>
                    </div>
                    
                </div>
                <div class="card col-lg-5 mx-3 p-2 mb-3" style="background-color: chartreuse;">
                    <div class="row card-body">
                        <div class="user-sec text-black col-9">
                            <h2 class="card-title text-left">Lottery Section</h2>
                            <p class="card-text text-left">earning matrix</p>
                            <a href="section/lott-sec.php" class="stretched-link"></a>
                        </div>
                        <div class="col-3"  style='color:#ffffff font-size: 70px;' >
                            <img src="arrow.png" alt="" class="color-img" >
                        </div>
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