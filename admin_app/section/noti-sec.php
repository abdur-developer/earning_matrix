<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board</title>
    <link href='../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
</head>

<body>
    <div class="header bg-primary text-white row">
        <h1 class="text-center col-1">
            <a class="btn btn-light" href="../home.php">Home</a>
        </h1>
        <h1 class="py-2 text-center col-11">Notice Board</h1>
    </div>
    <div class="continer">
    <div><a class="btn btn-primary mt-2" href="noti-details/add.php"><b>+</b> Add New</a></div>
    </div>


    <div class="card p-2 m-2">
        <?php 
                require '../../includes/dbconnect.php';
        $sql = "SELECT * FROM notice ORDER BY id DESC";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){

            while($row = mysqli_fetch_array($query)){
                echo "<div class='alert alert-danger' role='alert'>".$row['text']."</div>";
            }
        }else{
            echo "<div class='alert alert-danger' role='alert'>Nothing alert now</div>";
        }
        ?>
    </div>
</body>

</html>