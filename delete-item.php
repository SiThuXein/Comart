<?php

session_start();
$sid = $_GET["sid"];
unset($_SESSION["cart"][$sid]);

header("location:cart.php");