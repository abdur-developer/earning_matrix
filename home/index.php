<?php
require "../includes/dbconnect.php";

$sql = "SELECT site_on_off FROM system WHERE id = '1'";
$r = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$site_on_off = $r['site_on_off'];

if($site_on_off == 0){
    header("location: ../maintenance.php");
}

session_start();
if(!isset($_SESSION["id"])){
  header("location: ../auth");
  die("login failed");
}
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $sessionId"));


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/png" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <title>
      My Earningbd | make money online | earning website | refer and earn
    </title>
    <!--- google font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar">
      
        <div class="logo_item ml-5 pl-2">
          <i class="bx bx-menu" id="sidebarOpen"></i>
          <a href="../home/" class="nav_link submenu_item a-logo">
            <img src="../assets/images/logo.png" alt="logo" />My Earning<span class="matrix">BD</span>
          </a>
        </div>
      
      <!--
      <div class="search_bar">
        <input type="text" placeholder="Search" />
      </div>-->

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <!-- <i class="bx bx-sun" id="darkLight"></i> -->
        <a href="?q=notice" class="nav_link"><i class='bx bx-bell' ></i></a>
        <a href="../profile/"><img src=" <?php echo '../assets/profile_img/'.$user['image']; ?> " alt="profile" class="profile mr-5 pr-2" /></a>
      </div>
    </nav>
    <!-- end navbar -->

    <div class="conta">
      <div class="side">
        <!-- sidebar -->
        <nav class="sidebar">
          <div class="menu_content">
            <ul class="menu_items">
              <div class="menu_title menu_dahsboard"></div>
              <li class="item">
                <div class="nav_link submenu_item">
                  <span class="navlink_icon">
                    <i class="bx bx-home-alt"></i>
                  </span>
                  <span class="navlink">Upcoming</span>
                  <i class="bx bx-chevron-right arrow-left"></i>
                </div>

                <ul class="menu_items submenu">
                  <a href="../launch/" class="nav_link sublink">Deliver and earn</a>
                  <a href="../launch/" class="nav_link sublink">Become partner</a>
                  <!-- <a href="../launch/" class="nav_link sublink">My Job</a> -->
                  <a href="../launch/" class="nav_link sublink">My refer tree</a>
                </ul>
              </li>
              <li class="item">
                <div class="nav_link submenu_item">
                  <span class="navlink_icon">
                    <i class="bx bx-grid-alt"></i>
                  </span>
                  <span class="navlink">Processing</span>
                  <i class="bx bx-chevron-right arrow-left"></i>
                </div>
                <ul class="menu_items submenu">
                  <a href="../launch/" class="nav_link sublink">My business</a>
                  <a href="../launch/" class="nav_link sublink">Play game</a>
                  <a href="../launch/" class="nav_link sublink">Ads</a>
                </ul>
              </li>
            </ul>

            <ul class="menu_items">
              <div class="menu_title menu_editor"></div>
              <!-- duplicate these li tag if you want to add or remove navlink only -->
              <!-- Start -->
              <li class="item">
                <a href="?q=lot" class="nav_link" style="position: relative;">
                  <span class="navlink_icon">
                  <i class='bx bx-cloud-snow'></i>
                  </span>
                  <span class="navlink">Lottary</span>
                  <span class="red-bej"></span>
                </a>
              </li>
              <li class="item">
                <a href="?q=task" class="nav_link" style="position: relative;">
                  <span class="navlink_icon">
                  <i class="bx bx-calendar"></i>
                  </span>
                  <span class="navlink">Daily Task</span>
                  <span class="red-bej"></span>
                </a>
              </li>
              <li class="item">
                <a href="?q=premium" class="nav_link" style="position: relative;">
                  <span class="navlink_icon">
                  <i class='bx bx-cloud-snow'></i>
                  </span>
                  <span class="navlink">Pro membership</span>
                </a>
              </li>
              <li class="item">
                <a href="?q=shop" class="nav_link">
                  <span class="navlink_icon">
                    <i class="bx bx-shopping-bag"></i>
                  </span>
                  <span class="navlink">Product</span>
                </a>
              </li>
              <li class="item">
                <a href="?q=lucky" class="nav_link" style="position: relative;">
                  <span class="navlink_icon">
                    <i class="bx bx-color"></i>
                  </span>
                  <span class="navlink">Lucky Draw</span>
                  <span class="red-bej"></span>
                </a>
              </li>
              <li class="item">
                <a href="?q=refer" class="nav_link">
                  <span class="navlink_icon">
                    <i class="bx bx-network-chart"></i>
                  </span>
                  <span class="navlink">Refer</span>
                </a>
              </li>
            </ul>
            <ul class="menu_items">
              <div class="menu_title menu_setting"></div>
              <li class="item">
                <a href="?q=notice" class="nav_link">
                  <span class="navlink_icon">
                  <i class='bx bx-bell' ></i>
                  </span>
                  <span class="navlink">Notice</span>
                </a>
              </li>
              <li class="item">
                <a href="?q=order" class="nav_link">
                  <span class="navlink_icon">
                    <i class="bx bx-task"></i>
                  </span>
                  <span class="navlink">My Order</span>
                </a>
              </li>
              <li class="item">
                <a href="?q=topup" class="nav_link">
                  <span class="navlink_icon">
                    <i class="bx bx-credit-card-alt"></i>
                  </span>
                  <span class="navlink">Top-Up</span>
                </a>
              </li>
              <li class="item">
                <a href="?q=wallet" class="nav_link">
                  <span class="navlink_icon">
                    <i class="bx bx-wallet"></i>
                  </span>
                  <span class="navlink">Wallet</span>
                </a>
              </li>
              <li class="item">
                <a href="?q=deposite" class="nav_link">
                  <span class="navlink_icon">
                    <i class="bx bxs-bank"></i>
                  </span>
                  <span class="navlink">Deposite </span>
                </a>
              </li>
              <li class="item">
                <a href="?q=withdraw" class="nav_link">
                  <span class="navlink_icon">
                    <i class="bx bxs-bank"></i>
                  </span>
                  <span class="navlink">Withdraw </span>
                </a>
              </li>
            </ul>

            <!-- Sidebar Open / Close -->
            <div class="bottom_content">
              <!--<div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
          </div> -->
              <div class="bottom collapse_sidebar">
                <a href="../customer-care" class="nav_link">
                <i class="bx bx-support"></i>
                <span style="margin-left: 5px">Help-Line</span> </a>
                <a href="../auth/logout.php" class="nav_link"><i class="bx bx-log-out ml-2"></i></a>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <div class="main">
        <!-- ================================================================================================================ -->
        <?php
        if(isset($_REQUEST['q'])){
          $q = $_REQUEST['q'];
          if($user['status'] == 'Pending'){
            if($q == 'active'){
              include "../active/index.php";
            }else{
              include "../not-active/index.php";//inactive
            }
          }else{//====active user access start
            if($q == 'shop'){
              include "../shop/index.php";
            }else if($q == 'lucky'){
              include "../spin/index.php";
            }else if($q == 'active'){
              include "../active/index.php";
            }else if($q == 'wallet'){
              include "../wallet/index.php";
            }else if($q == 'withdraw'){
              include "../withdraw/index.php";
            }else if($q == 'topup'){
              include "../topup/index.php";
            }else if($q == 'refer'){
              include "../refer/index.php";
            }else if($q == 'task'){
              include "../task/index.php";
            }else if($q == 'premium'){
              include "../premium/index.php";
            }else if($q == 'order'){
              include "../order/index.php";
            }else if($q == 'lot'){
              include "../lottary/index.php";
            }else if($q == 'deposite'){
              include "../deposite/index.php";
            }else if($q == 'notice'){
              include "../notice/index.php";
            }
          }//====active user access end
        }else{ //=====for default screent start
          if($user['status'] == 'Pending'){
            include "../active/index.php";//inactive
          }else{
            include "../shop/index.php";//active
          }
        }//=========//for default screent end
        ?>
        <!-- ================================================================================================================ -->
      </div>
    </div>
    <!-- JavaScript -->
    <script src="script.js"></script>
  </body>
</html>
