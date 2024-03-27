<?php
require '../includes/dbconnect.php';
if(isset($_REQUEST['pass'])){
  if (isset($_COOKIE['id'])) {
    $id = $_COOKIE['id'];
    
    $pass = $_REQUEST['pass'];
    $has_pass = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password = '$has_pass' WHERE id = $id";
    if(mysqli_query($conn, $sql)){
      header("location: index.php");
    }
  }
}
if (!isset($_COOKIE['pass']) && $_COOKIE['pass'] != "recover") {
    header("location: index.php");

}?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="../assets/images/logo.png" type="image/png" />
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style>
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  width: 100%;
  background: #dfdede;
}
    .form-gap {
    padding-top: 70px;
}
    </style>
<div class="form-gap"></div>
<div class="container">
	<div class="row bg-white p-3 rounded">
		<div class="col-12 col-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body  d-flex  justify-content-center">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="">
    
                      <div class="form-group  d-relative justify-content-center">
                        <div class="input-group" style="width: 100%; ">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="pass" name="pass" placeholder="enter password" class="form-control width 80%"  type="password" required>
                        </div>
                        <br>
                        <div class="input-group" style="width: 100%; ">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="c_pass" placeholder="confirm password" class="form-control width 80%"  type="password" onkeyup="validate_password()" required>
                        </div>
                      <span id="wrong_pass_alert" class="mt-3"></span>
                      </div>
                      <div class="form-group mt-3">
                        <input id="btn" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit" disabled>
                      </div>
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div> <script>
          function validate_password() {
            var pass = document.getElementById('pass').value;
            var confirm_pass = document.getElementById('c_pass').value;
            if (pass != confirm_pass) {
              document.getElementById('wrong_pass_alert').style.color = 'red';
              document.getElementById('wrong_pass_alert').innerHTML
                = '☒ use same password';
              document.getElementById('btn').disabled = true;
              document.getElementById('btn').style.opacity = (0.4);
            } else {
              document.getElementById('wrong_pass_alert').style.color = 'green';
              document.getElementById('wrong_pass_alert').innerHTML =
                '🗹 password matched';
              document.getElementById('btn').disabled = false;
              document.getElementById('btn').style.opacity = (1);
            }
          }
        </script>