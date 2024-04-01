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
  <title>My Earningbd | shopping center</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="../assets/product/logo.png" type="image/png" />

  <!-- google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="../assets/product/logo.png" type="image/png" />
  <link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
  <style>
   * { 
            box-sizing: border-box; 
        } 

        .x-slider { 
            display: flex; 
            justify-content: center; 
            align-items: center; 
        } 

        .carousel { 
            position: relative; 
            width: 1000px; 
            height: 200px; 
            overflow: hidden; 
            background-color: #cdcdcd; 
        } 

        .carousel-item .slide-image { 
            width: 1000px; 
            height: 200px; 
            background-size: cover; 
            background-repeat: no-repeat; 
        } 

        .carousel-item { 
            position: absolute; 
            width: 100%; 
            height: 270px; 
            border: none; 
            top: 0; 
            left: 100%; 
        } 

        .carousel-item.active { 
            left: 0; 
            transition: all 0.3s ease-out; 
        } 

        .carousel-item div { 
            height: 100%; 
        } 

        .red { 
            background-color: red; 
        } 

        .green { 
            background-color: green; 
        } 

        .yellow { 
            background-color: yellow; 
        } 

        .violet { 
            background-color: violet; 
        }
        #slide-1 {
            background-image: 
                url('https://media.geeksforgeeks.org/img-practice/banner/dsa-to-development-coding-guide-thumbnail.png?v=19625');
        }
        #slide-2 {
            background-image: 
                url('https://media.geeksforgeeks.org/img-practice/banner/mern-full-stack-development-classroom-thumbnail.png?v=19625');
        }
        #slide-3 {
            background-image: 
                url('https://media.geeksforgeeks.org/img-practice/banner/geeks-classes-live-thumbnail.png?v=19625');
        }
        #slide-4 {
            background-image: 
            url('https://media.geeksforgeeks.org/img-practice/banner/gate-crash-course-2024-thumbnail.png?v=19625');
        }
    .product-img{
      height: 200px;
      width: 600px;
    }
  .card{
    
    width:350px;
    height:370px;
}
    .btn-danger{
        
        height:48px;
        font-size:18px;
    }
  </style>
</head>

<body>
  <div class="x-slider">
      <div class="carousel"> 
          <div class="carousel-item"> 
              <div class="slide-image" id="slide-1"></div> 
          </div> 
          <div class="carousel-item"> 
              <div class="slide-image" id="slide-2"></div> 
          </div> 
          <div class="carousel-item"> 
              <div class="slide-image" id="slide-3"></div> 
          </div> 
          <div class="carousel-item"> 
              <div class="slide-image" id="slide-4"></div> 
          </div> 
      </div> 
  </div>
  <section class="container">
    <div class="container">
      <!-- <h2 class="h2 text-center">Products of the week</h2> -->

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

        <div class="card col-md-5 col-lg-3git m-2">
          <div class="card-body">

              <img src="../assets/product/<?= $product['img'] ?>" class="product-img img-thumbnail d-block m-auto rounded"/>
          
            <div class="card-content">
              <h6 class="h6 card-title text-uppercase"><?= $product['name'] ?></h6>

              <div class="card-price">
                &#2547; <span class="small text-uppercase"> <?= $product['current_price'] ?></span>
                &#2547; <span class="small text-uppercase"> <s><?= $product['dis_price'] ?></s></span>
              </div>
            </div>
              
              
            </div>
            <a href="<?= $link ?>" class="btn btn-danger stretched-link mb-1">View product</a>
        </div>

      <?php } ?>

      </div>
    </div>
  </section>
  <script>
        window.onload = function () { 
        let slides = 
            document.getElementsByClassName('carousel-item'); 

        function addActive(slide) { 
            slide.classList.add('active'); 
        } 

        function removeActive(slide) { 
            slide.classList.remove('active'); 
        } 

        addActive(slides[0]); 
        setInterval(function () { 
            for (let i = 0; i < slides.length; i++) { 
                if (i + 1 == slides.length) { 
                    addActive(slides[0]); 
                    setTimeout(removeActive, 350, slides[i]); 
                    break; 
                } 
                if (slides[i].classList.contains('active')) { 
                    setTimeout(removeActive, 350, slides[i]); 
                    addActive(slides[i + 1]); 
                    break; 
                } 
            } 
        }, 3000); 
    };

    </script> 
</body>

</html>