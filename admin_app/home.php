<?php

if (isset ($_COOKIE['login'])) {
    $is_login = $_COOKIE['login'];
    if ($is_login == "login") {
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
            <div class="mb-1">
                <?php
                require '../includes/dbconnect.php';
                if (isset ($_GET['active'])) {
                    $sql = "UPDATE system SET site_on_off = '1' WHERE id = 1";
                    mysqli_query($conn, $sql);
                } elseif (isset ($_GET['inactive'])) {
                    $sql = "UPDATE system SET site_on_off = '0' WHERE id = 1";
                    mysqli_query($conn, $sql);
                }
                $sql = "SELECT site_on_off FROM system WHERE id = '1'";
                $r = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                $site_on_off = $r['site_on_off'];

                if ($site_on_off == 0) {
                    echo "<a href='home.php?active' class='btn btn-danger'>Site Off</a>";
                } else {
                    echo "<a href='home.php?inactive' class='btn btn-success'>Site On</a>";
                }
                ?>
            </div>
            <div class="container p-3">

                <div class="row justify-content-center">
                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3 bg-success">
                            <div class="row">
                                <div class="user-sec text-white col-9">
                                    <h5 class="card-title text-left">User Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/user-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-change-img">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3 bg-warning">
                            <div class="row">
                                <div class="user-sec text-black col-9">
                                    <h5 class="card-title text-left">Activation Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/acti-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-img">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3" style="background-color: indigo;">
                            <div class="row">
                                <div class="user-sec text-white col-9">
                                    <h5 class="card-title text-left">Deposite Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/dipo-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-change-img">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3 bg-danger">
                            <div class="row">
                                <div class="user-sec text-white col-9">
                                    <h5 class="card-title text-left">Withdraw Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/with-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-change-img">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3 bg-info">
                            <div class="row">
                                <div class="user-sec text-black col-9">
                                    <h5 class="card-title text-left">Topup Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/top-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-img">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3 bg-secondary">
                            <div class="row">
                                <div class="user-sec text-white col-9">
                                    <h5 class="card-title text-left">Product Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/product-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-change-img">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3 bg-primary">
                            <div class="row">
                                <div class="user-sec text-white col-9">
                                    <h5 class="card-title text-left">Premium Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/premium-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-change-img">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3 bg-white">
                            <div class="row">
                                <div class="user-sec text-black col-9">
                                    <h5 class="card-title text-left">Hisab Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/hisab-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-img">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3" style="background-color: deeppink;">
                            <div class="row">
                                <div class="user-sec text-white col-9">
                                    <h5 class="card-title text-left">Task Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/task-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-change-img">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3" style="background-color: chartreuse;">
                            <div class="row">
                                <div class="user-sec text-black col-9">
                                    <h5 class="card-title text-left">Lottery Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/lott-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-img">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3" style="background-color: darkmagenta;">
                            <div class="row">
                                <div class="user-sec text-white col-9">
                                    <h5 class="card-title text-left">Notice Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/noti-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-change-img">
                                </div>
                            </div>
                        </div>
    
                    </div>

                    <div class="col-lg-6 col-xl-4">
                        <div class="card p-2 m-3" style="background-color: aqua;">
                            <div class="row">
                                <div class="user-sec text-black col-9">
                                    <h5 class="card-title text-left">Contact Section</h5>
                                    <p class="card-text text-left">earning matrix</p>
                                    <a href="section/cont-sec.php" class="stretched-link"></a>
                                </div>
                                <div class="col-3">
                                    <img src="arrow.png" alt="" class="color-img">
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>

            </div>

























        </body>

        </html>

        <?php
    } else {
        header("location: admin.php?$is_login");
    }
} else {
    header("location: admin.php");
}

?>