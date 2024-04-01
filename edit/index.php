<?php
require "../includes/dbconnect.php";
session_start();// Fill session id with user's id to get user's data like name and image name
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $sessionId"));

if(isset($_REQUEST['name'])){
  $name = $_REQUEST['name'];
  $phone = $_REQUEST['phone'];
  $jela = $_REQUEST['jela'];

  $sql = "UPDATE users SET name = '$name', phone = '$phone', jela = '$jela' WHERE id = $sessionId";
  $update = mysqli_query($conn, $sql);
  if($update){
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
      Swal.fire({
        title: 'Congrass!',
        text: 'Data update successfull..!',
        icon: 'success'
      }).then((result) => {
        if (result.isConfirmed) {
        window.location.href = '../profile/index.php';
        }
        });</script>";
    header("location: ../profile/index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update profile | myearningbd</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.jss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container bootstrap snippets bootdey">
        <div class="logo_item mt-3"><a href="../home/">
          <div class="logo_item">
            <img class="navbar-img" src="../assets/images/logo.png" alt="logo" >Earning<span><b>Matrix</b></span>
          </div></a>
          </div>
          <hr>
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img src="../assets/profile_img/<?php echo $user['image']; ?>" class="avatar img-fluid rounded-circle" alt="profile" height="100px">
            </div>
          </div>
          
          <!-- edit form column -->
          <div class="col-md-9 personal-info mt-3">
            <!-- <div class="alert alert-info">
              <i class="fa fa-coffee"></i>
              This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div> -->
            <h3>Personal info</h3>
            
            <form class="form-horizontal" role="form" action="" method="post">
              <div class="form-group">
                <label class="col-lg-3 control-label">Full name:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" value="<?php echo $user['name']; ?>" required name="name">
                </div>
              </div>
              <div class="form-group mt-1">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" value="<?php echo $user['email']; ?>" disabled>
                </div>
              </div>
              <div class="form-group mt-1">
                <label class="col-lg-3 control-label">Phone:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" value="<?php echo $user['phone']; ?>" required name="phone">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">District:</label>
                <div class="col-lg-8">
                  <div class="ui-select">
                    <select id="district" name="jela" class="form-control">
                        <option>Select a district</option>
                        <option value="Bagerhat">Bagerhat</option>
                        <option value="Bandarban">Bandarban</option>
                        <option value="Barguna">Barguna</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Bhola">Bhola</option>
                        <option value="Bogra">Bogra</option>
                        <option value="Brahmanbaria">Brahmanbaria</option>
                        <option value="Chandpur">Chandpur</option>
                        <option value="Chapainawabganj">Chapainawabganj</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Chuadanga">Chuadanga</option>
                        <option value="Comilla">Comilla</option>
                        <option value="Cox's Bazar">Cox's Bazar</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Dinajpur">Dinajpur</option>
                        <option value="Faridpur">Faridpur</option>
                        <option value="Feni">Feni</option>
                        <option value="Gaibandha">Gaibandha</option>
                        <option value="Gazipur">Gazipur</option>
                        <option value="Gopalganj">Gopalganj</option>
                        <option value="Habiganj">Habiganj</option>
                        <option value="Jamalpur">Jamalpur</option>
                        <option value="Jashore">Jashore</option>
                        <option value="Jhalokathi">Jhalokathi</option>
                        <option value="Jhenaidah">Jhenaidah</option>
                        <option value="Joypurhat">Joypurhat</option>
                        <option value="Khagrachari">Khagrachari</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Kishoreganj">Kishoreganj</option>
                        <option value="Kurigram">Kurigram</option>
                        <option value="Kushtia">Kushtia</option>
                        <option value="Lakshmipur">Lakshmipur</option>
                        <option value="Lalmonirhat">Lalmonirhat</option>
                        <option value="Madaripur">Madaripur</option>
                        <option value="Magura">Magura</option>
                        <option value="Manikganj">Manikganj</option>
                        <option value="Meherpur">Meherpur</option>
                        <option value="Moulvibazar">Moulvibazar</option>
                        <option value="Munshiganj">Munshiganj</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Naogaon">Naogaon</option>
                        <option value="Narail">Narail</option>
                        <option value="Narayanganj">Narayanganj</option>
                        <option value="Narsingdi">Narsingdi</option>
                        <option value="Natore">Natore</option>
                        <option value="Nawabganj">Nawabganj</option>
                        <option value="Netrakona">Netrakona</option>
                        <option value="Nilphamari">Nilphamari</option>
                        <option value="Noakhali">Noakhali</option>
                        <option value="Pabna">Pabna</option>
                        <option value="Panchagarh">Panchagarh</option>
                        <option value="Patuakhali">Patuakhali</option>
                        <option value="Pirojpur">Pirojpur</option>
                        <option value="Rajbari">Rajbari</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Rangamati">Rangamati</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Satkhira">Satkhira</option>
                        <option value="Shariatpur">Shariatpur</option>
                        <option value="Sherpur">Sherpur</option>
                        <option value="Sirajganj">Sirajganj</option>
                        <option value="Sunamganj">Sunamganj</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Tangail">Tangail</option>
                        <option value="Thakurgaon">Thakurgaon</option>
                        
                        <?php 
                          $jela = $user['jela'];
                          if($jela != "" || $jela != null){echo "<option value='$jela'  selected>$jela</option>";}
                        ?>                    
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group mt-3">
                <div class="col-lg-8">
                    <input class="form-control btn-primary" type="submit" value="Update">
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
</body>
</html>