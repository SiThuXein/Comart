<?php
session_start();
require_once "controller/Connection.php";
require_once "controller/User.php";

class Submit extends Connection{
    private $conn;

    public function __construct(){
        $this->conn = $this->connect();
    }

    public function insert($name,$phone,$address,$card,$card_no){
        try{
                //selecting from users table By email to get user ID

            $email = $_SESSION['user'];
            $sql = "SELECT * from users WHERE email='$email'";
            $res = $this->conn->prepare($sql);
            $res->execute();
            $data = $res->fetchAll();
            foreach($data as $d){
                $user_id = $d['id'];
                // echo $user_id;
            }
                    //inserting to orders table

            $qry = "INSERT INTo orders(name,email,phone,address,card,card_number,user_id,date)
                    VALUES('$name','$email','$phone','$address','$card','$card_no','$user_id',now())";
            $res = $this->conn->prepare($qry);
            $res->execute();

                //inserting ot orderdetais table
                
            $order_id = $this->conn->lastInsertId();
            
            $user = new User();
            foreach($_SESSION['cart'] as $key=>$qty){
                $product = $user->selectAllProductsById($key);
                foreach($product as $p){
                    $prod_name = $p['name'];
                    $price = $p['price'];
                    $amount = $price*$qty;
    
                }
                    $qry = "INSERT INTO orderdetails(product_name,quantity,price,amount,order_id)
                            VALUES('$prod_name','$qty','$price','$amount','$order_id')";
                    $res = $this->conn->prepare($qry);
                    $res->execute();
                    $_SESSION['orderid'] = $order_id;
                    unset($_SESSION['cart']);
            }
    
    
            header("location:success.php");
            

        
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function customerInfo(){
        try{
            $orderid = $_SESSION['orderid'];
            $qry = "SELECT * FROM orders WHERE id='$orderid'";
            $res = $this->conn->prepare($qry);
            $res->execute();
            $data = $res->fetchAll();
         
            return $data;


        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function orderInfo(){
        try{
            $orderid = $_SESSION['orderid'];
            $qry = "SELECT * FROM orderdetails WHERE order_id='$orderid'";
            $res = $this->conn->prepare($qry);
            $res->execute();
            $order = $res->fetchAll();
         
            return $order;


        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}