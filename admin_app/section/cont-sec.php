<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
        <title>contact Information</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap');
            
            body{
                background: #ecf0f4;
                width: 100%;
                height: 100%;
                font-size: 18px;
                line-height: 1.5;
                font-family: 'Roboto', sans-serif;
                color: #222;
            }
            .container{
                max-width: 1230px;
                width: 100%;
        }

        h1{
            font-weight: 700;
            font-size: 45px;
            font-family: 'Roboto', sans-serif;
        }

        .header{
            margin-bottom: 80px;
        }
        #description{
            font-size: 24px;
        }
        
        .form-wrap{
            background: rgba(255,255,255,1);
            width: 100%;
            max-width: 850px;
            padding: 50px;
            margin: 0 auto;
            position: relative;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
        }
        .form-wrap:before{
            content: "";
            width: 90%;
            height: calc(100% + 60px);
            left: 0;
            right: 0;
            margin: 0 auto;
            position: absolute;
            top: -30px;
            background: #00bcd9;
            z-index: -1;
            opacity: 0.8;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
        }
        .form-group{
            margin-bottom: 25px;
        }
        .form-group > label{
            display: block;
            font-size: 18px;	
            color: #000;
        }
        .custom-control-label{
            color: #000;
            font-size: 16px;
        }
        .form-control{
            height: 50px;
            background: #ecf0f4;
            border-color: transparent;
            padding: 0 15px;
            font-size: 16px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .form-control:focus{
            border-color: #00bcd9;
            -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
            -moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
        }
        textarea.form-control{
            height: 160px;
            padding-top: 15px;
            resize: none;
        }

        .btn{
            padding: .657rem .75rem;
            font-size: 18px;
            letter-spacing: 0.050em;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary {
        color: #fff;
        background-color: #00bcd9;
        border-color: #00bcd9;
        }

        .btn-primary:hover {
        color: #00bcd9;
        background-color: #ffffff;
        border-color: #00bcd9;
            -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
            -moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
        }

        .btn-primary:focus, .btn-primary.focus {
        color: #00bcd9;
        background-color: #ffffff;
        border-color: #00bcd9;
        -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
            -moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
        color: #00bcd9;
        background-color: #ffffff;
        border-color: #00bcd9;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
        -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
            -moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
        }
    </style>
</head>
<body>
    <div class="header bg-primary text-white row">
        <h1 class="text-center col-1">
            <a class="btn btn-light" href="../home.php">Home</a>
        </h1>
        <h1 class="py-2 text-center col-11">Contact Information</h1>
    </div>
    <div class="container">
        <p class="text-center px-2 bg-warning">
            <?php
            require "../../includes/dbconnect.php";
            if(isset($_REQUEST['address'])){
                
                $b_number = $_REQUEST['b_number'];
                $n_number = $_REQUEST['n_number'];
                $contact_number = $_REQUEST['contact_number'];
                $password_wa_num = $_REQUEST['password_wa_num'];
                $payment_wa_num = $_REQUEST['payment_wa_num'];
                $telegram_link = $_REQUEST['telegram_link'];
                $contact_email = $_REQUEST['contact_email'];
                $address = $_REQUEST['address'];
                
                $sql = "UPDATE contact SET b_number = '$b_number', n_number = '$n_number', contact_number = '$contact_number', password_wa_num = '$password_wa_num', payment_wa_num = '$payment_wa_num', telegram_link = '$telegram_link', contact_email = '$contact_email', address = '$address' WHERE id = 1";
            
                if(mysqli_query($conn, $sql)){
                    echo "successfully updated";
                }else{
                    echo "Worng , Contact Developer.....";
                }
            }
            
            $sql = "SELECT * FROM contact WHERE id = '1'";
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $b_number = $row['b_number'];
            $n_number = $row['n_number'];
            $contact_number = $row['contact_number'];
            $password_wa_num = $row['password_wa_num'];
            $payment_wa_num = $row['payment_wa_num'];
            $telegram_link = $row['telegram_link'];
            $contact_email = $row['contact_email'];
            $address = $row['address'];
            ?>
        </p>
        <header class="header">
            <!-- <p id="description" class="text-center">
                Thank you for taking the time to help us improve the platform
            </p> -->
        </header>
        <div class="form-wrap">	
            <form id="survey-form" action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="b_number">Bkash Number</label>
                            <input type="number" name="b_number" id="b_number" placeholder="Enter bkash number"
                            class="form-control" value="<?= $b_number ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="n_number">Nagad Number</label>
                            <input type="number" name="n_number" id="n_number" placeholder="Enter nagad number"
                            class="form-control" value="<?= $n_number ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="number" name="contact_number" id="contact_number" placeholder="Enter contact number"
                            class="form-control" value="<?= $contact_number ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_wa_num">Password help <small>(whatsapp)</small></label>
                            <input type="number" name="password_wa_num" id="password_wa_num" placeholder="Enter whatsapp number"
                            class="form-control"  value="<?= $password_wa_num ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="payment_wa_num">Payment Help <small>(whatsapp)</small></label>
                            <input type="number" name="payment_wa_num" id="payment_wa_num" placeholder="Enter whatsapp number"
                            class="form-control" value="<?= $payment_wa_num ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telegram_link">Telegram Channal</label>
                            <input type="text" name="telegram_link" id="telegram_link" placeholder="Enter telegram link"
                            class="form-control" value="<?= $telegram_link ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_email">Contact Email</label>
                            <input type="email" name="contact_email" id="contact_email" placeholder="Enter contact email"
                            class="form-control" value="<?= $contact_email ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" placeholder="Enter address"
                            class="form-control" value="<?= $address ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" id="submit" class="btn btn-primary btn-block">Update Details</button>
                    </div>
                </div>

            </form>
        </div>	
    </div>
</body>
</html>