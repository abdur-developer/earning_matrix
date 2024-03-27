<?php 
	require '../../../includes/dbconnect.php';
	$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;



    $table_name = 'deposit';
	$type = 'all';
	if(isset($_REQUEST['type'])){
		$type = $_REQUEST['type'];
	}
	$sql = "SELECT * FROM $table_name ORDER BY id DESC LIMIT $start, $limit";
	if($type == 'pen'){
		$sql = "SELECT * FROM $table_name WHERE status = 'Pending' ORDER BY id DESC LIMIT $start, $limit";
	}elseif($type == 'act'){
		$sql = "SELECT * FROM $table_name WHERE status = 'Approved' ORDER BY id DESC LIMIT $start, $limit";
	}elseif($type == 'ban'){
		$sql = "SELECT * FROM $table_name WHERE status = 'Ban' ORDER BY id DESC LIMIT $start, $limit";
	}

	$result = $conn->query($sql);
	$customers = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $conn->query("SELECT count(id) AS id FROM $table_name");




	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
    if($pages == $page)$Next = $page ;
	else $Next = $page + 1;

 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css"/>
	<script type="text/javascript" src="../../../bootstrap/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div class="bg-secondary py-2">
		<h3 class="text-white text-center">Deposite Details</h3>
		<h3 class="text-white text-center">Total : <?= $total ?></h3>
	</div>
	<div class="container well">
		<div class="row">
			
			<div class="text-center" style="margin-top: 20px; " class="col-md-2 mb-3">
				<form method="post" action="" id="myForm">
						<select name="limit-records" id="limit-records" onchange="submitForm()">
							<option disabled="disabled" selected="selected">---Limit Records---</option>
							<?php foreach([10,50,100,500,1000] as $limit): ?>
								<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
							<?php endforeach; ?>
						</select>
					</form>
				</div>
		</div>
		<div style="height: 600px; overflow-y: auto;" class="mt-3 px-1 mx-1">
            <?php foreach($customers as $customer) :  
                ?>
                
                <div class="border rounded border-primary p-1 mb-3">
                    <div class="row bg-white justify-content-center" style="height: 70px;">
                        <div class="col-2">
                            <img src="<?php 
                                $xx = $customer['status'];
                                if($xx == 'Approved'){
                                    echo "../img/success.png";
                                }elseif ($xx == 'Ban') {
                                    echo "../img/reject.png";
                                }else {
                                    echo "../img/run.png";
                                }
                            ?>" alt="" width="50px" class="img-fluid d-block m-auto mt-2">
                        </div>
                        <div class="col-5">
                            <p class="d-inline " style="font-size: 17px; font-weight: 700;"><?= $customer['number']; ?></p>
                            <p class="small"><?= $customer['method']."<br>".$customer['time']; ?></p>
                        </div>
                        <div class="col-2"><h4 class="fw-bolder text-center pt-3"><?= $customer['amount']; ?>$</h4></div>
                        <div class="col-3 justify-content-center p-1">
                            <?php
                                $queryString = http_build_query($customer);
                                $link = "details.php?" . $queryString;
                            ?>
                            <a href="<?= $link ?>" class="btn btn-success d-block m-auto w-50 mt-2">View</a>
                        </div>
                    </div>
                </div>
            
            <?php endforeach; ?>
      		
		</div>
		<div class="d-flex justify-content-end">
				<nav aria-label="Page navigation">
					<ul class="pagination">
				    <li class="page-item">
				      <a href="?page=<?php if($Previous == 0 ) echo '1'; else echo $Previous; ?>" class="page-link" aria-label="Previous" <?php  ?>>
				        <span aria-hidden="true">&laquo; Previous</span>
				      </a>
				    </li>
				    <?php for($i = 1; $i<= $pages; $i++) : ?>
				    	<li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
				    <?php endfor; ?>
				    <li class="page-item">
				      <a href="?page=<?= $Next; ?>" class="page-link" aria-label="Next">
				        <span aria-hidden="true">Next &raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>


	<script type="text/javascript">
		function submitForm() {
		document.getElementById("myForm").submit();
		}
	</script>
</body>
</html>
