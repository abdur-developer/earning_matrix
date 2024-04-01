<?php
require "../../../includes/dbconnect.php";
$id = '';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    die('name not found');
}
$sql = "SELECT * FROM premium WHERE id='$id'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

$name = $row['vip_name'];
$price = $row['price'];
$num_task = $row['num_of_task'];

$task_in = $row['task_earning'];
$_1st = $row['1st'];
$_2nd = $row['2nd'];
$_3rd = $row['3rd'];
$_4th = $row['4th'];
$_5th = $row['5th'];
$validity = $row['validity'];


if(isset($_REQUEST['name'])){
        
    $name = $_REQUEST['name'];
    $price = $_REQUEST['price'];
    $num_task = $_REQUEST['num-task'];
    $task_in = $_REQUEST['task-in'];
    $_1st = $_REQUEST['1st'];
    $_2nd = $_REQUEST['2nd'];
    $_3rd = $_REQUEST['3rd'];
    $_4th = $_REQUEST['4th'];
    $_5th = $_REQUEST['5th'];
    $validity = $_REQUEST['validity'];

    $sql = "UPDATE premium SET vip_name = '$name', price = '$price', num_of_task = '$num_task', task_earning = '$task_in', 1st = '$_1st', 2nd = '$_2nd', 3rd = '$_3rd', 4th = '$_4th', 5th = '$_5th', validity = '$validity' WHERE id = $id;";
   
    if(mysqli_query($conn, $sql)){
        header("location: ../premium-sec.php?success");
    }else{
        header("location: ../premium-sec.php?error");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
        <title>Add Premium Plan</title>
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
    <div class="container">
        <header class="header">
            <h1 id="title" class="text-center">Update Premium Plan</h1>
            <!-- <p id="description" class="text-center">
                Thank you for taking the time to help us improve the platform
            </p> -->
        </header>
        <div class="form-wrap">	
            <form id="survey-form" action="" method="post">
                
                <div class="form-group">
                    <label id="name-label" for="name">Plan name</label>
                    <input type="text" name="name" id="name" placeholder="Enter plan title" value="<?= $name ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label id="email-label" for="email">Price <small>(taka)</small></label>
                    <input type="number" name="price" id="email" placeholder="1200" class="form-control" value="<?= $price ?>" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="num-task">Number of Task</label>
                            <input type="number" name="num-task" id="num-task" placeholder="7" class="form-control" value="<?= $num_task ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="task-in">Task income <small>(taka)</small></label>
                            <input type="number" name="task-in" id="task-in" placeholder="50" class="form-control" value="<?= $task_in ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="1st">1st Genaretion <small>(taka)</small></label>
                            <input type="number" name="1st" value="<?= $_1st ?>" id="1st" placeholder="50" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="2nd">2nd Genaretion <small>(taka)</small></label>
                            <input type="number" name="2nd" id="2nd" value="<?= $_2nd ?>" placeholder="50" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="3rd">3rd Genaretion <small>(taka)</small></label>
                            <input type="number" name="3rd" id="3rd" value="<?= $_3rd ?>" placeholder="50" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="4th">4th Genaretion <small>(taka)</small></label>
                            <input type="number" name="4th" id="4th" value="<?= $_4th ?>" placeholder="50" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="5th">5th Genaretion <small>(taka)</small></label>
                            <input type="number" name="5th" id="5th" placeholder="50"  value="<?= $_5th ?>"class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validity">Validity <small>(day)</small></label>
                            <input type="number" name="validity" id="validity" placeholder="30" value="<?= $validity ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" id="submit" class="btn btn-primary btn-block">Submit Plan</button>
                    </div>
                </div>

            </form>
        </div>	
    </div>
</body>
</html>