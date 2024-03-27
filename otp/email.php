<?php

$mass = "hello , আমি {earningbd com} থেকে বলছি...";


	include('smtp/PHPMailerAutoload.php');
	require "../includes/dbconnect.php";
if(isset($_REQUEST['email'])){

	$receiverEmail = $_REQUEST['email'];

	//$receiverEmail="abdur09266@gmail.com";
	$subject="Communication with our user";
	
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
	$mail->Username = "myearningbdd@gmail.com"; // Sender's Email
	$mail->Password = "zhhwhvqyddtedxow"; //Sender's Email App Password
	$mail->SetFrom("myearningbdd@gmail.com","Earningbd"); // Sender's Email
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		echo "success";
	}
}
?>