<?php
require '../includes/dbconnect.php';
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT balance, daily_task FROM users WHERE id = $sessionId"));
$balance = $user['balance'];
$user_daily_task = $user['daily_task'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .vip-img {
            height: 100px;
            width: 100%;
        }
        .card-header {
            padding: 0%;
        }
        .card {
            margin-top: 15px;
        }
        .card:hover {
            box-shadow: 3px 3px 8px green;
        }
        .confirmation-dialog {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .dialog-content {
            background-color: white;
            width: 300px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .buttons {
            text-align: right;
            margin-top: 20px;
        }

        .buttons button {
            padding: 8px 16px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <?php
        if (isset($_REQUEST['success'])) { 
            echo "<script> Swal.fire({ title: 'Success...!', text: 'Successfully buying this plan....!', icon: 'success' }); </script>";
        
        }elseif (isset($_REQUEST['failed'])) { 
            echo "<script> Swal.fire({ title: 'Failed...!', text: 'Failed to buying this plan.... You dont have enough money ...!', icon: 'error' }); </script>";
        }

    ?>
    <div class="container">
        <div class="header d-flex justify-content-center mt-3">
            <img src="../assets/images/task.jpg" class="img-fluid m-2" height="30px" width="30px">
            <h3 class="m-2 text-info">Premium Membership</h3>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php
                    $sql = "SELECT * FROM premium WHERE status='1'";
                    $query = mysqli_query($conn,$sql);
                    $num_of_rows = mysqli_num_rows($query);
                    if($num_of_rows > 0){
                        while($row = mysqli_fetch_array($query)){
                            $plan_id = $row['id'];
                            $price = $row['price'];
                            $num_of_task = $row['num_of_task'];
                            $task_in = $row['task_earning'];
                            $validity = $row['validity'];
                            $one = $row['1st'];
                            $two = $row['2nd'];
                            $three = $row['3rd'];
                            $four = $row['4th'];
                            $five = $row['5th'];
                            $cdPlanId = $plan_id;

                            $sql = "SELECT COUNT(*) AS num_rows FROM buy_plan WHERE user_id = $sessionId AND plan_id = $plan_id";
                            $nnn = mysqli_fetch_assoc(mysqli_query($conn,$sql));
                            $num_of_rows = $nnn['num_rows'];
                            // echo $num_of_rows;
                            ?>
                            <div class="col-md-6 col-lg-4 px-sm-3 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <img src="../assets/images/lottary.jpg" class="vip-img img-fluid">
                                </div>
                                <div class="card-footer">
                                    <h4 class="text-center">Price: ৳<?= $price ?></h4>
                                    <p class="text-center text-white bg-danger rounded mx-3">Extra Benefits</p>
                                    <ul>
                                        <li>Daily: <?= $num_of_task ?> Guaranteed task</li>
                                        <li>Daily Task Earning: ৳ <?= $task_in ?></li>
                                        <li>1st Gen income: ৳<?= $one ?></li>
                                        <li>2nd Gen income: ৳<?= $two ?></li>
                                        <li>3rd Gen income: ৳<?= $three ?></li>
                                        <li>4th Gen income: ৳<?= $four ?></li>
                                        <li>5th Gen income: ৳<?= $five ?></li>
                                        <li>Validity: <span class="text-center text-black bg-warning rounded px-3"><?= $validity ?> days</span></li>
                                    </ul>
                                    <?php
                                        if($num_of_rows < 1){
                                    ?>
                                        <button onclick="openConfirmation(<?= $cdPlanId ?>)" class="btn btn-success text-white mt-3 w-100">Buy Plan</button>
                                        <?php } else { ?>
                                            <button class="btn btn-warning mt-3 w-100">Already Buy</button>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div id="<?= $cdPlanId ?>" class="confirmation-dialog">
                            <div class="dialog-content">
                                <p>আপনি কি Plan টি কিনতে চাচ্ছেন...?</p>
                                <div class="buttons">
                                    <div class="row">
                                        <form action="../premium/buy.php" method="post" class="col-8">
                                            <input type="hidden" name="q" value="premium"/>
                                            <input type="hidden" name="buying" value="<?= $plan_id ?>"/>
                                            <input type="hidden" name="user_daily_task" value="<?= $user_daily_task ?>"/>
                                            <input type="hidden" name="sessionId" value="<?= $sessionId ?>"/>
                                            <input type="hidden" name="balance" value="<?= $balance ?>"/>
                                            <button type="submit" onclick="confirmAction()" class="btn btn-success">Yes</button>
                                        </form>
                                        <a href="../home/?q=premium" class="btn btn-danger col-3">No</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            
                        }
                        
                    }else{
                        echo "
                    <div class='container-fluid'>
                        <img src='../assets/images/sorry.jpg' class='img-fluid d-block m-auto mt-4' width='80px' height='80px'>
                        <div class='text-danger mt-5'>
                            <p class='text-center small'><b>
                                আমরা আন্তরিক ভাবে দুঃখিত ! আমাদের Premium Membership বর্তমানে বন্ধ রয়েছে। <br> অতি শীঘ্রই আমাদের এই অপশনটি সচল হবে।<br> সচল হলে আপনাদের নোটিশ জানিয়ে দেওয়া হবে।
                            </b></p>
                        </div>
                    </div>";
                    }
                ?>
                
            </div>
        </div>
    </div>
    <script>
        function openConfirmation(x) {
            document.getElementById(x).style.display = 'block';
        }

        function closeConfirmation() {
            document.getElementById(x).style.display = 'none';
        }

        function confirmAction() {
            closeConfirmation();
            //window.location.href = "..home/";
        }
    </script>
</body>
</html>