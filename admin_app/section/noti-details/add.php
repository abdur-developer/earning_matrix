<?php 
if(isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];
    
    require '../../../includes/dbconnect.php';
    $sql = "INSERT INTO notice (text) VALUES ('$name')"; 
    if(mysqli_query($conn, $sql)){
        header("location: ../noti-sec.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding notice</title>
    <link href='../../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>
    <div class="header bg-primary text-white row">
        <h1 class="text-center col-1">
            <a class="btn btn-light" href="../../home.php">Home</a>
        </h1>
        <h1 class="py-2 text-center col-11">Adding New Lottery</h1>
    </div>
    <div class="form-wrap my-4 mx-5">	
            <form id="survey-form" action="" method="post">
                
                <div class="form-group">
                    <label id="name-label" for="name">Notice Massage</label>
                    <input type="text" name="name" id="name" placeholder="Enter notice" class="form-control" maxlength="20" required>
                </div>
                
                <div class="row m-4">
                    <div class="col-md-4">
                        <button type="submit" id="submit" class="btn btn-primary btn-block">Add Notice</button>
                    </div>
                </div>

            </form>
        </div>	
</body>
</html>