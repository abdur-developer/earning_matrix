<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
      /* .main{
        width: 350px;
      } */
      .img-lot{
        height: 270px;
        width: 450px;
        justify-content: center;
        display: block;
        margin: auto;
      }
      .tk{
        font-weight: 900;
      }
      .card{
        background-color: #e9fdf6;
      }
      .card-title{
        font-size: 20px;
        font-weight: 700;
      }
      .card-text{
        font-size: 17px;
      }
      .balance{
        font-size: 23px;
        font-weight: 900;
      }
      .history{
        background-color: #00897B;
        color: white;
        border: 2px solid blue;
      }
      .history-x{
        background-color: #3F51B5;
        color: white;
        border: 2px solid #F57C00;
      }
      .p-bar{
        margin: 0;
      }
      .p-bar-con{
        padding: 0;
        background-color: #abc8e0;
      }
      .lottary-img {
        height: 180px;
      }
      .progress {
        margin-left: 5px;
      }
    </style>
  </head>
  <!-- ======================== PHP starts here =========================== -->
  <?php
//===========Function================
function generateRandomId() {
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomId = '';

  for ($i = 0; $i < 5; $i++) {
      $randomId .= $characters[rand(0, strlen($characters) - 1)];
  }

  return $randomId;
}
//===========Function================

//session_start();
// if(!isset($_SESSION["id"])){
//   header("location: ../auth");
//   die("login failed");
// }
require "../includes/dbconnect.php";
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $sessionId"));
$name = $user['name'];
$email = $user['email'];
$balance = $user['balance'];


?>

  <body>
  <div class='alert alert-success m-3' role='alert'>The date of the draw will be informed to all of you</div>
    <?php
      
      if(isset($_REQUEST['buying'])){
        $id = $_REQUEST['buying'];
        $price = $_REQUEST['price'];
        if($balance >= $price){
          $balance -= $price;
          $sql = "UPDATE users SET balance = '$balance' WHERE id = $sessionId";
          mysqli_query($conn, $sql);//update balance

          $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$sessionId', 'buy lottary ticket', '$price', '0')";
          mysqli_query($conn, $sql);//add trx history

          $token = generateRandomId();
          $sql = "INSERT INTO lot_ticket (lottary, user_id, name, email, t_token) VALUES ('$id', '$sessionId', '$name', '$email', '$token')";

          if(mysqli_query($conn,$sql)){
            echo "<script> window.location.href='?q=lot&lottery' ;</script>";
          }else{
            echo "<script> window.location.href='?q=lot&failed' ;</script>";
          }
        }else{
          echo "<script> window.location.href='?q=lot&failed' ;</script>";
        }
      }elseif (isset($_REQUEST['lottery'])) { 
        echo "<script> Swal.fire({ title: 'Success...!', text: 'Successfully buying this lottary ticket.... you can buy many ticket ...!', icon: 'success' }); </script>";

      }elseif (isset($_REQUEST['failed'])) { 
        echo "<script> Swal.fire({ title: 'Failed...!', text: 'Failed to buying this lottary ticket.... You don\'t have enough money ...!', icon: 'error' }); </script>";
      }
      ?>
    <div class="container main">
      <!-- Card starts here -->
      <div class="card p-3 m-2">
        <div class="row justify-content-center">
          <!-- ///////////////////////////////////////////////////////////////////////// -->

          <?php 
          $sql = "SELECT * FROM lottary WHERE status = 'Approved'";
          $query = mysqli_query($conn, $sql);
          $num_of_rows = mysqli_num_rows($query);
          
          if($num_of_rows > 0){
            
            while($row = mysqli_fetch_assoc($query)){
              $id = $row['id'];
              $title = $row['title'];
              $sort_des = $row['sort_des'];
              $target = $row['target'];
              $price = $row['price'];

            $sql = "SELECT id FROM lot_ticket WHERE lottary = '$id'";
            $pro = mysqli_query($conn, $sql);
            $progress = mysqli_num_rows($pro);
            $progress = ( $progress / $target ) * 100 ;
            //$progress = 50;
           echo "<div class='card col-md-5 m-2'>
            
           <img src='../assets/images/lottary.jpg' alt=''
            class='img-fluid rounded img-lot mt-1 lottary-img'>          

           <div class='row'>
               <h6 class=' col-12 pl-2'>Progress</h6>
               <div class='col-9 progress rounded p-bar-con'style='height: 12px;'>

                 <div id='progress-bar' class='progress-bar bg-primary rounded p-bar' role='progressbar' style='width: 0%; height: 12px;' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'></div>
               
               </div>
               <p class='col-2 parsent text-center small'>$progress %</p>'";
               
               echo '<script>
                       document.getElementById("progress-bar").style.width = "' . $progress . '%";
                       document.getElementById("progress-bar").setAttribute("aria-valuenow", ' . $progress . ');
                     </script>';
             
           echo "</div>
             <div class='row'>
               <div class='col-9'>
                 <div class='card-title'>$title</div>
                 <p class='card-text'>$sort_des</p>
               </div>
               <div class='col-3 text-center mt-2 pt-2'>
                 <h1 class='balance'>$price &#2547;</h1>
               </div>
             </div>";
              $sql = "SELECT COUNT(*) AS num_rows FROM lot_ticket WHERE user_id = $sessionId AND lottary = $id";
              $nnn = mysqli_fetch_assoc(mysqli_query($conn,$sql));
              $num_of_rows = $nnn['num_rows'];
              if($num_of_rows < 1){
                echo "<a href='?q=lot&buying=$id&price=$price' class='btn btn-success text-white my-3'>Buy Ticket</a>
              </div>";
              }else{
                echo "<button class='btn btn-warning text-black my-3'>Already Buy</button>
              </div>";
              }
    }}else{
      echo "
        <div class='container-fluid'>
            <img src='../assets/images/sorry.jpg' class='img-fluid d-block m-auto mt-4' width='80px' height='80px'>
            <div class='text-danger mt-5'>
                <p class='text-center small'><b>
                    আমরা আন্তরিক ভাবে দুঃখিত ! আমাদের Lottery বর্তমানে বন্ধ রয়েছে। <br> অতি শীঘ্রই আমাদের এই অপশনটি সচল হবে।<br> সচল হলে আপনাদের নোটিশ জানিয়ে দেওয়া হবে।
                </b></p>
            </div>
        </div>";
        }
          ?>

          <!-- ///////////////////////////////////////////////////////////////////////// -->
        </div>
      </div>
      <!-- Card ends here -->
      <div class="card p-2 m-2">

      <?php
        $sql = "SELECT * FROM lot_ticket WHERE user_id = $sessionId";
        $query = mysqli_query($conn,$sql);
        $total_row = mysqli_num_rows($query);
        if($total_row == 0){
          echo "<div class='alert alert-danger' role='alert'>You don't have any tickets, buy tickets and win bonus..!</div>";
        }else { ?>
        <!--  -->
        <div class="history-x rounded p-2 m-1 small">
            <div class="row small text-center">
              <div class="col-2">Sl</div>
              <div class="col-3">T. Token</div>
              <div class="col-3">Result</div>
              <div class="col-4">Date</div>
            </div>
          </div>
          <?php
          $x = 0;
          while($row = mysqli_fetch_array($query)){ 
            $x++;
            $token = $row['t_token'];
            $result = $row['result'];
            $time = $row['time'];
            
            ?>
          <a href="../lottary/status.php?usudcfiowedwgwcsodcds8fver=sgdfu&grfd=<?= $token ?>&iufvdgufivgo=sudcvdofgscvdf">
            <div class="history rounded p-2 m-1 small">
              <div class="row small text-center">
                <div class="col-2"><?= $x; ?></div>
                <div class="col-3"><?= $token; ?></div>
                <div class="col-3"><?= $result; ?></div>
                <div class="col-4"><?= $time; ?></div>
              </div>
            </div>
          </a>
          <?php } 
        }
      ?>


      
      </div>
    </div>
  </body>
</html>
