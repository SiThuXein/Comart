<?php
    session_start();
    require_once "controller/User.php";

    $user = new user();
    $res= $user->selectAllCategories();  // For nav dropdown & footer

    if(isset($_POST['name'])){
        $name = $_POST["name"];
        $data = $user->selectAllbyName($name);
    }
    else{
        $data = $user->selectAllProducts();
    }
  
?>

<?php require_once "template/header.php"  ?>

<div class="container mt-5 mb-5" id="d3">
    <h2>Products</h2>
    <div class="row">
       <?php 
            foreach($data as $d){
        ?>
        <div class="col-md-2" id="col">
            <div id="porduct">
                <div id="img">
                    <img src="assets/images/<?php echo $d['image'] ?>" alt="" width="200px" height="150px">
                </div>
                <div id="name">
                    <a href=""><h3><?php echo $d['name'] ?></h3></a>
                </div>
                <div id="button">
                    <span id="s1">$<?php echo $d['price'] ?></span>
                    <!-- <span id="s2">cccccc</span> -->
                    <a href="add-to-cart.php?id=<?php echo $d['id'] ?>"><button>Add To Card</button></a>
                </div>
            </div>
        </div>
        <?php
            }
       ?>

    </div>
</div>


<?php require_once "template/footer.php"  ?>




