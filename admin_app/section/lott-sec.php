<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Section</title>
    <link href='../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        .card {
            background-color: azure;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <p class="text-center px-2 bg-warning">
        <?php if(isset($_REQUEST['success'])){
            echo "successfully submited";
        }
        if(isset($_REQUEST['error'])){
            echo "Worng , Contact Developer.....";
        } ?>
    </p>
    <div><a class="btn btn-primary mt-2" href="lottary-details/add.php"><b>+</b> Add New</a></div>
        <div class="row">
            <?php
                require '../../includes/dbconnect.php';
                $sql = "SELECT * FROM lottary";
                $query = mysqli_query($conn,$sql);
                $num_of_rows = mysqli_num_rows($query);
                if($num_of_rows > 0){
                    while($row = mysqli_fetch_array($query)){
                        $id = $row['id'];
                        $name = $row['title'];
                        $price = $row['price'];
                        ?>
                        <div class='col-md-4 col-xl-3 px-sm-3 mt-3'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h5 class='text-center'><?= $name ?></h5>
                                    <p class=''>price : <?=$price ?> taka</p>
                                    
                                </div>
                                <div class='card-footer'>
                                    <div class='row text-center'>
                                        <div class='col-4'> 
                                            
                                            <?php
                                            if($row['status'] == 'Approved'){
                                                echo "<a class='btn btn-success' href='lottary-details/status.php?action=Inactive&id=$id'>Active</a>";
                                            }else{
                                                echo "<a class='btn btn-warning' href='lottary-details/status.php?action=Approved&id=$id'>Inactive</a>";
                                            }
                                            ?>
                                        </div>
                                        <!-- <div class='col-4'>
                                            <a class='btn btn-secondary' href='lottary-details/update.php?id=<?= $id ?>'>Update</a>
                                        </div> -->
                                        <div class='col-4'>
                                            <a class='btn btn-danger' href='lottary-details/delete.php?id=<?= $id ?>'>Delete</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }else{
                    echo "
                <div class='container-fluid'>
                    <img src='../../assets/images/sorry.jpg' class='img-fluid d-block m-auto mt-4' width='80px' height='80px'>
                    <div class='text-danger mt-5'>
                        <p class='text-center small'><b>
                            কোনো আইটেম নেই
                        </b></p>
                    </div>
                </div>";
                }
            ?>
            
        </div>
    </div>
</body>
</html>