<?php
    require_once "controller/Admin.php";
    require_once "controller/Form.php";

    $form = new Form();
    if(isset($_POST['submit'])){
        $input = $_POST["input"];
        $brand = $form->searchBrands($input);
    }
    else{
        $admin = new Admin();
        $brand = $admin->selectAllBrands();
    }

?>


<?php require_once "template/header.php"  ?>

<div class="container" id="category_c1">
    <div class="row">
        <div class="col-md-5">
            <h2>
                <a href="brand.php"> BRANDS [ <?= count($brand) ?> ] </a>
                <span><a href="create_brand.php"><button class="btn-sm btn-success">NEW</button></a></span>
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
<div class="container" id="category_c2">
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                </tr>
                 <?php

                foreach($brand as $b){
                    ?>
                    <tr>
                        <td><?= $b['id'] ?></td>
                        <td><?= $b['name'] ?></td>
                        <td><img src="../assets/images/<?= $b['brand_image'] ?>" ></td>
                        <td>
                        <a href="edit_brand.php?bid=<?php echo $b['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="delete.php?bid=<?php echo $b['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
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