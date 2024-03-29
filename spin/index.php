<?php
require "../includes/dbconnect.php";
$id = $_SESSION["id"];
$sql = "SELECT * FROM users WHERE id = '$id';";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$targetDate = $row["last_spin"];

?>
<head>
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline:none;
            font-family: 'Poppins', sans-serif;
        }
        .mainbox{
            position: relative;
            width: 300px;
            height: 300px;
            margin-top: 50px;
        }
        .mainbox:after{
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            background:url(/assets/images/win.png) no-repeat;
            background-size: 5%;
            left: 5%;
            top: 48%;
            transform: rotate(90deg);
        }
        .box{
            width: 100%;
            height: 100%; 
            position: relative;
            border-radius: 50%;
            border: 10px solid whitesmoke;
            overflow: hidden;
            transition: all ease-in-out 5s;
            transform: rotate(90deg);
        }
        .span1{
            clip-path: polygon(0 17%, 0 50%, 50% 50%);
            background-color: green;
        }
        .span2{
            clip-path: polygon(0 17%, 30% 0, 50% 50%);
            background-color: red;
        }
        .span3{
            clip-path: polygon(30% 0, 65% 0, 50% 50%);
            background-color: blue;
        }
        .span4{
            clip-path: polygon(65% 0, 100% 18%, 50% 50%);
            background-color: #0075c4;
        }
        .span5{
            clip-path: polygon(100% 15%, 100% 50%, 50% 50%);
            background-color: #ff8300;
        }
        .box2 .span3{
            background-color: green;
        }
        .box2{
            width: 100%;
            height: 100%;
            transform: rotate(180deg);
        }
        .box2 .span1{
            background: #333;
        }
        .font{
            color: #ffffff;
            font-size: 20px;
            width: 100%;
            height: 100%;
            display: inline-block;
            position: absolute;
        }
        .box1 .span1 h5{
            position: absolute;
            top: 38%;
            right: 70%;
            transform: rotate(200deg);
            text-align: center;
        }
        .box1 .span2 h5{
            position: absolute;
            top: 20%;
            right: 62%;
            transform: rotate(-130deg);
            text-align: center;
        }
        .box1 .span3 h5{
            position: absolute;
            top: 15%;
            right: 42%;
            transform: rotate(-90deg);
            text-align: center;
        }
        .box1 .span4 h5{
            position: absolute;
            top: 19%;
            right: 20%;
            transform: rotate(-45deg);
            text-align: center;
        }
        .box1 .span5 h5{
            position: absolute;
            top: 35%;
            right: 12%;
            transform: rotate(-15deg);
            text-align: center;
        }
        .box2 .span1 h5{
            position: absolute;
            top: 34%;
            right: 70%;
            transform: rotate(200deg);
            text-align: center;
        }
        .box2 .span2 h5{
            position: absolute;
            top: 20%;
            right: 60%;
            transform: rotate(-130deg);
            text-align: center;
        }
        .box2 .span3 h5{
            position: absolute;
            top: 15%;
            right: 40%;
            transform: rotate(270deg);
            text-align: center;
        }
        .box2 .span4 h5{
            position: absolute;
            top: 20%;
            right: 20%;
            transform: rotate(310deg);
            text-align: center;
        }
        .box2 .span5 h5{
            position: absolute;
            top: 35%;
            right: 10%;
            transform: rotate(-20deg);
            text-align: center;
        }

        .spin{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-90deg);
            width: 75px;
            height: 75px;
            border-radius: 50%;
            border: 4px solid white;
            background: #1D76E5;
            color: #fff;
            box-shadow: 0 5px 20px #000;
            font-weight: bolder;
            font-size: 22px;
            cursor: pointer;
            z-index: 1000;
        }
        .spin:active{
            width: 75px;
            height: 70px;
            font-size: 20px;
        }
        .mainbox.animate:after{
            animation: animateArrow 0.7s ease infinite;
        }

        audio{display: none;}

        @keyframes animateArrow{
            50%{
                right: -50px;
            }
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
<section style="justify-content: center; display: flex;">
    <div>
    <h1 class="text-4xl font-bold text-center ">Daily spin</h1>
    <div class="flex justify-center items-center bg-cover bg-center ">
        <div class="mainbox" id="mainbox">
            <div class="box" id="box">
                <div class="box1">
                    <span class="font span1"><h5><b>Lucky</b></h5></span>
                    <span class="font span2"><h5><b>Lucky</b></h5></span>
                    <span class="font span3"><h5><b>Lucky</b></h5></span>
                    <span class="font span4"><h5><b>Lucky</b></h5></span>
                    <span class="font span5"><h5><b>Lucky</b></h5></span>
                </div>
                <div class="box2">
                    <span class="font span1"><h5><b>Lucky</b></h5></span>
                    <span class="font span2"><h5><b>Lucky</b></h5></span>
                    <span class="font span3"><h5><b>Lucky</b></h5></span>
                    <span class="font span4"><h5><b>Lucky</b></h5></span>
                    <span class="font span5"><h5><b>Lucky</b></h5></span>
                </div>
                <button class="spin" onclick="openConfirmation()">SPIN</button>
            </div>
        </div>
    </div>
    <audio class="hidden" controls="controls" id="hoory" src="assets/hoory.mp3" type="audio/mp3"></audio>
    <audio class="hidden" controls="controls" id="wheel" src="assets/wheel.mp3" type="audio/mp3"></audio>
        <div style="text-align: center; justify-content: center;">
            <!-- <h1>Timer</h1>
            <p id="countdown"></p> -->
        </div>
    </div>
    <div id="confirmationDialog" class="confirmation-dialog">
        <div class="dialog-content">
            <p>আপনি কি স্পিন এর মাধ্যমে ইনকাম করতে চান...? <br> প্রতি স্পিনের জন্য আপনাকে ১০ টাকা খরচ করতে হবে</p>
            <div class="buttons">
                <button onclick="confirmAction()" class="btn btn-success">Yes</button>
                <button onclick="closeConfirmation()" class="btn btn-danger">No</button>
            </div>
        </div>
    </div>

    <script>
        const balance = <?= $user['balance'] ?>;
        function openConfirmation() {
            document.getElementById('confirmationDialog').style.display = 'block';
        }

        function closeConfirmation() {
            document.getElementById('confirmationDialog').style.display = 'none';
        }

        function confirmAction() {
            closeConfirmation();
            spin();
        }

        /*
        let isAvailable = false;
        // লক্ষ্যমূলক সময় তৈরি
        const targetD = new Date(<?php echo json_encode($targetDate); ?>);


        // ২৪ ঘণ্টা যোগ করা
        targetD.setHours(targetD.getHours() + 24);

        targetDate = targetD.getTime();


        // ইন্টারভাল নির্ধারণ
        const interval = 1000;

        // কাউন্টডাউন এর ফাংশন
        function updateCountdown() {
        const currentDate = new Date().getTime();
        const difference = targetDate - currentDate;

        if (difference <= 0) {
            // লক্ষ্যমূলক সময় এর পূর্ণ হয়ে গিয়েছে
            document.getElementById("countdown").innerHTML = "You can spin now..!";
            isAvailable = true;
        } else {
            // বাকি সময় ক্যালকুলেট করুন
            //const days = Math.floor(difference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((difference % (1000 * 60)) / 1000);

            // সময় প্রদর্শন করুন
            document.getElementById("countdown").innerHTML = `${hours} hour ${minutes} minite ${seconds} seconds left  !! `;
        }
        }

        // ইন্টারভাল এর সাহায্যে প্রতিস্থানে বা যে কোন পয়েন্টে count down আপডেট করুন
        setInterval(updateCountdown, interval);

        // পৃষ্ঠার লোড হলে ইউজারের তথ্য দেখানো
        updateCountdown();
    */
    
    function spin() {
        if (balance >= 10) {
            wheel.play();

            const box = document.getElementById("box");
            const element = document.getElementById("mainbox");

            box.style.setProperty("transition", "all ease 5s");
            box.style.transform = "rotate(5000deg)";
            element.classList.remove("animate");

            setTimeout(function () {
            element.classList.add("animate");
            }, 5000);

            setTimeout(function () {		//alert

            var numbers = [5, 5, 5, 5, 6, 6, 6, 6, 7, 7];
            var randomIndex = Math.floor(Math.random() * numbers.length);

            /*=========== for alert=======*/
            hoory.play();
            Swal.fire({
                title: "Congrass...!",
                text: "you have won " + numbers[randomIndex] + " TAKA!",
                icon: "success"
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../spin/spin.php?number=" + numbers[randomIndex];
                hoory.pause();
            }
            });
            //===========
            wheel.pause();
            }, 5000);

            setTimeout(function () {
            box.style.setProperty("transition", "initial");
            box.style.transform = "rotate(90deg)";
            }, 5000);
        }  else {
        Swal.fire({
        title: "Not Available!",
        text: "you don't have enough baalance.. ",
        icon: "error"
        })
        }

    }
    </script>
    </section>
    <!-- daily spin section end -->