<?php

session_start();
require_once "controller/Connection.php";

if(isset($_GET['cid'])){
    $id = $_GET["cid"];
    $_SESSION["cart"][$id]++;

    $con = new Connection;
    $conn = $con->connect();
    $qry = "SELECT * FROM product WHERE id='$id'";
    $res = $conn->prepare($qry);
    $res->execute();
    $data = $res->fetchAll();
    foreach($data as $d){
        $category_id = $d['category_id'];
    }
  
    header("location:category.php?id=$category_id");
}
    
else if(isset($_GET['bid'])){
    $id = $_GET["bid"];
    $_SESSION["cart"][$id]++;

    header("location:brand.php");
}
else{
    $id = $_GET["id"];
    $_SESSION["cart"][$id]++;

    header("location:product.php");
}


