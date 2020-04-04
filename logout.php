<?php
ob_start();
session_start();
 
if(isset($_SESSION['email'])) {
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION['fullname']);
    unset($_SESSION['email']);
   
    header("Location: login.php");
}
//else {
//    header("Location: index.php");
//}
    
