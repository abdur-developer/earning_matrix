<?php

if(isset($_REQUEST['grfd'])){
    //echo "ok";
    header("location: ../home/?q=lot");
}else{
    header("location: ../home/");
}


?>