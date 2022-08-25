<?php
session_start();
require_once "../controller/Connection.php";

class Auth extends Connection{
    private $conn;
    public function __construct(){
        $this->conn = $this->connect();
    }

    public function login($email,$password){
            try{
                $qry = "SELECT * FROM admin";
                $res = $this->conn->prepare($qry);
                $res->execute();
                $data = $res->fetchAll();
                foreach($data as $d){
                    if($d['email'] == $email && $d['password'] == $password){
                        $_SESSION['admin'] = $email;
                        header("location:home.php");
                    }else{
                        $msg = "invalid email or password";
                        $_SESSION['error'] = $msg;
                        header("location:index.php");
                    }
                }
          
              
            }catch(PDOException $e){
                echo $e->getMessage();
            }

        }
}