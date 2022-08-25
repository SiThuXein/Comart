<?php
    session_start();
    require_once "controller/User.php";

    $user = new user();
    $res= $user->selectAllCategories();

    $id = $_GET['id'];
    $result = $user->selectAllProductsByBrand($id);

    $brand = $user->selectAllBrands();

?>

<?php require_once "template/header.php"  ?>

<div id="d1">
<div class="row">
        <div class="col">
                <div>
                    <h4>Brands</h4>
                </div>
                <hr style="color:#ffa500">
                <div>
                       
                    <?php 
                        foreach($brand as $b){
                    ?>
                        <a href="brand.php?id=<?php echo $b['id'] ?>"><?php echo $b['name']  ?></a><br><br>
                  
                    <?php
                        }
                    ?>

                </div>
        </div>
    </div>
</div>
<div class="container" id="d2">
    <div class="row">
        <?php
            foreach($result as $r){
        ?>
                <div class="col-md-2" id="col">
                    <div id="porduct">
                        <div id="img">
                            <img src="assets/images/<?php echo $r['image'] ?>" alt="" width="200px" height="150px">
                        </div>
                        <div id="name">
                            <a href="detail.php?did=<?php echo $r['id'] ?>"><h3><?php echo $r['name'] ?></h3></a>
                        </div>
                        <div id="button">
                            <span id="s1">$<?php echo $r['price'] ?></span>
                            <!-- <span id="s2">cccccc</span> -->
                            <a href="add-to-cart.php?bid=<?php echo $r['id'] ?>"><button>Add To Card</button></a>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
</div>


<?php require_once "template/footer.php"  ?>




