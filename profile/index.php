<?php
require "../includes/dbconnect.php";
session_start();// Fill session id with user's id to get user's data like name and image name
if(!isset($_SESSION["id"])){
  header("location: ../auth");
  die("login failed");
}
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $sessionId"));
$my_ref = $user['my_ref_code'];
$email = $user['email'];
$email_verify = $user['email_verify'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Earning Matrix | Profile | make money online</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.jss">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="../assets/images/logo.png" type="image/png" />
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
  <script src="script.js"></script>
  <style>
    .logo_item {
      display: flex;
      align-items: center;
      column-gap: 10px;
      font-size: 15px;
      font-weight: 500;
      color: var(--blue-color);
    }
    .navbar-img {
      width: 25px;
      height: 25px;
      object-fit: cover;
      border-radius: 50%;
    }
    .card-box {
        position: relative;
        color: #fff;
        padding: 20px 10px 40px;
        margin: 20px 0px;
    }
    .card-box:hover {
        text-decoration: none;
        color: #f1f1f1;
    }
    .card-box:hover .icon i {
        font-size: 100px;
        transition: 1s;
        -webkit-transition: 1s;
    }
    .card-box .inner {
        padding: 5px 10px 0 10px;
    }
    .card-box h3 {
        font-size: 20px;
        font-weight: bold;
        margin: 0 0 8px 0;
        white-space: nowrap;
        padding: 0;
        text-align: left;
    }
    .card-box p {
        font-size: 14px;
    }
    .card-box .icon {
        position: absolute;
        top: auto;
        bottom: 5px;
        right: 5px;
        z-index: 0;
        font-size: 72px;
        color: rgba(0, 0, 0, 0.15);
    }
    
    .bg-blue {
        background-color: #00c0ef !important;
    }
    .bg-green {
        background-color: #00a65a !important;
    }
    .bg-orange {
        background-color: #7B66FF !important;
    }
    .bg-red {
        background-color: #ED5AB3 !important;
    }
  </style>
</head>

<body style="background-color: white">

  <div class="container d-flex justify-content-center h-full" style="height: 100%;">
    <div class="card p-4">
      <div class="mt-1 row">
        <div class="col-10"><a href="../home/">
          <div><div class="logo_item">
            <img class="navbar-img" src="../assets/images/logo.png" alt="logo" />Earning<span><b>Matrix</b></span></a>
          </div></div>
        </div>
        <div class="col-2">
        <a href="<?php echo "sms:?body=https://earningmatrix.shop/auth/?s&ref=$my_ref"; ?>"><i class="fa fa-share"></i></a>
        </div>
      </div>
      <hr>
      <?php
        if($email_verify == "Pending"){ ?>
          <div class="bg-danger rounded my-2 row">
            <p class="text-white m-1 pt-2 d-inline col-8">Email is not varify</p>
            <a href="<?php echo "../otp/index.php?email=$email&p=new"; ?>"class="btn btn-success my-2 ml-auto col-3">Verify</a>
          </div>
      <?php }
      ?>
      
      <div class="image d-flex flex-column justify-content-center align-items-center">

        <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
          <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
          <div class="upload">
            <img src="../assets/profile_img/<?php echo $user['image']; ?>" id="image">

            <div class="rightRound" id="upload">
              <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
              <i class="fa fa-camera"></i>
            </div>

            <div class="leftRound" id="cancel" style="display: none;">
              <i class="fa fa-times"></i>
            </div>
            <div class="rightRound" id="confirm" style="display: none;">
              <input type="submit">
              <i class="fa fa-check"></i>
            </div>
          </div>
        </form>
        <script>
          document.getElementById("fileImg").onchange = function () {
            document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

            document.getElementById("cancel").style.display = "block";
            document.getElementById("confirm").style.display = "block";

            document.getElementById("upload").style.display = "none";
          }

          var userImage = document.getElementById('image').src;
          document.getElementById("cancel").onclick = function () {
            document.getElementById("image").src = userImage; // Back to previous image

            document.getElementById("cancel").style.display = "none";
            document.getElementById("confirm").style.display = "none";

            document.getElementById("upload").style.display = "block";
          }
        </script>
        <div>
          <span class="name d-flex flex-row mt-3 justify-content-center align-items-center"><?php echo $user['name']; if($user['status'] == "Approved") echo "<img src='../assets/profile_img/verify.png' alt='verified' width='25'
              height='25' >"; ?></span>
          <div class="d-flex flex-row justify-content-center align-items-center gap-2" onclick="copyref()">
            <span class="idd1" id='my_ref'><?php echo $user['my_ref_code']; ?></span>
            <span><i class="fa fa-copy"></i></span>
          </div>
          <div class="d-flex flex-row justify-content-center align-items-center">
          <?php 
            $ot_ref = $user['ot_ref_code'];
            $query = mysqli_query($conn, "SELECT name FROM users WHERE my_ref_code = '$ot_ref'");
            if(mysqli_num_rows($query) != 0){
              $ot_user = mysqli_fetch_assoc($query);
              $ot_name = $ot_user['name'];
              echo "<div class='text mt-1'> <span><b>Refarence by: </b>$ot_name ( $ot_ref )</span></div>";
            }
          ?>

            
          </div>
          <div><span class="join d-flex flex-row justify-content-center align-items-center">Join: <?php echo $user['join_time']; ?></span></div>


          <div class="d-flex mt-2 justify-content-center align-items-center">
            <a href="../edit/"><button class="btn btn-success">Edit Profile</button></a>
          </div>
        </div>

        <!-- card start -->
        <div class="row justify-content-center text-center">
          <div class="col-6 w-50 h-25">
            <div class="card-box bg-blue rounded" style="height:100px;">
              <div class="inner">
                <h3 class="text-center"> <?php echo $user['status'];  ?> </h3>
                <p> Lavel </p>
              </div>
              <div class="icon">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
              </div>
            </div>
          </div>

          <div class="col-6 w-50 h-25">
            <div class="card-box bg-green rounded" style="height:100px;">
              <div class="inner">
                <h3 class="text-center"> &#2547; <?php echo $user['balance'] ?> </h3>
                <p> Balance </p>
              </div>
              <div class="icon">
                <i class="fa fa-money" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <br>
          <div class="col-6 w-50 h-25">
            <div class="card-box bg-orange rounded" style="height:100px;">
              <div class="inner">
                <h3 class="text-center"> <?php echo $user['t_refer'] ?> </h3>
                <p> Total Refer </p>
              </div>
              <div class="icon">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="col-6 w-50 h-25">
            <div class="card-box bg-red rounded" style="height:100px;">
              <div class="inner">
                <h3 class="text-center"> &#2547;  <?php echo $user['bonus'] ?> </h3>
                <p> Bonus </p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- cards end -->
        <!-- <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
          <span><i class="fa fa-twitter"></i></span>
          <span><i class="fa fa-facebook-f"></i></span>
          <span><i class="fa fa-instagram"></i></span>
          <span><i class="fa fa-linkedin"></i></span>
        </div> -->

      </div>
    </div>
  </div>
  <?php
  if (isset($_FILES["fileImg"]["name"])) {
    //delete old image
    if($user['image'] != "noprofil.jpg"){
      $img_url = "../assets/profile_img/".$user['image'];
      unlink($img_url);
    }
    $id = $_POST["id"];

    $src = $_FILES["fileImg"]["tmp_name"];
    $imageName = $user['id']."-" . $_FILES["fileImg"]["name"];

    $target = "../assets/profile_img/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE users SET image = '$imageName' WHERE id = $id";
    mysqli_query($conn, $query);
    echo "<script>window.location.href=''</script>";
  }
  ?>
  <script>
    function copyref() {
      // স্ট্রিং সিলেক্ট করুন
      const textToCopy = document.getElementById("my_ref");
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
</body>

</html>