<?php
require_once "../controller/Connection.php";

class Form extends Connection{
    private $conn;
    public function __construct(){
        $this->conn = $this->connect();
        
    }

    public function searchUsers($name){
        $sql = "SELECT * from users where full_name like '$name%'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }
    
    public function searchCategories($name){
        $sql = "SELECT * from categories WHERE name like '$name%'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }

    public function searchProducts($name){
        $sql = "SELECT * from product WHERE name like '$name%'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }


    public function searchBrands($name){
        $sql = "SELECT * from brands WHERE name like '$name%'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }

    public function searchOrders($name){
        $sql = "SELECT * from orders WHERE name like '$name%'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }

    public function searchOrderdetails($name){
        $sql = "SELECT * from orderdetails WHERE product_name like '$name%'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }
}