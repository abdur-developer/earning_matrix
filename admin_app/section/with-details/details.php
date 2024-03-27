<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body class="" style="background-color: #E0F7FA;">
    <div class="header bg-primary text-white">
        <h1 class="py-2 text-center">Withdraw Details</h1>
    </div>
    <div class="container">
        



    <?php
    $data = $_GET;
    //print_r($data);
    $id = $data['id'];
    $user_id = $data['user_id'];
    $status = $data['status'];
    ?>
    <div class="card my-3 p-2">

        <div class="row h5">
            <div class="col-6">Method : </div>
            <div class="col-6"><?= $data['method']; ?></div>
            <div class="col-6">Number :  </div>
            <div class="col-6"><?= $data['number']; ?></div>
        </div>
        <hr>
        <div class="row h5">
            <div class="col-6">Amount : </div>
            <div class="col-6"><?= $data['amount']." Taka"; ?></div>
            <div class="col-6">Commission :  </div>
            <div class="col-6"><?= $data['commission']." Taka"; ?></div>
        </div>
        <hr>
        <div class="row h5">
            <div class="col-6">Email : </div>
            <div class="col-6"><?= $data['email']; ?></div>
            <div class="col-6">Time :  </div>
            <div class="col-6"><?= $data['time']; ?></div>
        </div>

        
    </div>

    <div class="card my-3 p-2">
        <div class="row">
            
            
            <?php
                if($status == "Pending"){
                    echo "<div class='col-4'><a href='login.php?id=$user_id&pass=12345ID' rel='noopener noreferrer' class='btn btn-secondary w-100'>User Login</a></div>";

                    echo "<div class='col-4'><a href='action.php?id=$id&pass=12345ID&user_id=$user_id&action=Approved' class='btn btn-success w-100'>Approved</a></div>";

                    echo "<div class='col-4'><a href='action.php?id=$id&pass=12345ID&user_id=$user_id&action=Ban' class='btn btn-danger w-100'>Reject</a></div>";

                }else{
                    echo "<div class='col-12'><a href='login.php?id=$user_id&pass=12345ID' rel='noopener noreferrer' class='btn btn-warning w-100'>User Login</a></div>";
                }
            ?>
            
        </div>
    </div>











    
    </div>
</body>
</html>