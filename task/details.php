<?php
session_start();
if(!isset($_SESSION["id"])){
  header("location: ../auth");
  die("login failed");
}
$user_id = $_SESSION["id"];


require '../includes/dbconnect.php';
if(isset($_REQUEST['name'])){
    
}else{
    die('data not found');
}
    
    $name = $_REQUEST['name'];
    $task_id = $_REQUEST['digbvuidfgvgdb'];

    // echo '<br>id = '.$task_id;
    $sql = "SELECT * FROM task WHERE id = $task_id";
    //echo $sql;
    $query = mysqli_query($conn,$sql);
    $num_of_rows = mysqli_num_rows($query);
    if($num_of_rows == 0 ){
        die("task not available");
    }
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <title>Task Details</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-3">
            <?= $row['title'] ?>
        </h2>
        <p class="description"><?= $row['description'] ?></p>
        <div class="row text-center" id="first-view">
            <div class="col-6">
                <a href="../task" class="btn btn-warning px-5 m-4">Cancel</a>
            </div>
            <div class="col-6">
                <button onclick="goTask()" class="btn btn-danger px-5 m-4">Go Task</button>
            </div>
        </div>
        <form class="d-none" id="second-view" action="submit.php" method="post" enctype="multipart/form-data">
            <div class="row text-center">
                <input type="hidden" value="<?= $task_id ?>" name="id">
                <input type="hidden" value="<?= $user_id ?>" name="user_id">
                <input type="hidden" value="<?= $row['taka'] ?>" name="taka">
                <div class="col-6">
                    <input type="file" name="screensort" required>
                </div>
                <div class="col-6">
                    <input type="submit" class="btn btn-success px-4 m-4" value = "Submit Task"/>
                </div>
            </div>
        </form>
        
        <script>
            function goTask(){
                const firstView = document.getElementById('first-view');
                const secondView = document.getElementById('second-view');
                
                window.open('<?= $row['link'] ?>', '_blank');

                firstView.classList.add('d-none');
                secondView.classList.remove('d-none');
            }
        </script>
    </div>
</body>
</html>