<?php 

session_start();
$id = $_GET['id'];
foreach($_SESSION['cart'] as $sid=>$qty){
    if($id == $sid){
        if($qty == 1){
            unset($_SESSION['cart'][$id]);
        }else{
            $drty = $qty-1;
            $_SESSION['cart'][$id] = $drty;
        }
    }
}

header("location:cart.php");