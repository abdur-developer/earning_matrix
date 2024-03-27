<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
        <title>Add new Task</title>
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
    <div class="container">
        <p class="text-center px-2 bg-warning">
            <?php
            if(isset($_REQUEST['title'])){
                require "../../../includes/dbconnect.php";
                $title = $_REQUEST['title'];
                $price = $_REQUEST['price'];
                $link = $_REQUEST['link'];
                $desc = $_REQUEST['desc'];
                $sql = "INSERT INTO task (title, description, link, taka)
                VALUES ('$title', '$desc', '$link', '$price');";
            
                if(mysqli_query($conn, $sql)){
                    echo "successfully submited";
                }else{
                    echo "Worng , Contact Developer.....";
                }
            } ?>
        </p>
        <header class="header">
            <h1 id="title" class="text-center">Adding Premium Plan</h1>
            <!-- <p id="description" class="text-center">
                Thank you for taking the time to help us improve the platform
            </p> -->
        </header>
        <div class="form-wrap">	
            <form id="survey-form" action="" method="post">
                
                <div class="form-group">
                    <label id="title-label" for="title">Task title</label>
                    <input type="text" name="title" id="title" placeholder="Enter task title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label id="price-label" for="price">Price <small>(taka)</small></label>
                    <input type="text" name="price" id="price" placeholder="Enter price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label id="link-label" for="link">Link</label>
                    <input type="text" name="link" id="link" placeholder="Enter link" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="desc">Description:</label>
                    <textarea class="form-control" rows="10" id="desc" name="desc" placeholder="enter your full description" required></textarea>             
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" id="submit" class="btn btn-primary btn-block">Submit Task</button>
                    </div>
                </div>

            </form>
        </div>	
    </div>
</body>
</html>