<?php

require_once "controller/Create.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $image = $_FILES['image'];

    $create =  new Create();
    $create->createCategory($name,$image);
    header("location:category.php");
}

?>

<?php require_once "template/header.php"  ?>


<div class="container mt-5" id="create_category">
    <h2>INSERT CATEGORY</h2>
    <div class="row">
        <div class="col">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <label for="" class="form-label">NAME</label>
                    <input type="text" class="form-control" name="name">
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
    </div>
</div>


<?php require_once "template/footer.php" ?>