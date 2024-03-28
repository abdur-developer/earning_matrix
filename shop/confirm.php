<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <title>Adding Product</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap');

        body{
            padding: 100px 0;
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
require "../includes/dbconnect.php";
    $product_id = "";
    $price = "";
    $sql = "";
    $user_id = "";

    if(isset($_REQUEST['submit'])){
        $product_id = $_REQUEST['id'];
        $price = $_REQUEST['current_price'];
        $user_id = $_REQUEST['user_id'];
    }
    
    if(isset($_REQUEST['pay-type'])){
        $isOrder = true;
        $name = $_REQUEST['name'];
        $number = $_REQUEST['number'];
        $address = $_REQUEST['address'];
        $pay_type = $_REQUEST['pay-type'];

        $product_id = $_REQUEST['id'];
        $price = $_REQUEST['current_price'];
        $user_id = $_REQUEST['user_id'];

        if($pay_type == 'account'){
            // update balance
            $sql = "SELECT balance FROM users WHERE id = '$user_id'";
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            //echo $sql;
            $balance = $row['balance'];

            if($balance < $price){
                $isOrder = false;
                //echo "sbhivfi ";
                echo "<script>
                Swal.fire({
                    title: 'Opps...!',
                    text: 'you dont have enough balance..!',
                    icon: 'error'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../home/?q=deposite';
                    }
                    });;
                </script>";
            }else{
                $sql = "INSERT INTO trx_history (user_id, note, amount, is_add) VALUES ('$user_id', 'buy a product', '$price', '0')";
                mysqli_query($conn, $sql);//add trx history

                $balance -= $price;
                $sql = "UPDATE users SET balance = '$balance' WHERE id = '$user_id'";
                mysqli_query($conn, $sql);//update balance
            }
        }
    
        if($isOrder){
            $sql = "INSERT INTO order_product (user_id, product_id, amount, name, number, pay_type, address)
                VALUES ('$user_id', '$product_id', '$price','$name', '$number', '$pay_type', '$address')";

            if(mysqli_query($conn, $sql)){
            echo "<script>
            Swal.fire({
                title: 'Congrass...!',
                text: 'your order successfully submited!',
                icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../home/?q=order';
            }
            });
            </script>";
            }
        }
     
    }
    ?>

     <div class="container">
	<header class="header">
		<h1 id="title" class="text-center">Confirm Order</h1>
	</header>
	<div class="form-wrap">	
		<form id="survey-form" action="" method="post">
            <div class="form-group">
                <label id="name-label" for="name">Full Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your full name" class="form-control" required>
            </div>
            <div class="form-group">
                <label id="number-label" for="number">Phone Number</label>
                <input type="number" name="number" id="number" placeholder="Enter your phone number" class="form-control" required>
            </div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="pay">Payment Type : </label>
                        <div id="pay" class="mt-1">
                            <div>
                                <input type="radio" name="pay-type" value="cod" checked>
                                <small>Cash on Delivery</small>
                            </div>
                            <div>
                                <input type="radio" name="pay-type" value="account">
                                <small>From account Balance</small>
                            </div>
                        </div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Address : </label>
						<textarea  id="comments" class="form-control" name="address" placeholder="Enter your address here..."></textarea>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<button type="submit" id="submit" class="btn btn-primary btn-block">Submit Product</button>
				</div>
			</div>
            <input type="hidden" name="id" value="<?= $product_id ?>">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">
            <input type="hidden" name="current_price" value="<?= $price ?>">

		</form>
	</div>	
</div>
</body>
</html>