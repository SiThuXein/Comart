<?php

require_once "controller/Create.php";
require_once "controller/Admin.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand_id = $_POST['brand_id'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['image'];

    $create =  new Create();
    $create->createProduct($name,$price,$image,$brand_id,$category_id);
    header("location:product.php");
}

 $admin = new Admin();
 $product = $admin->selectIdAndNameFromProduct();
 $category = $admin->selectIdAndNameFromCategory();



?>

<?php require_once "template/header.php"  ?>


<div class="container mt-5" id="create_product">
    <h2>INSERT PRODUCT</h2>
    <div class="row">
        <div class="col-md-8">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <label for="" class="form-label">NAME</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label">PRICE</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label">BRAND_ID</label>
                    <input type="text" class="form-control" name="brand_id">
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label">CATEGORY_ID</label>
                    <input type="text" class="form-control" name="category_id">
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label">IMAGE</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="from-group mt-5">
                    <button type="submit" class="btn btn-primary" name="submit">CREATE</button>
                </div>
            </form>
        </div>

        <div class="col-md-4" id="col2">
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
                                foreach($product as $p){

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
                                    foreach($category as $c){

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
                <!-- <div class="row">
                    <div class="col">
                    <table>
                            <tr>
                                <th>ID</th>
                                <th>Brand</th>
                            </tr>
                        </table>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>


<?php require_once "template/footer.php" ?>