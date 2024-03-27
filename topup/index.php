<?php
require '../includes/dbconnect.php';

$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = $id";
$fatch = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($fatch);
$t_ref = $user_data['t_ref_for_withdraw'];
$balance = $user_data['balance'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <title>Top-Up | Earning Matrix</title>
</head>
<body>
    <?php
    if (isset($_REQUEST['oparetor'])) {
        $phone = $_REQUEST["number"];
        $oparetor = $_REQUEST["oparetor"];
        $amount = $_REQUEST["amount"];
        $commission = ($amount * 5) / 100;
        $total_coust = ($amount + $commission);

        if ($balance >= $total_coust) {
            $balance -= $total_coust;

            $sql = "UPDATE users SET balance = '$balance' WHERE id = $id";

            if (strlen($phone) != 11) {
                echo "<script>Swal.fire({ position: 'top-end', icon: 'error', title: 'সঠিক ১১ সংখ্যার নাম্বার লিখুন...!', showConfirmButton: false, timer: 3000});</script>";
            } else {
                //query all data
                mysqli_query($conn, $sql); //update balance
                $sql = "INSERT INTO topup ( user_id, number, amount, oparetor, commission) VALUES ( '$id', '$phone', '$amount', '$oparetor', '$commission')";
                $query = false; //mysqli_query($conn, $sql);
                if ($query) {
                    echo "<script>Swal.fire({ position: 'top-end', icon: 'success', title: 'Successfully Data inserted..!', showConfirmButton: false, timer: 3000});</script>";
                }
            }
        }else {
            echo "<script>Swal.fire({ position: 'top-end', icon: 'error', title: 'আপনার পর্যাপ্ত পরিমান balance নেই...!', showConfirmButton: false, timer: 3000});</script>";
        }
    }
    ?>
    <div class="container">
        <div class="header d-flex justify-content-center mt-3">
            <img src="../assets/images/topup_i.jpg" class="img-fluid m-2" height="30px" width="30px">
            <h3 class="m-2 text-info">Top-Up</h3>
        </div>
        <h6 class="text-dark text-center mt-3">Top-Up Operator</h6>
        <div class="d-flex row">
            <div class="col-4">
                <div
                    class="bg-primary rounded border border-success small mt-2 text-center text-white py-1 px-1  d-block m-auto">
                    <span class="font-bolder">Grameenphone</span>
                </div>
            </div>
            <div class="col-4">
                <div
                    class="bg-warning rounded border border-success small mt-2 text-center text-black py-1 px-1  d-block m-auto">
                    <span class="font-bolder">Skitto</span>
                </div>
            </div>
            <div class="col-4">
                <div
                    class="bg-danger rounded border border-success small mt-2 text-center text-white py-1 px-1  d-block m-auto">
                    <span class="font-bolder">Robi</span>
                </div>
            </div>
            <div class="col-4">
                <div
                    class="bg-success rounded border border-success small mt-2 text-center text-white py-1 px-1  d-block m-auto">
                    <span class="font-bolder">Teletalk</span>
                </div>
            </div>
            <div class="col-4">
                <div
                    class="bg-info rounded border border-success small mt-2 text-center text-black py-1 px-1  d-block m-auto">
                    <span class="font-bolder">Banglalink</span>
                </div>
            </div>
            <div class="col-4">
                <div
                    class="bg-secondary rounded border border-success small mt-2 text-center text-white py-1 px-1  d-block m-auto">
                    <span class="font-bolder">Airtel</span>
                </div>
            </div>
        </div>
        <div
            class="d-flex justify-content-center items-center mt-10 bg-dark-50 p-3 rounded border-success border m-2 mt-5">
            <form action="" method="post" class="mb-5">
                <div>
                    <p class='text-danger small mt-3'>** মোবাইল ব্যাংকিং এবং আনুসাঙ্গিক খরচের জন্য আপনার top- up balance বাদে ৫% কর্তন করা হবে। </p>
                    <div>
                        <label htmlFor="" class="ml-2 text-success er">
                            আপনি কোন অপারেটরের মাধ্যমে টাকা নিবেন <span class="text-danger">*</span>
                        </label>
                        <select style="width: 100%" class="border p-2 mt-2" name="oparetor" id="">
                            <option value="Grameenphone">Grameenphone</option>
                            <option value="Skitto">Skitto</option>
                            <option value="Robi">Robi</option>
                            <option value="Teletalk">Teletalk</option>
                            <option value="Banglalink">Banglalink</option>
                            <option value="Airtel">Airtel</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <label htmlFor="" class="ml-2 text-success er">
                            আপনি কোন নাম্বারে টাকা নিবেন <span class="text-danger">*</span>
                        </label>
                        <input type="number" name="number" minlength="11" maxlength="11" style="width: 100%"
                            class="border p-2 mt-2" profile="Enter Your Number" required placeholder="নাম্বার" />

                        <input name="q" value="topup" hidden>
                    </div>
                    <div class="mt-5">
                        <label htmlFor="" class="ml-2 text-success er">
                            কত টাকা Top-Up করবেন <span class="text-danger">*</span>
                        </label>
                        <select name="amount" style="width: 100%" class="border p-2" required>
                            <option value="200">৳ 200</option>
                            <option value="400">৳ 400</option>
                            <option value="500">৳ 500</option>
                            <option value="1000">৳ 1000</option>
                        </select>
                        <input name="q" value="topup" hidden>
                    </div>
                    <!-- =================Submit starts here==================== -->
                    <?php
                    if($balance < 210){
                        echo "<p class='text-danger small mt-3'>** আপনার পর্যাপ্ত পরিমান balance নেই </p>";
                        echo "<input class='btn btn-success d-block mt-3 form-control' value='Top- Up' disabled/>";
                    }else if($t_ref < 2){
                        echo "<p class='text-danger small mt-3'>** আপনাকে সর্বনিম্ন ২ টি একটিভ রেফার করতে হবে </p>";
                        echo "<input class='btn btn-success d-block mt-3 form-control' value='Top- Up' disabled/>";
                    }else{
                        echo "<input type='submit' class='btn btn-success d-block mt-3 form-control' value='Top- Up'/>";
                    }
                    ?>
                    <!-- =================Submit ends here==================== -->
                </div>
            </form>
        </div>
    </div>
</body>

</html>