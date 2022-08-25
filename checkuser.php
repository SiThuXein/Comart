<?php

session_start();
if(isset($_SESSION['user']) && isset($_SESSION['cart'])){
    header("location:payment.php");
}else if(isset($_SESSION['user']) && !isset($_SESSION['cart'])){
    header("location:cart.php");
}else{
    header("location:signup.php");
}