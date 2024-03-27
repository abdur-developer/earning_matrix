<?php
//SELECT * FROM `users` WHERE `email` = 'admin@admin.com'
if(isset($_REQUEST['email'])){
  $email = $_REQUEST['email'];
  require '../includes/dbconnect.php';
  $sql = "SELECT COUNT(*) as count FROM users WHERE email = '$email'";
  $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
  $count = $row['count'];
  if ($count > 0) {
    header("location: ../otp/index.php?email=$email&p=forget");
  }else{
    echo "<script>alert('Email not found on our database'); window.location.href = 'index.php?s';</script>";
  }
}else{
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="">
    
                      <div class="form-group  d-flex justify-content-center">
                        <div class="input-group" style="width: 60%; ">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control width 25%"  type="email" required>
                          <input name="p" value="forget" hidden>
                        </div>
                      </div>
                      <div class="form-group mt-3">
                        <input class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<?php 
}



?>