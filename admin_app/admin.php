<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin</title>
  <meta property="og:image:width" content="1280" />
  <meta property="og:image:height" content="800" />
  <link rel="stylesheet" href="../auth/style.css">
</head>

<body>
  <div class="container mt-5">
      <div class="login form">
        <header>Login</header>

        <?php
            if(isset($_REQUEST['email'])){
                $email = $_REQUEST['email'];
                $pass = $_REQUEST['password'];
                
                if($email != "earning_matrix" && $pass != "admin.com"){
                    echo "<link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'>";
                    echo "<div class='alert alert-danger' role='alert'>Something wrong..!</div>";
                }else{
                    $time = 30 * 24 * 60 * 60;
                    setcookie('login', 'login', time() + $time, '/');
                    header("location: home.php");
                }
            }
        ?>

        <form action="" method="post">
          <input type="text" placeholder="Enter username" name="email" required>
          <input type="password" placeholder="Enter password" name="password" required>
          <input type="submit" class="button" value="Login">
        </form>
      </div>
  </div>
</body>
</html>