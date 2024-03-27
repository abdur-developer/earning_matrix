<?php
if(!isset($_SESSION["id"])){
  header("location: ../auth");
  die("login failed");
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Earning Matrix | shopping center</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="../assets/product/logo.png" type="image/png" />

  <!-- google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="../assets/product/logo.png" type="image/png" />
  <link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
  <style>

  </style>
</head>

<body>
  <section class="container">
    <div class="container">
      <h2 class="h2 text-center">Products of the week</h2>

      <div class="row justify-content-center">


      <?php
      require "../includes/dbconnect.php";
      $sql = "SELECT * FROM product";
      $fatch = mysqli_query($conn, $sql);
      while($product = mysqli_fetch_array($fatch)){
        //var_dump($product);
        //$queryString = http_build_query($product);
        // $link = "../shop/details.php?" . $queryString;
        $link = "../shop/details.php?product=" . $product['id'];
        ?>

        <div class="card col-5 m-2">
          <div class="card-body">


            <div class="image">
              <img src="../assets/product/<?= $product['img'] ?>" alt="earning matrix" loading="lazy" width="800px" height="1034px" class="w-75 img-fluid d-block m-auto rounded"/>
            </div>

            <div class="card-content">
              <h6 class="h6 card-title"><?= $product['name'] ?></h6>

              <div class="card-price">
                &#2547; <span class="small"> <?= $product['current_price'] ?></span>
                &#2547; <span class="small"> <s><?= $product['dis_price'] ?></s></span>
              </div>
            </div>
            <div class="card-actions d-flex justify-content-center mt-1">
              <a href="<?= $link ?>" class="btn btn-success stretched-link" style="font-size: 12px;">View product</a>
            </div>


          </div>
        </div>

      <?php } ?>

      </div>
    </div>
  </section>
</body>

</html>