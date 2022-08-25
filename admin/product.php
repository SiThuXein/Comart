<?php
    require_once "controller/Admin.php";
    require_once "controller/Form.php";

    $form = new Form();
    if(isset($_POST['submit'])){
        $input = $_POST["input"];
        $product = $form->searchProducts($input);
    }
    else{
        $admin = new Admin();
        $product = $admin->selectAllProducts();
    }

?>


<?php require_once "template/header.php"  ?>

<div class="container" id="user_c1">
    <div class="row">
        <div class="col-md-5">
            <h2>
                <a href="product.php" >PRODUCTS [ <?= count($product) ?> ] </a>
                <span><a href="create_product.php"><button class="btn-sm btn-success">NEW</button></a></span>
            </h2>
        </div>
        <div class="col-md-7">
            <form action="" class="form-group" method="post">
                <input type="search" class="form-control" name="input">
                <button type="submit" class="btn btn-primary" name="submit">SEARCH</button>
            </form>
        </div>
    </div>
</div>

<div class="container" id="user_c2">
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>BRAND ID</th>
                    <th>CATEGORY ID</th>
                    <th>IMAGE</th>
                </tr>
                 <?php

                foreach($product as $p){
                    ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= $p['name'] ?></td>
                        <td>$<?= $p['price'] ?></td>
                        <td><?= $p['brand_id'] ?></td>
                        <td><?= $p['category_id'] ?></td>
                        <td>
                            <img src="../assets/images/<?= $p['image'] ?>" >
                        </td>
                        <td id="option">
                            <a href="edit_product.php?pid=<?php echo $p['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="delete.php?pid=<?php echo $p['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                        </td>

                    </tr>
                    <?php
                        }

                    ?>
             
            </table>
        </div>
    </div>
</div>


<?php require_once "template/footer.php"   ?>