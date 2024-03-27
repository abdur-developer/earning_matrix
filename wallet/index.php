<?php
if(!isset($_SESSION["id"])){
  header("location: ../auth");
  die("login failed");
}
require "../includes/dbconnect.php";
$id = $_SESSION["id"];
$sql = "SELECT * FROM users WHERE id = '$id';";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$balance = $row['balance'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>E-wallet</title>
    <link rel="stylesheet" href="style.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/png" />
    <style>
        .wallet-container {
          width: 350px;
          color: #fff;
          font-size: 15px;
          padding: 20px 20px 0;
          top: 60%;
          left: 50%;
          transform: translate(-50%, -50%);
          position: absolute;
          height: 100%;
          overflow: hidden;
        }
        .fa-user {
          float: right;
        }

        .fa-align-left {
          margin-right: 15px;
        }

        .amount-box img {
          width: 50px;
        }

        .amount {
          font-size: 35px;
        }

        .amount-box p {
          margin-top: 10px;
          margin-bottom: -10px;
        }

        .btn-group {
          margin: 20px 0;
        }

        .btn-group .btn {
          margin: 8px;
          border-radius: 20px !important;
          font-size: 12px;
        }

        .txn-history {
          text-align: left;
        }

        .txn-list {
          background-color: #fff;
          padding: 12px 10px;
          color: #777;
          font-size: 14px;
          margin: 7px 0;
          border: 2px solid green;
          border-radius: 10px;
        }

        .debit-amount {
          color: red;
          float: right;
        }

        .credit-amount {
          color: green;
          float: right;
        }

        .footer-menu {
          margin: 20px -20px 0;
          bottom: 0;
          border-top: 1px solid #ccc;
          padding: 10px 10px 0;
        }

        .footer-menu p {
          font-size: 12px;
        }

        @media screen and (max-width: 800px) {
          .wallet-container {
            height: 115%;
            bottom: 20px;
            margin-top: 100px;
          }
        }
        /*===================================================================*/
    </style>  
  </head>
  <body style="background-color: #0097A7;">
    <div class="wallet-container text-center">
      <div class="amount-box text-center">
        <img src="https://lh3.googleusercontent.com/ohLHGNvMvQjOcmRpL4rjS3YQlcpO0D_80jJpJ-QA7-fQln9p3n7BAnqu3mxQ6kI4Sw" alt="wallet" />
        <p>Total Balance</p>
        <p class="amount"><strong> <?php echo "$balance TK"; ?></strong></p>
      </div>

      <div class="btn-group text-center">
        <!-- <button type="button" class="btn btn-outline-light">Add Money</button> -->
        <button type="button" class="btn btn-outline-light" onclick="goWithdraw()">Widthdraw</button>
      </div>

      <div class="txn-history">
        <p><b>History</b></p>
        <?php
          $sql = "SELECT * FROM trx_history WHERE user_id = $id ORDER BY id DESC";
    
          $count = 0;
          $fatch = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($fatch);
          
          if($count > 0){
            while($row = mysqli_fetch_array($fatch)){
              $note = $row['note'];
              $is_add = $row['is_add'];
              $amount = $row['amount'];
              $x = "class='debit-amount'>-";
              if($is_add == 1) $x = "class='credit-amount'>+";
              echo "<p class='txn-list'>$note<span $x &#2547; $amount</span></p>";
            }
          }else{
            echo "<p class='txn-list text-center'>You have no data...</p>";
          }
        ?>
      </div>

    </div>
    <script>
      function goWithdraw(){
        window.location.href = "../home/?q=withdraw";
      }
    </script>
  </body>
</html>
