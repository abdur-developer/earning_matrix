<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <div class="card p-2 m-2">
        <?php 
        require "../includes/dbconnect.php";
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