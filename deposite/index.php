<!DOCTYPE html>
<html lang="en">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<head>
</head>
<?php
require "../includes/dbconnect.php";

//get account number mobail banking
$sql = "SELECT * FROM contact WHERE id = 1";
$fatch = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($fatch);

$bkash = $row['b_number'];
$nagad = $row['n_number'];
//end  

// session_start();
// if (!isset($_SESSION["id"])) {
//     header("location: ../auth");
//     die("login failed");
// }

    if (isset($_FILES['img'])) {
        $phone = $_REQUEST["number"];
        $method = $_REQUEST["method"];
        $amount = $_REQUEST["amount"];
        $id = $_SESSION['id'];
        if(strlen($phone) != 11){
            echo "<script>Swal.fire({ position: 'top-end', icon: 'error', title: 'সঠিক ১১ সংখ্যার নাম্বার লিখুন...!', showConfirmButton: false, timer: 3000});</script>";
        }else{
            //upload img
            $src = $_FILES['img']["tmp_name"];
            $img = uniqid()."-" . $_FILES['img']["name"];
            $target = "../assets/screensort/" . $img;
            move_uploaded_file($src, $target);
            //query all data
            $sql = "INSERT INTO deposit ( user_id, number, amount, method, img ) VALUES ( '$id', '$phone', '$amount', '$method', '$img' )";
            $query = mysqli_query($conn, $sql);
            if ($query) { ?>
                <div class="bg-success">
                    <script>
                        Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Successfully Data inserted..!",
                        showConfirmButton: false,
                        timer: 1500
                        });
                        window.location.href = "../home/?q=depo_his";
                    </script>
                </div>
            <?php }
        }
    }
?>
<body>
    <section class="mt-4">
        <h1 class='text-primary text-center'>Deposite Balance</h1>
        <div class="bg-light p-2 rounded">
            <p class="text-black text-center mb-2 small">
                নিচের বিকাশ/নগদ নাম্বারটি কপি করে আপনার বিকাশ/নগদ আপস থেকে taka সেন্ড মানি করুন ।
            </p>
            <h3 class="text-info text-center">
                Payment Method
            </h3>
            <div class="d-flex justify-content-center items-center">
                <div class="d-flex row">
                    <div class="col-6">
                        <img class="p-2 border rounded mt-5 img-fluid d-block m-auto" width="100px" height="100px"
                            src="../assets/images/n_logo.png" alt="" />

                        <div class="bg-danger rounded border border-success small mt-2 text-center text-white py-1 px-3">
                            <p onclick="copyNNum()" class="d-block m-auto">
                                <span><b id="n-num"><?php echo $nagad; ?></b></span> <span><i class="fa fa-copy"></i></span><br><span><b>নগদ</b></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <img class="p-2 border rounded mt-5 d-block m-auto" width="100px" height="100px"
                            src="../assets/images/b_logo.png" alt="" />
                        <div class="bg-warning rounded border border-success small mt-2 text-center text-black py-1 px-3">
                            <p onclick="copyBNum()" class="d-block m-auto">
                                <span><b id="b-num"><?php echo $nagad; ?></b></span> <span><i class="fa fa-copy"></i></span><br><span><b>বিকাশ</b></span>
                            </p>
                        </div>
                    </div>
                </div>
                <script>
                    var textToCopy = "";
                    function copyNNum(){
                        // স্ট্রিং সিলেক্ট করুন
                        textToCopy = document.getElementById("n-num");
                        copy();
                    }
                    function copyBNum(){
                        // স্ট্রিং সিলেক্ট করুন
                        textToCopy = document.getElementById("b-num");
                        copy();
                    }

                    function copy() {
                    const textRange = document.createRange();
                    textRange.selectNode(textToCopy);

                    // ক্লিপবোর্ডে কপি করুন
                    const selection = window.getSelection();
                    selection.removeAllRanges();
                    selection.addRange(textRange);
                    document.execCommand("copy");

                    // সিলেক্টন রিমুভ করুন
                    selection.removeAllRanges();

                    // কপি হয়েছে মেসেজ দেখানো
                    Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Text has been copied!",
                    showConfirmButton: false,
                    timer: 1500
                    });
                    }
                </script>
            </div>

            <div class="text-black text-justify small p-2">
                <p>
                   উপরের বিকাশ/নগদ নাম্বারে সেন্ড মানি করার পর নিচের ফ্রম টি পুরন করুন। প্রথমে সিলেক্ট করুন আপনি কোন মাধ্যমে টাকা পাঠিয়েছেন। দ্বিতীয়তে আপনি যে নাম্বার থেকে টাকা পাঠিয়েছেন সেই নাম্বারটি দিন। তারপরে আপনার দেওয়া সেন্ট-মানির স্ক্রিনশর্ট দিন । তারপর <strong>Verify</strong> এ ক্লিক করুন ।
                </p>
            </div>
        </div>

        <div
            class="d-flex justify-content-center items-center mt-10 bg-dark-50 p-3 rounded border-success border m-2">
            <form action="" method="post" class="mb-5" enctype="multipart/form-data">
                <div class="text-sm">
                    <div>
                        <label htmlFor="" class="ml-2 text-success er">
                            আপনি কোন মাধ্যমে টাকা পাঠিয়েছেন <span class="text-danger">*</span>
                        </label>
                        <select style="width: 100%" class="border p-2 mt-2" name="method" id="">
                            <option value="bkash">বিকাশ</option>
                            <option value="nagat">নগদ</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <label htmlFor="" class="ml-2 text-success er">
                            আপনি কোন নাম্বার থেকে টাকা পাঠিয়েছেন <span class="text-danger">*</span>
                        </label>
                        <input type="number" name="number" style="width: 100%" class="border p-2 mt-2" profile="Enter Your Number"
                            required placeholder="নাম্বার"/>

                        <input name="q" value="deposite" hidden>
                    </div>
                    <div class="mt-5">
                        <label htmlFor="" class="ml-2 text-success er">
                            কত টাকা ডিপোজিট করেছেন *
                        </label>
                        <select name="amount" style="width: 100%" class="border p-2" required>
                            <option value="100">৳100</option>
                            <option value="200">৳200</option>
                            <option value="400">৳400</option>
                            <option value="500">৳500</option>
                            <option value="1000">৳1000</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <label htmlFor="" class="ml-2 text-success er">
                            স্ক্রিনশর্ট টি দিন <span class="text-danger">*</span>
                        </label>
                        <input type="file" name="img" style="width: 100%" class="border p-2 mt-2" required />
                    </div>
                    <input type="submit" style="width: 100%"
                        class="btn btn-success d-block mt-3"
                        value="Verify" />
                </div>
            </form>
        </div>
    </section>
</body>

</html>
<?php
//}
?>
<!--================ Activition Section End ==========-->