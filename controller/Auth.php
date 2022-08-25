<?php
session_start();
require_once "Connection.php";

class Auth extends Connection{
    private $conn;
    public function __construct(){
        $this->conn = $this->connect();
    }

    public function signup($email,$fname,$lname,$phone,$password){
      try{
        $qry = "INSERT INTo users(email,first_name,last_name,phone,password) VALUES 
                ('$email','$fname','$lname','$phone','$password')";
        $res = $this->conn->prepare($qry);
        $res->execute();
        $sql = "UPDATE users SET full_name=concat(first_name,' ',last_name)";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $msg = "Created Account";
        return $msg;   
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }


    public function login($email,$password){
      try{
          $qry="select * from users";
          $res = $this->conn->prepare($qry);
          $res->execute();
          $data =$res->fetchAll();
          foreach($data as $d){
            $e = $d['email'];
            $p = $d['password'];
           
          }
          if($e == $email && $p == $password){
              $_SESSION['user'] = $email;
              header("location:index.php");
          }else{
              $msg = "User doesn't Exist";
              return $msg;
            }
          
         
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }


    public function logout(){
      try{
        session_destroy();
        header("location:index.php");
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

}