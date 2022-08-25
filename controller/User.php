<?php

require_once "Connection.php";

class user extends Connection{
    private $con;
    public function __construct(){
        $this->con = $this->connect();
    }
    public function selectAllCategories(){
        try{
            $qry = "select * from categories";
            $result = $this->con->prepare($qry);
            $result->execute();
            $data = $result->fetchAll();
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function selectAllProducts(){
        try{
            $qry = "select * from product";
            $res = $this->con->prepare($qry);
            $res->execute();
            $data = $res->fetchAll();
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectAllbyName($name){
        try{
            // $n = $name;
            $qry = "select * from product where name like '$name%'";
            $res = $this->con->prepare($qry);
            // $res->bindparam(":name",$name);
            $res->execute();
            $data = $res->fetchAll();
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function selectAllBrands(){
        try{
            $qry = "select * from brands";
            $result = $this->con->prepare($qry);
            $result->execute();
            $data = $result->fetchAll();
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectAllProductsByCategory($id){
        try{
            $qry = "select * from product where category_id='$id'";
            $result = $this->con->prepare($qry);
            $result->execute();
            $data = $result->fetchAll();
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectAllProductsByBrand($id){
        try{
            $qry = "select * from product where brand_id='$id'";
            $result = $this->con->prepare($qry);
            $result->execute();
            $data = $result->fetchAll();
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectAllProductsById($id){
       try{
        $qry = "select * from product where id='$id'";
        $res = $this->con->prepare($qry);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
       }catch(PDOException $e){
           echo $e->getMessage();
       }
    }

    public function limit(){
        try{
         $qry = "select * from product limit 6";
         $res = $this->con->prepare($qry);
         $res->execute();
         $data = $res->fetchAll();
         return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
     }
}
