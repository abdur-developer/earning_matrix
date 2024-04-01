<?php 
require '../includes/dbconnect.php';

$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = $id";
$fatch = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($fatch);
$t_ref_for_with = $user_data['t_ref_for_withdraw'];
$balance = $user_data['balance'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <title>Withdraw | My Earningbd</title>
</head>
<body>
<?php
    if(isset($_REQUEST['method'])){
        $phone = $_REQUEST["number"];
        $method = $_REQUEST["method"];
        $amount = $_REQUEST["amount"];
        $commission = ($amount * 5) / 100;
        $total_coust = ($amount + $commission);

        if($balance >= $total_coust){
            $balance -= $total_coust;

            $sql = "UPDATE users SET balance = '$balance' WHERE id = $id";

            if(strlen($phone) != 11){
                echo "<script>Swal.fire({ position: 'top-end', icon: 'error', title: 'সঠিক ১১ সংখ্যার নাম্বার লিখুন...!', showConfirmButton: false, timer: 3000});</script>";
            }else{
                //query all data
                mysqli_query($conn, $sql);//update balance

                

                $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$id', 'Request for Withdraw', '$amount', '0')";
                mysqli_query($conn, $sql);//add trx history
                
                $sql = "UPDATE users SET t_ref_for_withdraw = '0' WHERE id = $id"; // refer for withdraw count set zero---------- 
                mysqli_query($conn, $sql);//add update total refer for withdraw

                $sql = "INSERT INTO withdraw ( user_id, number, amount, method, commission) VALUES ( '$id', '$phone', '$amount', '$method', '$commission' )";
                $query = mysqli_query($conn, $sql);
                if ($query) { 
                    echo "<script>Swal.fire({ position: 'top-end',icon: 'success', title: 'Successfully Data inserted..!', showConfirmButton: false, timer: 3000 }); </script>";
                }
            }
        }else {
            echo "<script>Swal.fire({ position: 'top-end', icon: 'error', title: 'আপনার পর্যাপ্ত পরিমান balance নেই...!', showConfirmButton: false, timer: 3000});</script>";
        }
    }
    ?>
    <div class="container">
        <div class="header d-flex justify-content-center mt-3">
            <img src="../assets/images/withdraw_i.jpg" class="img-fluid m-2" height="30px" width="30px">
            <h3 class="m-2 text-info">Withdraw</h3>
        </div>
        <h6 class="text-dark text-center mt-3">Withdraw method</h6>
        <div class="d-flex row">
            <div class="col-6">
                <img class="p-2 border rounded mt-5 d-block m-auto" width="100px" height="100px"
                    src="../assets/images/n_logo.png" alt="" />

                <div class="bg-danger rounded border border-success small mt-2 text-center text-white py-1 px-1 w-50 d-block m-auto">
                    <span class="font-bolder">নগদ</span>
                </div>
            </div>
            <div class="col-6">
                <img class="p-2 border rounded mt-5 d-block m-auto" width="100px" height="100px"
                    src="../assets/images/b_logo.png" alt="" />
                <div class="bg-warning rounded border border-success small mt-2 text-center text-black py-1 px-1 w-50 d-block m-auto">
                    <span class="font-bolder">বিকাশ</span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center items-center mt-10 bg-dark-50 p-3 rounded border-success border m-2 mt-5">
            <form action="" method="post" class="mb-5 mt-3">
                <div>
                    <p class='text-danger small mt-3'>** মোবাইল ব্যাংকিং এবং আনুসাঙ্গিক খরচের জন্য আপনার withdraw balance বাদে ৫% কর্তন করা হবে। </p>
                    <div>
                        <label htmlFor="" class="ml-2 text-success er">
                            আপনি কোন মাধ্যমে টাকা নিবেন <span class="text-danger">*</span>
                        </label>
                        <select style="width: 100%" class="border p-2 mt-2 small" name="method" id="">
                            <option value="bkash">বিকাশ</option>
                            <option value="nagat">নগদ</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <label htmlFor="" class="ml-2 text-success er">
                            আপনি কোন নাম্বারে টাকা নিবেন  <span class="text-danger">*</span>
                        </label>
                        <input type="number" name="number" style="width: 100%" class="border p-2 mt-2" profile="Enter Your Number" required  placeholder="নাম্বার"/>

                        <input name="q" value="withdraw" hidden>
                    </div>
                    <div class="mt-5">
                        <label htmlFor="" class="ml-2 text-success er">
                            কত টাকা Withdraw করবেন <span class="text-danger">*</span>
                        </label>
                        <select name="amount" style="width: 100%" class="border p-2 small" required>
                            <option value="200">৳ 200</option>
                            <option value="400">৳ 400</option>
                            <option value="500">৳ 500</option>
                            <option value="1000">৳ 1000</option>
                        </select>
                    </div>
                    <!-- =================Submit starts here==================== -->
                    <?php
                    if($balance < 210){
                        echo "<p class='text-danger small mt-3'>** আপনার পর্যাপ্ত পরিমান balance নেই </p>";
                        echo "<input class='btn btn-success d-block mt-3 form-control' value='Withdraw' disabled/>";
                    }else if($t_ref_for_with < 5){
                        echo "<p class='text-danger small mt-3'>** আপনাকে সর্বনিম্ন ৫ টি একটিভ রেফার করতে হবে </p>";
                        echo "<input class='btn btn-success d-block mt-3 form-control' value='Withdraw' disabled/>";
                    }else{
                        echo "<input type='submit' class='btn btn-success d-block mt-3 form-control' value='Withdraw'/>";
                    }
                    ?>
                    <!-- =================Submit ends here==================== -->
                </div>
            </form>
        </div>
    </div>
</body>
</html>