<?php

require_once "../controller/Connection.php";

class Remove extends Connection{
    private $conn;
    public function __construct(){
        $this->conn = $this->connect();
    }

    public function deleteCategory($cid){
        $qry = "delete from categories where id='$cid'";
        $res = $this->conn->prepare($qry);
        $res->execute();
        // $msg = "Deleted";
        // return $msg;
    }

    public function deleteProduct($pid){
        $qry = "delete from product where id='$pid'";
        $res = $this->conn->prepare($qry);
        $res->execute();
    }

    public function deleteBrand($bid){
        $qry = "delete from brands where id='$bid'";
        $res = $this->conn->prepare($qry);
        $res->execute();
    }

    public function deleteOrder($oid){
        $qry = "delete from orders where id='$oid'";
        $res = $this->conn->prepare($qry);
        $res->execute();
    }

    public function deleteOrderdetail($odid){
        $qry = "delete from orderdetails where id='$odid'";
        $res = $this->conn->prepare($qry);
        $res->execute();
    }
}