<?php

require_once "controller/Admin.php";
require_once "controller/Update.php";

$cid = $_GET['cid'];

$admin = new Admin();
$category = $admin->selectAllCategoriesById($cid);

foreach($category as $c){
    $id = $c['id'];
    $name = $c['name'];
    $image = $c['image'];

}

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_POST['image'];


    $update = new Update();
    $update->updateCategory($id,$name,$image,$cid);
    header("location:category.php");

}


?>

<?php require_once "template/header.php" ?>


<div class="container mt-5" id="edit">
        <h2>EDIT</h2>
    <div class="row">
        <div class="col">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" class="form-control" name="id" value=<?= $id  ?>>
                </div>

                <div class="form-group mt-3">
                    <label for="" class="form-label">NAME</label>
                    <input type="text" class="form-control" name="name" value="<?= $name ?>" >
                </div>

                <div class="form-group mt-3">
                    <label for="" class="form-label">IMAGE</label>
                    <input type="file" class="form-control" name="image" value="<?= $image ?>" >
                </div>

                <div class="form-group mt-5">
                    <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                </div>

            </form>
        </div>
    </div>
</div>


<?php require_once "template/footer.php"  ?>