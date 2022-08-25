<?php

require_once "controller/Remove.php";

$cid = $_GET['cid'];
$bid = $_GET['bid'];
$pid = $_GET['pid'];
$oid = $_GET['oid'];
$odid = $_GET['odid'];


$remove = new Remove();
if(isset($cid)){
    $remove->deleteCategory($cid);
    header("location:category.php");
}
else if(isset($bid)){
    $remove->deleteBrand($bid);
    header("location:brand.php");
}
else if(isset($pid)){
    $remove->deleteProduct($pid);
    header("location:product.php");
}
else if(isset($oid)){
    $remove->deleteOrder($oid);
    header("location:order.php");
}
else if(isset($odid)){
    $remove->deleteOrderdetail($odid);
    header("location:orderdetail.php");
}


