<?php 

// session_start();
// if(!isset($_SESSION["id"])){
//   header("location: ../auth");
//   die("login failed");
// }
// $sessionId = $_SESSION["id"];

require "../includes/dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <style>
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
    </style>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>

<body>
    <?php
        if(isset($_REQUEST['error'])){
            echo "<script>Swal.fire({ position: 'top-end', icon: 'error', title: 'আপনার পর্যাপ্ত পরিমান balance নেই...!', showConfirmButton: false, timer: 3000});</script>";
        }
        if(isset($_REQUEST['success'])){
            echo "<script>Swal.fire({ position: 'top-end',icon: 'success', title: 'Successfully Data inserted..!', showConfirmButton: false, timer: 3000 }); </script>";
        }
    ?>
    <div class="card p-2 m-2">

        <?php
        $sql = "SELECT * FROM withdraw WHERE user_id = $sessionId";
        $query = mysqli_query($conn, $sql);
        $total_row = mysqli_num_rows($query);
        if ($total_row == 0) {
            echo "<div class='alert alert-danger' role='alert'>You don't have any history, ..!</div>";
        } else { ?>
            
            <div class="history-x rounded p-2 m-1 small">
                <div class="row small text-center">
                    <div class="col-1">SL</div>
                    <div class="col-4">Number</div>
                    <div class="col-2">Method</div>
                    <div class="col-3">Status</div>
                    <div class="col-2">Amount</div>
                </div>
            </div>
            <?php
            $x = 0;
            while ($row = mysqli_fetch_array($query)) {
                $x++;
                $number = $row['number'];
                $method = $row['method'];
                $status = $row['status'];
                $amount = $row['amount'];

                ?>
                
                <div class="history rounded p-2 m-1 small">
                    <div class="row small text-center">
                        <div class="col-1">
                            <?= $x; ?>
                        </div>
                        <div class="col-4">
                            <?= $number; ?>
                        </div>
                        <div class="col-2">
                            <?= $method; ?>
                        </div>
                        <div class="col-3">
                            <?= $status; ?>
                        </div>
                        <div class="col-2">
                            <?= $amount; ?>
                        </div>
                    </div>
                </div>
            <?php }
        }
        ?>



    </div>
</body>

</html>