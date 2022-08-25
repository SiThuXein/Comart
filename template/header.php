
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>



<div class="container-fluid" id="nav">
            <div class="row">
                <div class="col-md-1" id="col1">
                    <a href="index.php">
                        <img src="../user/assets/images/logo.png" alt="" width="40px" height="40px">
                        <h1>omart</h1>
                    </a>
                </div>
                <div class="col-md-1" id="col2">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" id="dropdownMenu">Categories</button>
                        <ul class="dropdown-menu" aria-lablledby="dropdownMenu">
                           <?php
                                foreach($res as $r){
                                    ?>
                                        <li><a href="category.php?id=<?php echo $r['id'] ?>"><?php echo $r["name"] ?></a></li>
                               
                            <?php    }     ?>
                         </ul>
                    </div>
                </div>
                <div class="col-md-8" id="col3">
                    <form action="product.php" method="post">
                       <div>
                            <input type="text" name="name" class="form-control"  placeholder="Search" autocomplete="off">
                        </div>
                        <!-- <div>
                            <button type="submit" class="fa fa-search"></button>
                        </div> -->
                    </form>
                </div>
                <div class="col-md-1" id="col4">
                    <?php
                        if($_SESSION['user']){
                    ?>
                            <a href="logout.php">Logout</a>
                     <?php   }else{   ?>
                            <a href="login.php">Login</a><span>|</span>
                            <a href="signup.php">Sign Up</a>
                    <?php    
                        }
                    ?>
                </div>
                <div class="col-md-1" id="col5">
                    <div>
                    <a href="cart.php"><i class="fa fa-shopping-cart"></i><span>Cart[ <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ; ?>] </span></a>
                    </div>
                </div>
            </div>
</div>

<div class="main">