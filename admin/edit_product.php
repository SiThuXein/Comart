<?php

require_once "controller/Admin.php";
require_once "controller/Update.php";

$pid = $_GET['pid'];

$admin = new Admin();
$product = $admin->selectAllProductsById($pid);
$prod = $admin->selectIdAndNameFromProduct();
$categ = $admin->selectIdAndNameFromCategory();

foreach($product as $d){
    $id = $d['id'];
    $name = $d['name'];
    $price = $d['price'];
    $image = $d['image'];
    $brand_id = $d['brand_id'];
    $category_id = $d['category_id'];

}

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $brand_id = $_POST['brand_id'];
    $category_id = $_POST['category_id'];



    $update = new Update();
    $update->updateProduct($id,$name,$price,$image,$brand_id,$category_id,$pid);
    header("location:product.php");

}

?>

<?php require_once "template/header.php" ?>


<div class="container mt-5" id="edit">
        <h2>EDIT</h2>
    <div class="row">
        <div class="col-md-8">
            <form action="" method="post" enctype="mutipart/form-data">
                <div class="form-group mt-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" class="form-control" name="id" value=<?= $id ?>>
                </div>

                <div class="form-group mt-3">
                    <label for="" class="form-label">NAME</label>
                    <input type="text" class="form-control" name="name" value="<?= $name ?>">
                </div>

                <div class="form-group mt-3">
                    <label for="" class="form-label">PRICE</label>
                    <input type="text" class="form-control" name="price" value=<?= $price ?>>
                </div>

                <div class="form-group mt-3">
                    <label for="" class="form-label">BRAND_ID</label>
                    <input type="text" class="form-control" name="brand_id" value=<?= $brand_id ?>>
                </div>

                <div class="form-group mt-3">
                    <label for="" class="form-label">CATEGORY_ID</label>
                    <input type="text" class="form-control" name="category_id" value=<?= $category_id ?>>
                </div>

                <div class="form-group mt-3">
                    <label for="" class="form-label">IMAGE</label>
                    <input type="file" class="form-control" name="image" value="<?= $image ?>">
                </div>

                <div class="form-group mt-5">
                    <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                </div>

            </form>
        </div>
        <div class="col-md-4">
        <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h4>BRANDS</h4>
                        <table >
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                            </tr>
                            <?php 
                                foreach($prod as $p){

                            ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td><?= $p['name'] ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                          
                        </table>
                    </div>
                    <div class="col-md-8">
                        <h4>CATEGORIES</h4>
                        <table >
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                </tr>
                                <?php 
                                    foreach($categ as $c){

                                ?>
                                <tr>
                                    <td><?= $c['id'] ?></td>
                                    <td><?= $c['name'] ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once "template/footer.php"  ?>