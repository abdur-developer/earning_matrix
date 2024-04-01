<!-- ======================================================================================================== -->
<?php require 'includes/dbconnect.php';
session_start();
//============================ contact details
$sql = "SELECT * FROM contact WHERE id = 1";
$fatch = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($fatch);
$c_email = $row['contact_email'];
$c_number = $row['contact_number'];
//============================ contact details

$sql = "SELECT * FROM total WHERE id = 1";

$fatch = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($fatch);

$active = $row['t_active'] . "+";
$user = $row['t_user'] . "+";
$new_user = $row['t_new_user'] . "+";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>My Earningbd - make money online | online income | eraning money in bangladesh</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="color-scheme" content="light only" />
  <meta name="description"
    content="Introducing Crosstalk - a podcast show focused on work life balance and productivity." />
  <meta property="og:site_name"
    content="My Earningbd - make money online | online income | eraning money in bangladesh" />
  <meta property="og:title"
    content="My Earningbd - make money online | online income | eraning money in bangladesh" />
  <meta property="og:type" content="website" />
  <meta property="og:description"
    content="My Earningbd - make money online | online income | eraning money in bangladesh" />
  <meta property="og:image" content="assets/images/earning_earning_main_page.jpg" />
  <meta name="twitter:image" content="assets/images/earning_earning_main_page.jpg">
  <link rel="icon" href="assets/images/logo.png" type="image/png">
  <meta property="og:image:type" content="image/jpg" />
  <meta property="og:image:width" content="1280" />
  <meta property="og:image:height" content="800" />
  <!--<meta property="og:url" content="https://9a15af69f10f805d.demo.carrd.co" />
  <meta property="twitter:card" content="summary_large_image" />
  <link rel="canonical" href="https://9a15af69f10f805d.demo.carrd.co" />-->
  <link
    href="https://fonts.googleapis.com/css2?display=swap&family=Suez+One:ital,wght@0,400;1,400&family=Krub:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Lato:ital,wght@0,400;0,700;1,400;1,700"
    rel="stylesheet" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="style.css">
  <noscript>
    <style>
      body {
        overflow: auto !important;
      }

      #main {
        opacity: 1 !important;
        transform: none !important;
        transition: none !important;
        filter: none !important;
      }
    </style>
  </noscript>
</head>

<body class="is-loading">
  <div id="wrapper">
    <div id="main">
      <div class="inner">
        <div id="container01" class="container columns full">
          <div class="wrapper">
            <div class="inner">
              <div>
                <div id="image02" class="image">
                  <span class="frame"><a href="#"><img src="assets/images/logo.png" alt="myearningbd" /></a>
                  </span>
                </div>
              </div>
              <div>
                <ul id="links03" class="links">
                  <li class="n01"><a href="#">My Earningbd</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div id="container03" class="container columns">
          <div class="wrapper">
            <div class="inner">
              <div>
                <h1 id="text09">
                  Shop now!
                  <span style="color: #cb9c58">Exclusive</span> Offer Awaiting.
                </h1>
                <p id="text02">
                  Hey! Get this ultimate shopping solution where you are going to get the ultimate offer. Upto 90% off
                  today.
                </p>
                <ul id="buttons02" class="buttons">
                  <?php
                  if(isset($_SESSION["id"])){ ?>
                    <li><a href='home/' class='button n02'>Dashboard</a></li>
                    <li><a href='auth/logout.php' class='button n01'>Logout</a></li>
                    <li><a href='home/home/?q=shop' class='button n03'>Shop Now</a></li>
                    <?php
                  }else{ 
                    ?>
                  <li><a href="auth/" class="button n01">Sign In</a></li>
                  <li><a href="auth/?s" class="button n02">Registration</a></li>
                  <li><a href="auth/" class="button n03">Shop now</a></li>
                  <?php } ?>
                </ul>
                <p id="text21">⭐ Rated 4.5/5 from 155 reviews</p>
                <hr id="divider01" />
              </div>
              <div>
                <div id="image01" class="image">
                    <!-- ======== Slider Starts ============ -->
                    <div style="justify-content: center; display: flex; width: 100%;">
                      <style>
                        /* ===========slider_top=================== */

                        @keyframes fade {
                          from {
                            opacity: 0.4;
                          }
                          to {
                            opacity: 1;
                          }
                        }
                        #slider_top {
                          margin: 0 auto;
                          width: 80%;
                          overflow: hidden;
                        }
                        .slides_top {
                          overflow: hidden;
                          animation-name: fade;
                          animation-duration: 1s;
                          display: none;
                        }
                        #dot_top {
                          margin: 0 auto;
                          text-align: center;
                        }
                        .dot_top {
                          display: inline-block;
                          border-radius: 50%;
                          background: #9bb6a4;
                          padding: 8px;
                          margin: 10px 5px;
                        }
                        .active-top {
                          background: #0b6000;
                        }
                        @media (max-width:567px) {
                          #slider_top {
                            width: 100%;

                          }
                        }

                        /* ===========slider_top=================== */
                      </style>
                      <div id="slider_top" width="100%">
                        <div class="frame">
                          <div class="slides_top">
                            <img src="assets/slider/item1.png"  style="width: 100%; height: 56%;"/>
                          </div>
                          <div class="slides_top">
                              <img src="assets/slider/item2.png" style="width: 100%; height: 56%;"/>
                          </div>
                          <div class="slides_top">
                              <img src="assets/slider/item3.png" style="width: 100%; height: 56%;"/>
                          </div>
                          <div class="slides_top">
                              <img src="assets/slider/item1.png" style="width: 100%; height: 56%;"/>
                          </div>
                          <div class="slides_top">
                              <img src="assets/slider/item2.png" style="width: 100%; height: 56%;"/>
                          </div>
                        </div>
                        

                        <div id="dot_top">
                          <span class="dot_top"></span>
                          <span class="dot_top"></span>
                          <span class="dot_top"></span>
                          <span class="dot_top active-top"></span>
                          <span class="dot_top"></span>
                        </div>
                      </div>
                      <script type="text/javascript">
                        var position = 0;
                        var slides_top = document.querySelectorAll(".slides_top");
                        var dot_top = document.querySelectorAll(".dot_top");

                        function changeSlide_top() {
                          if (position < 0) {
                            position = slides_top.length - 1;
                          }

                          if (position > slides_top.length - 1) {
                            position = 0;
                          }

                          for (let i = 0; i < slides_top.length; i++) {
                            slides_top[i].style.display = "none";
                            dot_top[i].classList.remove("active-top");
                          }

                          slides_top[position].style.display = "block";
                          dot_top[position].classList.add("active-top");

                          position++;

                          setTimeout(changeSlide_top, 2000);
                        }

                        changeSlide_top();
                      </script>
                    </div>
                    <!-- ======== Slider Edns ============ -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="container14" class="container columns full screen">
          <div class="wrapper">
            <div class="inner">
              <div>
                <h2 id="text12">
                  <?php echo $user ?>
                </h2>
                <p id="text13">All Users</p>
              </div>
              <div>
                <h2 id="text32">
                  <?php echo $active ?>
                </h2>
                <p id="text33">Active Users</p>
              </div>
              <div>
                <h2 id="text29">
                  <?php echo $new_user ?>
                </h2>
                <p id="text16">New user</p>
              </div>
            </div>
          </div>
        </div>
        <div id="container02" class="container columns">
          <div class="wrapper">
            <div class="inner">
              <div>
                <div id="image06" class="image">
                  <span class="frame"><img src="assets/images/bg.png" alt="myearningbd" /></span>
                </div>
              </div>
              <div>
                <h2 id="text28">Something for you</h2>
                <hr id="divider06" />
                <p id="text15">
                  <span class="p">
                    At <strong>My Earningbd,</strong> we are committed to revolutionizing the way individuals approach
                    online earning and financial empowerment.</span>
                  <span class="p"> Our platform provides a unique blend of cutting-edge technologies and innovative
                    strategies that allow users to seize opportunities in the dynamic world of online trading,
                    task-based earning, and referral rewards.</span>
                  <span class="p"> With a customer-centric approach, we are dedicated to fostering financial growth for
                    every user who joins our community.</span>
                </p>
                <ul id="icons02" class="icons">
                  <li>
                    <a class="n01" href="" aria-label="Instagram"><svg>
                        <use xlink:href="#icon-85976685de3e4af37529a1ce5d57d2a7"></use>
                      </svg>
                      <span class="label">Instagram</span></a>
                  </li>
                  <li>
                    <a class="n02" href="" aria-label="Twitter"><svg>
                        <use xlink:href="#icon-0c4db87eff374f0f1ef47f8f043f0132"></use>
                      </svg>
                      <span class="label">Twitter</span></a>
                  </li>
                  <li>
                    <a class="n03" href="" aria-label="Facebook"><svg>
                        <use xlink:href="#icon-a1eb5cac0cee3b05a40d856c98ce14a5"></use>
                      </svg>
                      <span class="label">Facebook</span></a>
                  </li>
                  <li>
                    <a class="n04" href="" aria-label="YouTube"><svg>
                        <use xlink:href="#icon-a63c85b2b6ee333b6d6753e57c8dfe0a"></use>
                      </svg>
                      <span class="label">YouTube</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div id="container06" class="container columns">
          <div class="wrapper">
            <div class="inner">
              <div>
                <p id="text05">Our users</p>
                <h2 id="text19">What people are saying</h2>
                <hr id="divider07" />
              </div>
            </div>
          </div>
        </div>
        <!-- =================slider====================-->
        <div id="container12" class="container columns">
          <div class="wrapper">
            <div class="inner">

              <div style="justify-content: center; display: flex; width: 100%;">
                <style>
                  @keyframes fade {
                    from {
                      opacity: 0.4;
                    }
                    to {
                      opacity: 1;
                    }
                  }
                  #slider {
                    margin: 0 auto;
                    width: 80%;
                    overflow: hidden;
                  }
                  .slides {
                    overflow: hidden;
                    animation-name: fade;
                    animation-duration: 1s;
                    display: none;
                  }
                  #dot {
                    margin: 0 auto;
                    text-align: center;
                  }
                  .dot {
                    display: inline-block;
                    border-radius: 50%;
                    background: #9bb6a4;
                    padding: 8px;
                    margin: 10px 5px;
                  }
                  .active_x {
                    background: #0b6000;
                  }
                  @media (max-width:567px) {
                    #slider {
                      width: 100%;

                    }
                  }

                </style>
                <div id="slider" width="100%">

                  <div class="slides" style="display: none;" width="100%" height="900px"><!--===============item start==================-->
                    <div>
                      <div width="100%" height="100px">
                        <div id="image07" class="image" style="text-align: right; justify-content: right;">
                          <span class="frame"><img src="https://9a15af69f10f805d.demo.carrd.co/assets/images/image07.png?v=bad71281" alt="myearningbd"></span>
                        </div>
                        <div id="image10" class="image img_profile">
                          <span class="frame"><img src="assets/review_profile/img1.jpeg" alt="myearningbd" style="width: 50px; height: 50px;"></span>
                        </div>
                        <p id="text30">"Alhamdulillah. I can earn much better from here. So far I have received 5000taka from here"</p>
                        <div style="text-align: right; justify-content: right;">
                          <p id="text18">Sham Rubaid</p>
                          <p id="text17"><em>Member Of My Earningbd</em></p>
                        </div>
                    </div>
                    </div>
                  </div><!--=============================item end==============-->

                  <div class="slides" style="display: none;" width="100%" height="900px"><!--===============item start==================-->
                    <div>
                      <div width="100%" height="100px">
                        <div id="image07" class="image" style="text-align: right; justify-content: right;">
                          <span class="frame"><img src="https://9a15af69f10f805d.demo.carrd.co/assets/images/image07.png?v=bad71281" alt="myearningbd"></span>
                        </div>
                        <div id="image10" class="image img_profile">
                          <span class="frame"><img src="assets/review_profile/img3.jpeg" alt="myearningbd" style="width: 50px; height: 50px;"></span>
                        </div>
                        <p id="text30">"অনেক ভালো একটা ওয়েবসাইট। অনেক কম ডিপোজিট করে অনেক ভালো ফলাফল পাওয়া যায় এখান থেকে। আপনারা চাইলে এখান থেকে কাজ করতে পারেন। ইনশা আল্লাহ প্রতারিত হবেন না।"</p>
                        <div style="text-align: right; justify-content: right;">
                          <p id="text18">Mannan Vuiya</p>
                          <p id="text17"><em>Member Of My Earningbd</em></p>
                        </div>
                    </div>
                    </div>
                  </div><!--=============================item end==============-->

                  <div class="slides" style="display: none;" width="100%" height="900px"><!--===============item start==================-->
                    <div>
                      <div width="100%" height="100px">
                        <div id="image07" class="image" style="text-align: right; justify-content: right;">
                          <span class="frame"><img src="https://9a15af69f10f805d.demo.carrd.co/assets/images/image07.png?v=bad71281" alt="myearningbd"></span>
                        </div>
                        <div id="image10" class="image img_profile">
                          <span class="frame"><img src="assets/review_profile/img2.jpeg" alt="myearningbd" style="width: 50px; height: 50px;"></span>
                        </div>
                        <p id="text30">"Earning matrix এর সাপোর্ট সেকশন অনেক ফাস্ট। আমি পেমেন্ট নিয়ে একটা প্রব্লেম এ পরেছিলাম । পরে তাদের পেমেন্ট সাপোর্টে কল দেই। ৫ মিনিটের মধ্যে তারা সেই সমস্যা সমাধান করে দিয়েছিল।"</p>
                        <div style="text-align: right; justify-content: right;">
                          <p id="text18">Ishita Jannat</p>
                          <p id="text17"><em>Member Of My Earningbd</em></p>
                        </div>
                    </div>
                    </div>
                  </div><!--=============================item end==============-->

                  <div class="slides" style="display: none;" width="100%" height="900px"><!--===============item start==================-->
                    <div>
                      <div width="100%" height="100px">
                        <div id="image07" class="image" style="text-align: right; justify-content: right;">
                          <span class="frame"><img src="assets/images/4star.png" alt="myearningbd" height="30px"></span>
                        </div>
                        <div id="image10" class="image img_profile">
                          <span class="frame"><img src="assets/review_profile/img4.jpeg" alt="myearningbd" style="width: 50px; height: 50px;"></span>
                        </div>
                        <p id="text30">"not so good. পেমেন্ট সার্ভিস গুলো একটু ভালো করার চেস্টা করবেন। ২৪ ঘন্টা পর পেমেন্ট, অনেক টাইম হয়ে যায়। তাই সেদিকে নজর রাখতে বলব। "</p>
                        <div style="text-align: right; justify-content: right;">
                          <p id="text18">Nurul Islam</p>
                          <p id="text17"><em>Member Of My Earningbd</em></p>
                        </div>
                    </div>
                    </div>
                  </div><!--=============================item end==============-->

                  <div class="slides" style="display: none;" width="100%" height="900px"><!--===============item start==================-->
                    <div>
                      <div width="100%" height="100px">
                        <div id="image07" class="image" style="text-align: right; justify-content: right;">
                          <span class="frame"><img src="https://9a15af69f10f805d.demo.carrd.co/assets/images/image07.png?v=bad71281" alt="myearningbd"></span>
                        </div>
                        <div id="image10" class="image img_profile">
                          <span class="frame"><img src="assets/review_profile/img5.jpeg" alt="myearningbd" style="width: 50px; height: 50px;"></span>
                        </div>
                        <p id="text30">"ভালো বললেই চলে। "</p>
                        <div style="text-align: right; justify-content: right;">
                          <p id="text18">Shaikh Nasir</p>
                          <p id="text17"><em>Member Of My Earningbd</em></p>
                        </div>
                    </div>
                    </div>
                  </div><!--=============================item end==============-->

                  <div id="dot">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot active_x"></span>
                    <span class="dot"></span>
                  </div>
                </div>
              </div>
            </div><!-- ===============================slider===================-->
          </div>
          <script>
            var index = 0;
            var slides = document.querySelectorAll(".slides");
            var dot = document.querySelectorAll(".dot");

            function changeSlide() {

              if (index < 0) {
                index = slides.length - 1;
              }

              if (index > slides.length - 1) {
                index = 0;
              }

              for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                dot[i].classList.remove("active_x");
              }

              slides[index].style.display = "block";
              dot[index].classList.add("active_x");

              index++;

              setTimeout(changeSlide, 2000);

            }

            changeSlide();
          </script>
        </div>
        <!-- =================slider====================-->
        <div id="container05" class="container default">
          <div class="wrapper">
            <div class="inner">
              <h2 id="text36">In Collaboration With</h2>
              <hr id="divider05" />
              <p id="text23">
                If you can't find the answer you're looking for, don't hesitate to reach out to our dedicated support
                team. Click on the "Contact Us" option, and we'll get back to you as soon as possible.
              </p>
            </div>
          </div>
        </div>
        <div id="container07" class="container columns">
          <div class="wrapper">
            <div class="inner">
              <div>
                <div id="image18" class="image">
                  <span class="frame"><img src="assets/images/logo.png" alt="myearningbd" /></span>
                </div>
                <p id="text20">
                  " 'My Earningbd' where you can earn by buy and sell products.You also can earn by refer people"
                </p>
              </div>
              <div>
                <p id="text03">Get the latest update</p>
                <form id="form01" method="post" action="launch/assets/php/subscribe.php">
                  <div class="inner">
                    <div class="field">
                      <input type="email" name="email" id="form01-email" placeholder="Email" maxlength="128" required />
                    </div>
                    <div class="actions" style="margin-top: 10px">
                      <input name="type" value="main" hidden>
                      <button type="submit">subscribe</button>
                    </div>
                  </div>
                </form>
              </div>
              <div>
                <p id="text07">Explore</p>
                <ul id="links04" class="links">
                  <li class="n01"><a href="">Privary Policy</a></li>
                  <li class="n02"><a href="">Tarms and condition</a></li>
                  <li class="n03"><a href="">Refund policy</a></li>
                  <li class="n04"><a href="">Recommend a Guest</a></li>
                </ul>
              </div>
              <div>
                <p id="text08">Get in Touch</p>
                <ul id="links02" class="links">
                  <li class="n01">
                    <a href="<?php echo 'mailto:'.$c_email; ?>"><span class="__cf_email__"
                        data-cfemail="2a43444c456a4e45474b434404494547"><?php echo $c_email; ?></span></a>
                  </li>
                  <li class="n02"><a href=""><?php echo $c_number; ?></a></li>
                </ul>
                <ul id="icons01" class="icons">
                  <li>
                    <a class="n01" href="" aria-label="Instagram"><svg>
                        <use xlink:href="#icon-85976685de3e4af37529a1ce5d57d2a7"></use>
                      </svg>
                      <span class="label">Instagram</span></a>
                  </li>
                  <li>
                    <a class="n02" href="" aria-label="Facebook"><svg>
                        <use xlink:href="#icon-a1eb5cac0cee3b05a40d856c98ce14a5"></use>
                      </svg>
                      <span class="label">Facebook</span></a>
                  </li>
                  <li>
                    <a class="n03" href="" aria-label="LinkedIn"><svg>
                        <use xlink:href="#icon-bf393d6ea48a4e69e1ed58a3563b94a5"></use>
                      </svg>
                      <span class="label">LinkedIn</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div id="container11" class="container default">
          <div class="wrapper">
            <div class="inner">
              <p id="text01">
                Copyright © 2024 | My Earningbd
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="script.js"></script>
  <?php
  if (isset($_REQUEST['s'])) {
    echo "<script> Swal.fire({ title: 'Congrass!', text: 'Subscribe successfull..!', icon: 'success' });</script>";
  }
  if (isset($_REQUEST['e'])) {
    echo "<script> Swal.fire({ title: 'Opps!', text: 'Somthing wrong..!', icon: 'error' });</script>";
  }
  ?>
</body>

</html>