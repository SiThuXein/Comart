<?php

require_once "../controller/Connection.php";

class Create extends Connection{
    private $conn;
    public function __construct(){
        $this->conn = $this->connect();
        
    }

    public function createCategory($name,$image){
        $tmp_name = $image['tmp_name'];
        $img_name = $image['name'];
       
        move_uploaded_file($tmp_name,'../assets/images/'.$img_name);

        try{
            $qry = "INSERT INTO categories(name,image) VALUES('$name','$img_name')";
            $res = $this->conn->prepare($qry);
            $res->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }


    }

    public function createBrand($name,$image){
        $tmp_name = $image['tmp_name'];
        $img_name = $image['name'];
       
        move_uploaded_file($tmp_name,'../assets/images/'.$img_name);

        try{
            $qry = "INSERT INTO brands(name,brand_image) VALUES('$name','$img_name')";
            $res = $this->conn->prepare($qry);
            $res->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }


    }

    public function createProduct($name,$price,$image,$brand_id,$category_id){
        $tmp_name = $image['tmp_name'];
        $img_name = $image['name'];
       
        move_uploaded_file($tmp_name,'../assets/images/'.$img_name);

        try{
            $qry = "INSERT INTO product(name,price,image,brand_id,category_id) VALUES('$name','$price','$img_name','$brand_id','$category_id')";
            $res = $this->conn->prepare($qry);
            $res->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }


    }

}