<?php
session_start();
require_once "controller/Submit.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $card = $_POST['card'];
    $card_no = $_POST['card_no'];

    // echo $_SESSION['user'];

    $submit = new Submit();
    $submit->insert($name,$phone,$address,$card,$card_no);
}