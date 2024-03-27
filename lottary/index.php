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

$sql = "SELECT id FROM lot_ticket WHERE lottary = '1st'";
$pro = mysqli_query($conn, $sql);
$progress = mysqli_num_rows($pro);
$progress = ( $progress / 50 ) * 100 ;
//$progress = 50;
?>

  <body>
  <div class='alert alert-success m-3' role='alert'>The date of the draw will be informed to all of you</div>
    <?php
      
      if(isset($_REQUEST['buying'])){

        if($balance >= 10){
          $balance -= 10;
          $sql = "UPDATE users SET balance = '$balance' WHERE id = $sessionId";
          mysqli_query($conn, $sql);//update balance

          $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$sessionId', 'buy lottary ticket', '10', '0')";
          mysqli_query($conn, $sql);//add trx history

          $token = generateRandomId();
          //$sql = "SELECT * FROM lot_ticket";
          $sql = "INSERT INTO lot_ticket (lottary, user_id, name, email, t_token) VALUES ('1st', '$sessionId', '$name', '$email', '$token')";

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
        <div class="card-header">
          <img src="../assets/images/lottary.jpg" alt="" class="card-img-top img-fluid img-lot">
        </div>

        <div class="card-body row">
            <h6 class=" col-12 pl-2">Progress</h6>
            <div class="col-9 progress rounded p-bar-con"style="height: 12px;">

              <div id="progress-bar" class="progress-bar bg-primary rounded p-bar" role="progressbar" style="width: 0%; height: 12px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            
            </div>
            <p class="col-3 parsent text-center small"><?php echo $progress.' %'; ?></p>
            <?php
             echo '<script>
             document.getElementById("progress-bar").style.width = "' . $progress . '%";
             document.getElementById("progress-bar").setAttribute("aria-valuenow", ' . $progress . ');
           </script>';
          ?>
        </div>
          <div class="row">
            <div class="col-9">
              <div class="card-title">LuckyDraw Bonanza</div>
              <p class="card-text">Jackpot - Test Your Luck</p>
            </div>
            <div class="col-3 text-center mt-2 pt-2">
              <h1 class="balance">10 <span class="tk">&#2547;</span></h1>
            </div>
          </div>
        <a href="?q=lot&buying" class="btn btn-success text-white mt-3">Buy Ticket</a>
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
          <div class="history rounded p-2 m-1 small">
            <div class="row small text-center">
              <div class="col-2"><?php echo $x; ?></div>
              <div class="col-3"><?php echo $token; ?></div>
              <div class="col-3"><?php echo $result; ?></div>
              <div class="col-4"><?php echo $time; ?></div>
            </div>
          </div>
          <?php } 
        }
      ?>


      
      </div>
    </div>
  </body>
</html>
