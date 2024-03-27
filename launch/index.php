<?php
session_start();
if(!isset($_SESSION["id"])){
    header("location: ../auth");
  die("login failed");
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- META -->
        <meta charset="utf-8">
        <meta name="robots" content="noodp">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- PAGE TITLE -->
        <title>Launch - Coming Soon</title>

        <!-- FAVICON -->
        <link rel="shortcut icon" href="../../../assets/images/logo.png">

        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&amp;subset=latin-ext" rel="stylesheet">
        <link rel="shortcut icon" href="../assets/images/logo.png" type="image/png" />

        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="assets/css/plugins.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <style>
            .subscribe{
                font-size: 1.2rem;
                font-weight: 500;
                line-height: 2.6rem;
                padding: 0.6em;
                background: blue;
                padding: 0 1.6rem;
                border: 3px solid #fff;
                border-radius: 4rem;
                color:white;
                margin-top: 10px;
            }
            .email-in{
                font-size: 1.1rem;
                font-family: "Krub", sans-serif;
                font-weight: 500;
                border-radius: 1rem;
                color: #003153;
                border: solid 1px #ededed;
                height: 2.5rem;
                padding: 0 0.875rem;
                line-height: 2.6em;
                height: 40px;
            }
            .subscribe:hover{
                color: #000;
                background: #fff;
            }
        </style>

    </head>


    <body>
    
       
        <!-- PRELOADER -->
        <div class="preloader">
           
            <!-- SPINNER -->
            <div class="spinner">
             
              <div class="bounce-1"></div>
              <div class="bounce-2"></div>
              <div class="bounce-3"></div>
              
            </div>
            <!-- /SPINNER -->
            
        </div>
        <!-- /PRELOADER -->


        <!-- HERO -->
        <div class="hero">


            <!-- FRONT CONTENT -->
            <div class="front-content">


                <!-- CONTAINER MID -->
                <div class="container-mid">


                    <!-- ANIMATION CONTAINER -->
                    <div class="animation-container animation-fade-down" data-animation-delay="0">
                       
                        <img class="img-responsive logo" src="assets/img/logo.png" alt="image">
                        
                    </div>
                    <!-- /ANIMATION CONTAINER -->
                    
                    
                    <!-- ANIMATION CONTAINER -->
                    <div class="animation-container animation-fade-right" data-animation-delay="300">
                        
                        <h1>We're Coming Soon..</h1>
                        
                    </div>
                    <!-- /ANIMATION CONTAINER -->
                    
                    
                    <!-- ANIMATION CONTAINER -->
                    <div class="animation-container animation-fade-left" data-animation-delay="600"> 
                       
                        <p class="subline">We're working on our new website. Join our newsletter and get notifed.</p>
                        
                    </div>
                    <!-- /ANIMATION CONTAINER -->
                    

                    <!-- ANIMATION CONTAINER -->
                    <div class="animation-container animation-fade-up" data-animation-delay="900"> 
                       
                        
                        <?php 
                            if(isset($_REQUEST['s'])){
                                echo "<font 
                                style='border: 3px solid #fff;border-radius: 4em;color:green; font-size: 2.2rem; font-weight: 500;
                                line-height: 2.6em; padding: 0.6em;background: #fff;'>
                                Subscribe successfull..!</font>";
                            }else if(isset($_REQUEST['e'])){
                                echo "<font class='xxx' style='border: 3px solid #fff;border-radius: 4em; color:red; font-size: 2.2rem; font-weight: 500;
                                line-height: 2.6em; padding: 0.6em; background: #fff;'>
                                Somthing wrong..!</font>";
                            }else{
                                echo "<div class='open-popup'>Notify Me</div>";
                            }
                        ?>
                        
                    </div>
                    <!-- /ANIMATION CONTAINER -->
                    

                </div>
                <!-- /CONTAINER MID -->


                <!-- FOOTER -->
                <div class="footer">
                    

                    <!-- ANIMATION CONTAINER
                    <div class="animation-container animation-fade-up" data-animation-delay="1200">
                       
                        <p>© 2017 Your Brand | Design by <a href="https://templatefoundation.com">Template Foundation</a></p>
                        
                    </div>
                     /ANIMATION CONTAINER -->
                    

                </div>
                <!-- /FOOTER -->


            </div>
            <!-- /FRONT CONTENT -->


            <!-- BACKGROUND CONTENT -->
            <div class="background-content parallax-on">

                <div class="background-overlay"></div>
                <div class="background-img layer" data-depth="0.05"></div>
                
            </div>
            <!-- /BACKGROUND CONTENT -->


        </div>
        <!-- /HERO -->
        
        
        <!-- POPUP ( SUBSCRIBE ) -->
        <div class="popup">
           
           
            <!-- CARD -->
            <div class="card">
                    
                    
                    <!-- CARD CLOSE BUTTON -->
                    <div class="close-popup close-button"></div>
                   
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <h3>By Email</h3>
                    <p class="subline">Subscribe to our newsletter gives you exclusive access to our new item Launch!</p>
                   
                    <!-- FORM -->
                    <form action="assets/php/subscribe.php" method="post">
                        <input type="email" name="email" placeholder="* Enter your Email" class="email-in"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = '* Enter your Email'">
                        <input name = "type" value="launch" hidden><br>
                        <input type="submit" class="subscribe" value="Subscribe">
                    </form>
                    <!-- /FORM -->
                    
                
            </div>
            <!-- /CARD -->
            
            
        </div>
        <!-- /POPUP ( SUBSCRIBE ) -->
        <!-- JAVASCRIPTS -->
        <script type="text/javascript" src="assets/js/plugins.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>

        

    </body> 
    
    
</html>