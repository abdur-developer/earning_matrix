<?php
session_start();

require "../includes/dbconnect.php";
// Fetch the cookie value after 5 minutes
if (isset($_COOKIE['otp']) && isset($_COOKIE['id'])) {
    $id = $_COOKIE['id'];
    $page = $_COOKIE['otp'];//forget/new
    $erorr = "";
    if(isset($_REQUEST['otp'])){
        $otp = $_REQUEST['otp'];
        if(strlen($otp) != 6) $erorr = "Enter valid otp code";
        else{
            $sql = "SELECT verification_code FROM users WHERE id = '$id'";
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $old_otp = $row['verification_code'];
            if($old_otp == $otp){
                $sql = "UPDATE users SET email_verify = 'Approved' WHERE id = '$id'";
                if(mysqli_query($conn, $sql)){
                    if($page == "new") header("location: ../home/");
                    else{
                        $expirationTime = time() + 300; // 300 seconds = 5 minutes
                        setcookie("pass", "recover", $expirationTime, "/");
                        setcookie("id", $id, $expirationTime, "/");	
                        
                        header("location: set_password.php");
                    } 
                }
            }else{
                $erorr = "You gave wrong OTP code..!";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OTP Verification Form</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/png" />
    <link rel="stylesheet" href="style.css" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <style>
        /* Import Google font - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dfdede;
        }

        :where(.container, form, .input-field, header) {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: #fff;
            padding: 30px 65px;
            border-radius: 12px;
            row-gap: 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .container header {
            height: 65px;
            width: 65px;
            background: #4070f4;
            color: #fff;
            font-size: 2.5rem;
            border-radius: 50%;
        }

        .container h4 {
            font-size: 1.25rem;
            color: #333;
            font-weight: 500;
        }

        form .input-field {
            flex-direction: row;
            column-gap: 10px;
        }

        .input-field input {
            height: 45px;
            width: 300px;
            border-radius: 6px;
            outline: none;
            font-size: 1.125rem;
            text-align: center;
            border: 1px solid #ddd;
            background-color: aquamarine;
        }

        .input-field input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .input-field input::-webkit-inner-spin-button,
        .input-field input::-webkit-outer-spin-button {
            display: none;
        }

        form button {
            margin-top: 25px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            border: none;
            padding: 9px 0;
            cursor: pointer;
            border-radius: 6px;
            pointer-events: auto;
            background: #4070f4;
            transition: all 0.2s ease;
        }

        form button:hover {
            background: #0e4bf1;
        }
        .error-message {
            color: #ff0000; /* Red text color */
            background-color: #ffe6e6; /* Light red background color */
            padding: 10px; /* Add padding for better visibility */
            border: 1px solid #ff0000; /* Red border */
            border-radius: 5px; /* Rounded corners */
            margin-bottom: 10px; /* Add space between error messages */
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <i class="bx bxs-check-shield"></i>
        </header>
        <h4>Enter OTP Code</h4>
        <div class="alert alert-success fade show" role="alert">
            <p class="small text-muted font-weight-lighter">OTP send successfully. please check your mailbox. if you found please check your spam box..</p>
        </div>
        <form action="" method="post">
            <?php if($erorr != null || $erorr !="") { echo "<div class='error-message'>$erorr.</div>"; }?>
            <div class="input-field">
                <input type="number" name="otp" placeholder="Enter otp code" required/>
            </div>
            <button>Verify OTP</button>
        </form>
    </div>
</body>

</html>
<?php

} else {
   header("location: index.php");
}?>