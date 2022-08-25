<?php

require_once "../controller/Connection.php";

class Orders extends Connection{
    private $conn;

    public function __construct(){
        $this->conn = $this->connect();
    }

    public function selectAllOrder(){
        $qry = "SELECT * FROM orders";
        $res = $this->conn->prepare($qry);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }

    public function selectAllOrderdetails(){
        $qry = "SELECT * FROM orderdetails";
        $res = $this->conn->prepare($qry);
        $res->execute();
        $data = $res->fetchAll();
        return $data;
    }
}
