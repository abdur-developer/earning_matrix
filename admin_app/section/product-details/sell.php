<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css" />
    
</head>
<body>
    <div class="container">
        <div class="header d-flex justify-content-center mt-3">
            <img src="../../../assets/images/order.png" class="img-fluid m-2" width="3%">
            <h3 class="m-2 text-info">My Order</h3>
        </div>

        <div class="container-fluid">
            <?php
            if(isset($_REQUEST['success'])){
                echo "<h1 class='bg-success px-3 py-1 text-white text-center'>Successfully data changed</h1>";
            }
            require "../../../includes/dbconnect.php";
            $sql = "SELECT * FROM order_product";
            $query = mysqli_query($conn,$sql);
            $num_of_rows = mysqli_num_rows($query);
            if($num_of_rows > 0){
                echo "<div class='row'>";
                while($row = mysqli_fetch_array($query)){
                    $id = $row['id'];
                    $product_id = $row['product_id'];
                    $amount = $row['amount'];
                    $status = $row['status'];
                    $address = $row['address'];
                    $pay_type = $row['pay_type'];
                    $name = $row['name'];
                    $number = $row['number'];
                    
                    $sql = "SELECT name, img FROM product WHERE id ='$product_id'";
                    $query = mysqli_query($conn,$sql);
                    $x = mysqli_fetch_array($query);
                    $product_name = $x['name'];
                    $product_img = $x['img'];

                    echo "<div class='col-md-6 col-lg-4 px-sm-3 mt-3 rounded border border-success'>
                    <div class='card mt-1'>
                        <div class='row'>
                            <img src='../../../assets/product/$product_img'  class='col-3 img-fluid w-25 my-2' >
                            <div class='col-6'>
                                <h6><a href='../../../shop/details.php?product=$product_id'>$product_name</a></h6>
                                <p><small>$amount taka</small></p>
                            </div>
                            <div class='col-3 pt-4'>
                                <p style='font-size: 12px;'>$status</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h6>Name: $name</h6>
                        <small>Number: $number</small>
                        <address>$address</address>
                        <strong>Payment Type: $pay_type</strong>
                    </div>
                    <div class='row py-2'>
                        <div class='col-4'> 
                              <a class='btn btn-success' href='action.php?approved=$id'>Approved</a>
                        </div>
                        <div class='col-4'>
                            <a class='btn btn-secondary' href='action.php?pending=$id'>Pending</a>
                        </div>
                        <div class='col-4'>
                            <a class='btn btn-danger' href='action.php?reject=$id'>Reject</a>
                        </div>
                    </div>
                </div>";
                }
                echo "</div>";
            }else{
                echo "<img src='../../../assets/images/sorry.jpg' class='img-fluid d-block m-auto mt-4' width='80px' height='80px'>
                <div class='text-danger mt-5'>
                    <p class='text-center small'><b>
                        দুঃখিত user কোনো অর্ডার করে নি ।
                        
                    </b></p>
                </div>";
            }
            ?>
        </div>
    </div>
</body>
</html>