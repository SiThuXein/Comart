<?php

require_once "controller/Auth.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $auth = new Auth();
    $auth->login($email,$password);
}

