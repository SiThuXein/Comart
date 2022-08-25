<?php

require_once "../controller/Connection.php";


class Update extends Connection{
    private $conn;
    public function __construct(){
        $this->conn = $this->connect();
    }

    public function updateCategory($id,$name,$image,$cid){
        $qry = "UPDATE categories SET id='$id',name='$name',image='$image' WHERE id='$cid'";
        $res = $this->conn->prepare($qry);
        $res->execute();

    }

    public function updateBrand($id,$name,$image,$bid){
        $tmp_name = $image['tmp_name'];
        $img_name = $image['name'];
        echo $tmp_name,$img_name;
        // move_uploaded_file($tmp_name,'../assets/images/'.$img_name);

        // $qry = "UPDATE brands SET id='$id',name='$name',brand_image='$img_name' WHERE id='$bid'";
        // $res = $this->conn->prepare($qry);
        // $res->execute();

    }

    public function updateProduct($id,$name,$price,$image,$brand_id,$category_id,$pid){
        $qry = "UPDATE product SET id='$id',name='$name',price='$price',image='$image',brand_id='$brand_id',
                category_id='$category_id' WHERE id='$pid'";
        $res = $this->conn->prepare($qry);
        $res->execute();

    }

}