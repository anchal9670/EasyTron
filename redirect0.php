<?php
session_start();
if($_SESSION["email"] != true){
    
    header("Location: login.php");
    exit;
}
if(empty($_SESSION['email'])):
    header('Location:login.php');
endif;
?>