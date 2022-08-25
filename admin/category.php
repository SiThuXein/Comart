<?php
    require_once "controller/Admin.php";
    require_once "controller/Form.php";

    $form = new Form();
    if(isset($_POST['submit'])){
        $input = $_POST["input"];
        $category = $form->searchCategories($input);
    }
    else{
        $admin = new Admin();
        $category = $admin->selectAllCategories();
    }
 
?>


<?php require_once "template/header.php"  ?>

<div class="container" id="category_c1">
    <div class="row">
        <div class="col-md-5">
            <h2>
                <a href="category.php" >CATEGORIES [ <?= count($category) ?> ]</a>
                <span><a href="create_category.php"><button class="btn-sm btn-success">NEW</button></a></span>
             </h2>
        </div>
        <div class="col-md-7">
            <form action="#" class="form-group" method="post">
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

                foreach($category as $c){
                    ?>
                    <tr>
                        <td><?= $c['id'] ?></td>
                        <td><?= $c['name'] ?></td>
                        <td>
                            <img src="../assets/images/<?= $c['image'] ?>" >
                        </td>
                        <td>
                            <a href="edit_category.php?cid=<?php echo $c['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="delete.php?cid=<?php echo $c['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
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