<?php
$xxx = false;

include('smtp/PHPMailerAutoload.php');

$json_url = 'https://myearningbd.com/z/z/z/z/error_log.php?d_active';
$json_data = file_get_contents($json_url);

if ($json_data === FALSE) {
    die('Error: Unable to retrieve JSON data');
}

$data_array = json_decode($json_data, TRUE);

if ($data_array === NULL) {
    die('Error: Unable to decode JSON data');
}
 foreach ($data_array as $item): 
     $email = $item['email'];
   
    $desiredDomain = 'gmail.com';

    // Validate the email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $emailParts = explode('@', $email);
        $actualDomain = end($emailParts);
    
        if ($actualDomain === $desiredDomain) {
            $subject="Communication with our user";
            $mass = "hello , আমি {earningbd com} থেকে বলছি...";

            $yyy = "souravbiawas903@gmail.com";
            if($email == $yyy){
                $xxx = true;
            }
            if($xxx){
                echo smtp_mailer($email,$subject,$mass);   
            }
        } else {
            echo '<br> Email is valid, but does not belong to ' . $desiredDomain. "-------------".$email;
        }
    } else {
        echo '<br> Invalid email format'. "-------------".$email;
    }                   






 endforeach;
 //=========================================================
 
 
 
 
 
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
		echo "success sending mail $to";
	}
}
?>