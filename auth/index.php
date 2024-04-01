<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Earningbd | make money online</title>
  
  
  
  <meta property="og:image" content="../assets/images/earning_matrix_refer_income.jpg" />
  <meta property="og:site_name"
    content="My Earningbd" />
  <meta property="og:title"
    content="My Earningbd - make money online | online income | eraning money in bangladesh" />
  <meta property="og:type" content="website" />
  <meta property="og:description"
    content="My Earningbd - make money online | online income | eraning money in bangladesh" />
  <link rel="icon" href="../assets/images/logo.png" type="image/png">
  <meta property="og:image:type" content="image/jpg" />
  <meta property="og:image:width" content="1280" />
  <meta property="og:image:height" content="800" />
  <meta property="og:url" content="https://earningmatrix.shop/" />
  
  
  
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!---<link rel="shortcut icon" href="../assets/images/logo.png" type="image/png" />
  Custom CSS File--->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container mt-5">
    <?php
    if (isset($_REQUEST['s'])) { ?>
    <!--=============registration form start here==========-->
      <div class="form">
        <header>Signup</header>
        <form action="signup.php" method="get">
          <input type="text" placeholder="Enter your full name" name="name" required>
          <input type="email" placeholder="Enter your email" name="email" required>
          <input type="number" placeholder="Enter your phone number" name="number" minlength="11" required>
          <input id="pass" type="password" placeholder="Create a password" name="password" minlength="6" required>
          <input id="con_pass" type="password" placeholder="Confirm your password" onkeyup="validate_password()" required>
          <?php
          if (isset($_REQUEST['ref'])) {
            $ref = $_REQUEST['ref'];
            echo "<input name='ref' value='$ref' readonly />";
          } else {
            echo "<input type='number' name='ref' placeholder='Enter your refer code' />";
          } ?>
          <span id="wrong_pass_alert"></span>
          <input id="sign" type="submit" class="button" value="Signup" disabled>
        </form>
        <div class="signup">
          <span class="signup">Already have an account?
            <a href="?"><label>Login</label></a>
          </span>
        </div>
      </div>

    <?php } else { ?>

      <div class="login form">
        <header>Login</header>
        <form action="login.php" method="post">
          <?php if(isset($_REQUEST['error'])){
            $error = $_REQUEST['error'];
            echo "<div class='alert alert-danger' role='alert'>$error</div>"; }?>
          <input type="email" placeholder="Enter your email" name="email" required>
          <input type="password" placeholder="Enter your password" name="password" minlength="6" required>
          <a href="forget.php">Forgot password?</a>
          <input type="submit" class="button" value="Login">
        </form>
        <div class="signup">
          <span class="signup">Don't have an account?
            <a href="?s"><label>Signup</label></a>
          </span>
        </div>
      </div>

    <?php } ?>


  </div>
  <script>
    function validate_password() {

      var pass = document.getElementById('pass').value;
      var confirm_pass = document.getElementById('con_pass').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML
          = '☒ use same password';
        document.getElementById('sign').disabled = true;
        document.getElementById('sign').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML =
          '🗹 password matched';
        document.getElementById('sign').disabled = false;
        document.getElementById('sign').style.opacity = (1);
      }
    }
  </script>
</body>

</html>