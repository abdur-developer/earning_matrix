<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sending Otp</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
$otp = rand(100000,999999);
$mass = "<head>
<meta charset='UTF-8' />
<meta name='viewport' content='width=device-width, initial-scale=1.0' />
<meta http-equiv='X-UA-Compatible' content='ie=edge' />

<link
  href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap'
  rel='stylesheet'
/>
</head>
<body
style='
  margin: 0;
  font-family: 'Poppins', sans-serif;
  background: #ffffff;
  font-size: 14px;
'
>
<div
  style='
	max-width: 680px;
	margin: 0 auto;
	padding: 45px 30px 60px;
	background: #f4f7ff;
	background-image: url(https://archisketch-resources.s3.ap-northeast-2.amazonaws.com/vrstyler/1661497957196_595865/email-template-background-banner);
	background-repeat: no-repeat;
	background-size: 800px 452px;
	background-position: top center;
	font-size: 14px;
	color: #434343;
  '
>
  <header>
	<table style='width: 100%;'>
	  <tbody>
		<tr style='height: 0;'>
		  <td>
			<img
			  alt=''
			  src='../assets/images/logo.png'
			  height='30px'
			/>
		  </td>
		  <td><h3 style='color:#fff;'>My Earningbd</h3></td>
		</tr>
	  </tbody>
	</table>
  </header>

  <main>
	<div
	  style='
		margin: 0;
		margin-top: 70px;
		padding: 92px 30px 115px;
		background: #ffffff;
		border-radius: 30px;
		text-align: center;
	  '
	>
	  <div style='width: 100%; max-width: 489px; margin: 0 auto;'>
		<h1
		  style='
			margin: 0;
			font-size: 24px;
			font-weight: 500;
			color: #1f1f1f;
		  '
		>
		  Email verification
		</h1>
		<p
		  style='
			margin: 0;
			margin-top: 17px;
			font-size: 16px;
			font-weight: 500;
		  '
		>
		  Hey dear user,
		</p>
		<p
		  style='
			margin: 0;
			margin-top: 17px;
			font-weight: 400;
			letter-spacing: 0.46px;
		  '
		>
		  Thank you for choosing My Earningbd. Use the following OTP
		  to complete the procedure to verify your email address. OTP is
		  valid for
		  <span style='font-weight: 600; color: #1f1f1f;'>5 minutes</span>.
		  Do not share this code with others, including our
		  employees.
		</p>
		<p
		  style='
			margin: 0;
			margin-top: 60px;
			font-size: 30px;
			font-weight: 600;
			letter-spacing: 20px;
			color: #ba3d4f;
		  '
		>
		$otp
		</p>
	  </div>
	</div>

	<p
	  style='
		max-width: 400px;
		margin: 0 auto;
		margin-top: 90px;
		text-align: center;
		font-weight: 500;
		color: #8c8c8c;
	  '
	>
	  Need help? Ask at
	  <a
		href='mailto:earningmatrix.shop@gmail.com'
		style='color: #499fb6; text-decoration: none;'
		>earningmatrix.shop@gmail.com</a
	  >
	</p>
  </main>

  <footer
	style='
	  width: 100%;
	  max-width: 490px;
	  margin: 20px auto 0;
	  text-align: center;
	  border-top: 1px solid #e6ebf1;
	'
  >
	<p
	  style='
		margin: 0;
		margin-top: 40px;
		font-size: 16px;
		font-weight: 600;
		color: #434343;
	  '
	>
	  My Earningbd
	</p>
	<p style='margin: 0; margin-top: 8px; color: #434343;'>
	  Address 540, Savar, Dhaka.
	</p>
	<p style='margin: 0; margin-top: 16px; color: #434343;'>
	  Copyright © 2024 Company. All rights reserved.
	</p>
  </footer>
</div>
</body>

";


	include('smtp/PHPMailerAutoload.php');
	require "../includes/dbconnect.php";
if(isset($_REQUEST['email'])){

	$receiverEmail = $_REQUEST['email'];
	$page = $_REQUEST['p'];

	$sql = "SELECT * FROM `users` WHERE `email` = '$receiverEmail'";
	$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	$id = $row['id'];

	$expirationTime = time() + 300; // 300 seconds = 5 minutes
	setcookie("id", $id, $expirationTime, "/");	
	setcookie("otp", $page, $expirationTime, "/");

	$sql = "UPDATE users SET verification_code = '$otp' WHERE id = '$id'";
	mysqli_query($conn,$sql);

	//$receiverEmail="abdur09266@gmail.com";
	$subject="Email Verification";
	$emailbody="Your 6 Digit OTP Code: ";
	//emailbody.$otp
	echo smtp_mailer($receiverEmail,$subject,$mass);

	
}
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "earningmatrix.shop@gmail.com"; // Sender's Email
	$mail->Password = "gkyjbowxmpkikmro"; //Sender's Email App Password
	$mail->SetFrom("earningmatrix.shop@gmail.com","My Earningbd"); // Sender's Email
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		//echo $mail->ErrorInfo;
		?>
		<script>
            Swal.fire({
            title: "Error...!",
            text: "There are some problems, please report the problem to customer support !",
            icon: "error"
            }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = "../customer-care/";
            }
            });
        </script>
		<?php
	}else{
		header("location: ../auth/otp_verify.php");
	}
}
?>
	
	</body>
</html>