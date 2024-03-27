<?php
if(!isset($_REQUEST['product'])){
  die('data not found');
}
$id = $_REQUEST['product'];
// var_dump($id);
// $massage = "ID : ".$data['id']." --- Title : ".$data['name']." --- Price: ".$data['current_price']."Taka";
require "../includes/dbconnect.php";


$sql = "SELECT * FROM product WHERE id = $id";
$fatch = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($fatch);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update profile | earning matrix</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.jss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <?php
      if(isset($_REQUEST['submit'])){
        session_start();
        $user_id = $_SESSION["id"];
        $price = $data['current_price'];

        // update balance
        $sql = "SELECT balance FROM users WHERE id = '$user_id'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $balance = $row['balance'];
        
        if($balance < $price){
          echo "<script>
            Swal.fire({
              title: 'Opps...!',
              text: 'you dont have enough balance..!',
              icon: 'error'
            });
            </script>";
        }else{
          $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$user_id', 'buy a product', '$price', '0')";
          mysqli_query($conn, $sql);//add trx history
  
          $balance -= $price;
          $sql = "UPDATE users SET balance = '$balance' WHERE id = '$user_id'";
          if(mysqli_query($conn, $sql)){//update balance
              $sql = "INSERT INTO order_product (user_id, product_id, amount) VALUES ('$user_id', '$id', '$price')";
              if(mysqli_query($conn, $sql)){
                echo "<script>
                Swal.fire({
                  title: 'Congrass...!',
                  text: 'your order successfully submited!',
                  icon: 'success'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../home/?q=order';
                }
              });
              </script>";
              }
          }
          //update balance end
  
          
          
        }
      }
    ?>
    
    <div class="container bootstrap snippets bootdey">
        <div class="row">
          <div class="col-md-3">
            <div class="text-center">
              <img src="../assets/product/<?= $data['img'] ?>" class="avatar img-fluid rounded mt-4" alt="profile" height="100px">
            </div>
          </div>
          
          <div class="col-md-9 personal-info mt-3">
            <div class="details">
              <h3><?= $data['name'] ?> <span class="btn rounded" style="background-color: #FFE0B2">Top Rated</span></h3>
              <p class="text-wrap w-75"><?= $data['description']; ?></p>
            </div>
            <!-- <a class=""  href="https://wa.me/+8801959798393?text=<?= $massage ?>" target="_blank">Order Now</a> -->
            <form action="" method="post" class="mb-5">
              <input type="submit" value="Order Now" name="submit" 
              class="d-block text-center btn btn-success p-1 text-white m-auto rounded"
              style="font-size:20px;font-weight:500;width:300px;">
            </form>
            <?php
              
            ?>
          </div>
      </div>
    </div>
</body>
</html>