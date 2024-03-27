<?php
if(!isset($_SESSION["id"])){
  header("location: ../auth");
  die("login failed");
}
require "../includes/dbconnect.php";
$id = $_SESSION["id"];
$sql = "SELECT * FROM users WHERE id = '$id';";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$ref_code = $row['my_ref_code'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>REFER | earning matrix</title>
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/png" />
    <link href="style.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <style>
      * {
        margin: 0px;
        padding: 0px;
        transition: all 0.5s ease 0s;
        -webkit-transition: all 0.5s ease 0s;
        -moz-transition: all 0.5s ease 0s;
        -ms-transition: all 0.5s ease 0s;
        -o-transition: all 0.5s ease 0s;
      }
      img,
      fieldset {
        border: 0;
      }
      a {
        outline: none;
        border: none;
      }
      img {
        max-width: 100%;
        height: auto;
        width: auto\9;
        vertical-align: middle;
        border: none;
        outline: none;
      }
      .clear {
        clear: both;
      }
      .share-boxes p {
        margin: 15px 0 0;
        font-size: 15px;
        font-weight: bold;
      }
      .share-boxes {
        background: #f9f9f9;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 0 17px #ccc;
        padding: 20px 0;
        position: relative;
      }
      .share-boxes img.dotted-line {
        position: absolute;
        left: -167px;
        top: 5px;
        transform: rotate(-3deg);
      }
      .share-boxes img.dotted-line2 {
        position: absolute;
        right: -173px;
        top: 5px;
        transform: rotate(-4deg);
      }
      .refer-image img {
        width: 100%;
      }
      .refer-form ul li {
        float: left;
        list-style: none;
        width: 33.333%;
        text-align: center;
      }
      .refer-form ul li a {
        background: #9fb0f8;
        display: block;
        padding: 14px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
      }
      .refer-form ul {
        margin: 0;
      }
      .refer-form ul li.facebook-color a {
        background: #9fb0f8;
      }
      .refer-form ul li.youtube-color a {
        background: #eb8c8c;
      }
      .refer-form ul li.twitter-color a {
        background: #9cd0fc;
      }
      .refer-form ul li.facebook-color a:hover {
        background: #4667f7;
        text-decoration: none;
      }
      .refer-form ul li.youtube-color a:hover {
        background: #dd2020;
        text-decoration: none;
      }
      .refer-form ul li.twitter-color a:hover {
        background: #40a7ff;
        text-decoration: none;
      }
      .refer-form-content {
        float: left;
        width: 100%;
        background: #f9f9f9;
        padding: 30px;
      }
      .refer-form-content h2 {
        color: #ffc3c9;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 25px;
        margin: 0 0 10px;
      }
      .refer-form-content P a {
        color: #ffc3c9;
        font-weight: 500;
      }
      .refer-form-content input {
        height: 50px;
        width: 100%;
        padding: 15px;
        border-radius: 1px;
        margin-bottom: 20px;
        box-shadow: 0 0 6px #ccc;
      }
      .container-checkbox {
        display: block;
        position: relative;
        padding-left: 30px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 16px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .container-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
      }
      .checkmark {
        position: absolute;
        top: 3px;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: transparent;
        border: 2px solid #ffc3c9;
      }
      .container-checkbox:hover input ~ .checkmark {
        background-color: #ccc;
      }
      .container-checkbox input:checked ~ .checkmark {
        background-color: #ffc3c9;
      }
      .checkmark:after {
        content: "";
        position: absolute;
        display: none;
      }
      .container-checkbox input:checked ~ .checkmark:after {
        display: block;
      }
      .container-checkbox .checkmark:after {
        left: 5px;
        top: 0px;
        width: 7px;
        height: 12px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
      }
      .refer-form-content form button {
        background: #ffc3c9;
        color: #fff;
        font-weight: 500;
        font-size: 18px;
        width: 100%;
        height: 50px;
        cursor: pointer;
      }
      .refer-form-content form button:hover {
        background: #000;
      }
      .refer-form-content input::placeholder {
        color: #c5c5c5;
        font-size: 14px;
      }
      .row.refer-form-sec {
        height: 450px;
        overflow: hidden;
        margin-top: 55px;
      }
      .referal-progress table td:nth-child(2) {
        text-align: right;
      }
      .referal-progress table td {
        border: 1px solid #cccc;
        padding: 15px 20px;
      }
      .row.refer-form-sec .col:first-child {
        padding-right: 0;
      }
      .row.refer-form-sec .col:last-child {
        padding-left: 0;
      }
      .referal-progress h2 {
        color: #ffc3c9;
        font-size: 22px;
        margin: 10px 0 15px;
      }
      .share-boxes:after {
        content: "";
        background: url("https://i.ibb.co/WHdS3G1/circle.png") no-repeat 0 0;
        position: absolute;
        left: 0;
        right: 0;
        bottom: -65px;
        margin: 0 auto;
        z-index: 99999;
        height: 60px;
        width: 20px;
      }
      @media only screen and (max-width: 1100px) {
        .share-boxes img.dotted-line,
        .share-boxes img.dotted-line2 {
          display: none;
        }
      }
      @media only screen and (max-width: 767px) {
        .share-boxes {
          margin: 0 0 52px;
        }
        .row.refer-form-sec {
          height: auto;
          overflow: hidden;
          margin-top: 55px;
          display: block;
        }
        .row.refer-form-sec .col:first-child {
          padding-right: 15px;
          margin: 0 0 30px;
        }
        .row.refer-form-sec .col:last-child {
          padding-left: 15px;
        }
      }
      @media only screen and (max-width: 380px) {
        .refer-form ul li a {
          padding: 9px;
          font-size: 14px;
        }
        .refer-form-content h2 {
          font-size: 22px;
        }
      }
  </style>
  </head>

  <body>
    <div class="container">
      <div class="row m-4 justify-content-center text-center text-white">
        <div class="col-sm-12 col-md-12">
          <p class="text-black" id="link"><?php echo "https://earningmatrix.shop/auth/?s&ref=$ref_code"; ?></p>
          <button class="btn btn-success" onclick="link()" id="x">Copy refer link</button>
        </div>
        <div class="col-sm-12 col-md-12 mt-4">
          <p class="text-black" id="code"><?php echo "$ref_code"; ?></p>
          <button class="btn btn-primary" onclick="code()" id="y">Copy refer code</button>
        </div>
      </div>
      
      <div class="row mt-3 mb-3">
        <div class="col-sm-12 col-md-3">
          <div class="share-boxes">
            <img src="../assets/images/img1.png"
              alt="img1" />
            <p>Share with your friends</p>
          </div>
        </div>
        <div class="col"></div>
        <div class="col-sm-12 col-md-3">
          <div class="share-boxes">
            <img
              src="../assets/images/img2.png"
              alt="img2"
            />
            <p>Give her to Discount</p>
            <img
              src="../assets/images/dotted-arrow1.png"
              alt="dotted-arrow1"
              class="dotted-line"
            />
            <img
              src="../assets/images/dotted-arrow2.png"
              alt="dotted-arrow2"
              class="dotted-line2"
            />
          </div>
        </div>
        <div class="col"></div>
        <div class="col-sm-12 col-md-3">
          <div class="share-boxes">
            <img
              src="../assets/images/img3.png"
              alt="img3"
            />
            <p>Get bonus for every active user</p>
          </div>
        </div>
      </div>
      <div class="row refer-form-sec">
        <div class="col">
          <div class="refer-image">
            <img
              src="../assets/images/big-image.jpg"
              alt="big-image" class="img-fluid" width="300px"
            />
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script><script>
        var textToCopy = "";
        function link(){
            // স্ট্রিং সিলেক্ট করুন
            textToCopy = document.getElementById("link");
            copy();
        }
        function code(){
            // স্ট্রিং সিলেক্ট করুন
            textToCopy = document.getElementById("code");
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
        //Swal.fire({ position: "top-end", icon: "success",title: "Text has been copied!",  showConfirmButton: false, timer: 1500 });
      }
    </script>
  </body>
</html>
