<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
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
</head>
<body>
    <div class="header bg-primary text-white row">
                <h1 class="text-center col-1">
                    <a class="btn btn-light" href="../../home.php">Home</a>
                </h1>
                <h1 class="py-2 text-center col-11">Adding Product</h1>
            </div>
    <?php if(isset($_REQUEST['success'])){
        echo "successfully submited";
    }
    if(isset($_REQUEST['error'])){
        echo "Worng , Contact Developer.....";
    } ?>

     <div class="container">
	<header class="header">
		<!-- <p id="description" class="text-center">
			Thank you for taking the time to help us improve the platform
		</p> -->
	</header>
	<div class="form-wrap">	
		<form id="survey-form" action="upload.php" method="post" enctype="multipart/form-data">
                <div>
					<div class="form-group">
						<label id="name-label" for="name">Title</label>
						<input type="text" name="title" id="name" placeholder="Enter product title" class="form-control" required>
					</div>
				</div>
            <!-- 
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Would you recommend survey to a friend?</label>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline1" value="Definitely" name="customRadioInline1" class="custom-control-input" checked="">
							<label class="custom-control-label" for="customRadioInline1">Definitely</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline2" value="Maybe" name="customRadioInline1" class="custom-control-input">
							<label class="custom-control-label" for="customRadioInline2">Maybe</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline3" value="Not sure" name="customRadioInline1" class="custom-control-input">
							<label class="custom-control-label" for="customRadioInline3">Not sure</label>
						</div>
					</div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
						<label>This survey useful yes or no?</label>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" name="yes" value="yes" id="yes" checked="">
							<label class="custom-control-label" for="yes">Yes</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" name="no" value="no" id="no">
							<label class="custom-control-label" for="no">No</label>
						</div>
					</div>
				</div> 
			</div> -->
            <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label id="name-label" for="name">Old Price <small>(taka)</small></label>
						<s><input type="number" name="d_price" id="name" placeholder="1500" class="form-control" required></s>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label id="email-label" for="email">Current Price <small>(taka)</small></label>
						<input type="number" name="c_price" id="email" placeholder="1200" class="form-control" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Description : </label>
						<textarea  id="comments" class="form-control" name="desc" placeholder="Enter product description here..."></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Upload product: </label>
						<input type="file" name="file"  id="image" class="form-control" required>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<button type="submit" id="submit" class="btn btn-primary btn-block">Submit Product</button>
				</div>
			</div>

		</form>
	</div>	
</div>
</body>
</html>