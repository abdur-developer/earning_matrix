<?php
require "../includes/dbconnect.php";

//get account number mobail banking
$sql = "SELECT * FROM contact WHERE id = 1";
$fatch = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($fatch);
$tele_link = $row['telegram_link'];
$wa_gn = "+88".$row['contact_number'];
$wa_pas  = "+88".$row['password_wa_num'];
$wa_pay = "+88".$row['payment_wa_num'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/png" />
    <style>
        .notice{
            background-color: #E0F7FA;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header d-flex justify-content-center mt-3">
            <img src="../assets/images/task.jpg" class="img-fluid m-2" height="40px" width="40px">
            <h3 class="m-2 text-info">Customer care</h3>
        </div>
        <div class="rounded notice m-2 p-4">
            <img src="../assets/images/in_notice.jpg" alt="" class="img-fluid d-block m-auto" height="40px" width="40px">
            <p class="small text-danger mt-2">
                আপনার সমস্যাটি আমাদের হেল্প লাইন whatsapp নাম্বারে মেসেজ/কল দিয়ে বিস্তারিত বলুন দ্রুত আপনার সমস্যা সমাধান করে দেওয়া হবে ইন-শা-আল্লাহ . সকাল ৯ টা থেকে রাত ৯ টা পর্যন্ত হেল্প লাইন সার্ভিস চালু থাকবে।
            </p>
        </div>
        <div class="row">
            <!-- =============Telegram start=============== -->
            <div class="col-sm-12 col-md-6 col-xl-3 justify-content-center text-center mt-5">
                <img src="../assets/images/telegram.jpg" alt="" class="img-fluid d-block m-auto" height="40px" width="40px">
                <h3 class="text-black mt-1"><b>Telegram</b></h3>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2" onclick="tele_link()">
                    <span style="font-size: 12px;" id='tele_link'><?php echo $tele_link; ?></span>
                    <span><i class="fa fa-copy"></i></span>
                </div>
                <button class="btn btn-danger mt-2" onclick="go_tele_link()">Chat On Telegram</button>
            </div>
            <!-- =============Telegram end=============== -->
            <!-- =============General start=============== -->
            <div class="col-sm-12 col-md-6 col-xl-3 justify-content-center text-center mt-5">
                <img src="../assets/images/gn_support.jpg" alt="" class="img-fluid d-block m-auto" height="40px" width="40px">
                <h3 class="text-black mt-1"><b>General Support</b></h3>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2" onclick="wa_gn()">
                    <span style="font-size: 12px;" id='wa_gn'><?php echo $wa_gn; ?></span>
                    <span><i class="fa fa-copy"></i></span>
                </div>
                <button class="btn btn-danger mt-2" onclick="go_gn()">Chat On WhatsApp</button>
            </div>
            <!-- =============General end=============== -->
            <!-- =============Password start=============== -->
            <div class="col-sm-12 col-md-6 col-xl-3 justify-content-center text-center mt-5">
                <img src="../assets/images/ps_support.jpg" alt="" class="img-fluid d-block m-auto" height="40px" width="40px">
                <h3 class="text-black mt-1"><b>Password Support</b></h3>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2" onclick="wa_pas()">
                    <span style="font-size: 12px;" id='wa_pas'><?php echo $wa_pas; ?></span>
                    <span><i class="fa fa-copy"></i></span>
                </div>
                <button class="btn btn-danger mt-2" onclick="go_pas()">Chat On WhatsApp</button>
            </div>
            <!-- =============Password end=============== -->
            <!-- =============Payment start=============== -->
            <div class="col-sm-12 col-md-6 col-xl-3 justify-content-center text-center mt-5">
                <img src="../assets/images/pay_support.jpg" alt="" class="img-fluid d-block m-auto" height="40px" width="40px">
                <h3 class="text-black mt-1"><b>Payment Support</b></h3>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2" onclick="wa_pay()">
                    <span style="font-size: 12px;" id='wa_pay'><?php echo $wa_pay; ?></span>
                    <span><i class="fa fa-copy"></i></span>
                </div>
                <button class="btn btn-danger mt-2" onclick="go_pay()">Chat On WhatsApp</button>
            </div>
            <!-- =============Payment End=============== -->
        </div>
        <div class="rounded notice m-2 mt-5 p-4">
            <p class="small text-danger mt-2">
                যদি হেল্পলাইন থেকে রিপ্লাই পেতে দেরি হয় তাহলে , অনুগ্রহ করে একটু অপেক্ষা করুন
            </p>
        </div>
    </div>
    <script>
        var textToCopy;
        function tele_link(){
            textToCopy = document.getElementById("tele_link");
            copy();
        }
        function wa_gn(){
            textToCopy = document.getElementById("wa_gn");
            copy();
        }
        function wa_pas(){
            textToCopy = document.getElementById("wa_pas");
            copy();
        }
        function wa_pay(){
            textToCopy = document.getElementById("wa_pay");
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
        Swal.fire({ position: "top-end", icon: "success", title: "Text has been copied!", showConfirmButton: false, timer: 1500 });
    }
  </script>
  <script>
    function go_tele_link(){
        //redirect telegram
        var tele_link = "<?php echo $tele_link; ?> ";
        window.open(tele_link , '_blank');
    }
    function go_gn(){
        //redirect whatsapp
        var wa_gn = "<?php echo "https://wa.me/".$wa_gn; ?> ";
        window.open(wa_gn , '_blank');
    }
    function go_pas(){
        //redirect whatsapp
        var wa_pas = "<?php echo "https://wa.me/".$wa_pas; ?> ";
        window.open(wa_pas , '_blank');
    }
    function go_pay(){
        //redirect whatsapp
        var wa_pay = "<?php echo "https://wa.me/".$wa_pay; ?> ";
        window.open(wa_pay , '_blank');
    }
    </script>
</body>
</html>