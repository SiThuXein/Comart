<?php
require_once "../controller/Connection.php";


class Admin extends Connection{
    private $conn;
    public function __construct(){
        $this->conn = $this->connect();
    }

    public function selectAllUsers(){
        $sql = "select * from users";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }

    public function selectAllCategories(){
        $sql = "select * from categories";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }

    public function selectAllBrands(){
        $qry = "select * from brands";
        $data = $this->conn->prepare($qry);
        $data->execute();
        $res = $data->fetchAll();
        return $res;
    }

    public function selectAllProducts(){
        $sql = "select * from product";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }

    public function selectIdAndNameFromProduct(){
        $sql = "select id,name from brands";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }

    public function selectIdAndNameFromCategory(){
        $sql = "select id,name from categories";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }

    public function selectAllCategoriesById($cid){
        $sql = "select * from categories where id='$cid'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data; 
    }

    public function selectAllBrandsById($bid){
        $sql = "select * from brands where id='$bid'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data; 
    }

    public function selectAllProductsById($pid){
        $sql = "select * from product where id='$pid'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $data = $res->fetchAll();
        return $data; 
    }


   
}