<?php
    session_start();
    require_once "controller/User.php";

    $user = new user();
    $res= $user->selectAllCategories();

   $did =  $_GET['did'];
   $all = $user->selectAllProductsById($did);

?>


<?php require_once "template/header.php" ?>


<div class="container">
    <div class="row mt-5 mb-5" id="detail">
      <?php
        foreach($all as $a){
     ?>
        <div class="col-md-4">
            <div id="D1">
                <img src="assets/images/<?php echo $a['image'] ?>" alt="" width="400" height="300">
            </div>
        </div>
        <div class="col-md-8">
                <div id="D2">
                    <p><?php echo $a['name'] ?></p>
                    <h3>$<?php echo $a['price'] ?></h3>
                    <a href="add-to-cart.php?id=<?php echo $a['id'] ?>"><button>Add To Card</button></a>
                </div>
        </div>
    <?php
         }
      ?>
    </div>
</div>


<?php require_once "template/footer.php" ?>