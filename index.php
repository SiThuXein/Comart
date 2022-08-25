<?php
    session_start();
    require_once "controller/User.php";

    $user = new user();

    $data = $user->selectAllCategories();    // For container 1
    $res= $user->selectAllCategories();     //For nav dropdown & footer  
   
    // if(isset($_POST['name'])){
    //    $name = $_POST['name'];
    //    $search = $user->selectAllbyName($name);

    // }
    $brand = $user->selectAllBrands();
    $product = $user->limit();


?>


<?php  include "template/header.php" ?>


<!--  slider  -->

    <div class="container-fluid" id="slider">
       <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                    
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="assets/images/slide1.jpg" class="d-block w-100" alt="..." height="350px">
                        </div>
                        <div class="carousel-item">
                        <img src="assets/images/slide2.jpeg" class="d-block w-100" alt="..." height="350px">
                        </div>
                        <div class="carousel-item">
                        <img src="assets/images/slide3.jpg" class="d-block w-100" alt="..." height="350px">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


    <!--  slider  --> 




    <!--  container 1 --> 

    <div class="container-fluid" id="container_1">
        
        <div class="row" id="row_1">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>Featured Categories</h1>
            </div>
            <div class="col-md-2 col-sm-12"></div>
        </div>
       
        <div class="row" id="row_2">
                    <?php
                        foreach($data as $d){
                            ?>
                            <div class="col-md-2 col-sm-6">
                                <div id="col">
                                    <a href="category.php?id=<?php echo $d['id'] ?>"><img src="assets/images/<?php echo $d['image'] ?>" alt="" ></a>
                                    <a href="category.php?id=<?php echo $d['id'] ?>"><h3><?php echo $d['name'] ?></h3></a>
                                </div>
                            </div>
                        
                        <?php   }   ?>
                    
        </div>
    </div>

    <!--  container 1 --> 


    <!--  container 2  --> 


    <div class="container" id="container_2">
            <div class="row">
                <div class="col-md-12">
                    <h1>Brands</h1>
                </div>
            </div>
            <div class="row">
                <?php
              
                    foreach($brand as $b){
                        ?>
                         <div class="col-md-2 col-sm-6">
                             <div id="col">
                                <a href="brand.php?id=<?php echo $b['id'] ?>"><img src="assets/images/<?php echo $b["brand_image"] ?>" alt="" width="170px" height="80px"></a>
                             </div>
                        </div>
                 <?php   }
                ?>
               
            </div>
    </div>

    <!--  container 2  --> 
    <hr style="background:#ccc;height:3px">


 
    <!-- container 3 -->

    <div class="container" id="container_3">
        <div class="row">
            <div class="col-md-12">
                <h1>Products</h1>
            </div>
        </div>
        <div class="row">
            <?php  
                    foreach($product as $p){                           
                ?>

            <div class="col-md-2">
                <div id="porduct">
                    <div id="img">
                        <img src="assets/images/<?php  echo $p['image'] ?>" alt="" width="190px" height="150px">
                    </div>
                    <div id="name">
                        <a href="detail.php?did=<?php echo $p['id'] ?>"><h3><?php echo $p['name'] ?></h3></a>
                    </div>
                    <div id="button">
                        <span id="s1">$<?php echo $p['price'] ?></span>
                        <!-- <span id="s2">cccccc</span> -->
                        <a href="add-to-cart.php?id=<?php echo $p['id'] ?>"><button>Add To Card</button></a>
                    </div>
                </div>
            </div>
            <?php   
                 
                }
                   
            ?>
         
            <!-- <div class="col-md-2">
                <div id="product_view">
                    <a href=""><button>View More</button></a>
                </div>
            </div> -->
        </div>
    </div>

    <!-- container 3 -->

<?php  include "template/footer.php" ?>
