<?php
    session_start();
    require_once "controller/User.php";
    // $user = new user();

    $user = new user();
    $res= $user->selectAllCategories();   // For nav 

?>

<?php require_once "template/header.php" ?>

<div class="container mt-5 mb-5" id="cart">
    <div class="row">
        <div class="col">
            <h2>Cart ( <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ; ?> Item )</h2>
        </div>
    </div>
    <?php 
        if(isset($_SESSION['cart'])){
    ?>

    <div class="row">
        <div class="col">
            <table>
                <tr id="row_1">
                    <th>No</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>

                </tr>
                <?php 
                $no = 1;
                $total=0;
                    foreach($_SESSION["cart"] as $key=>$qty){
                        $data = $user->selectAllProductsById($key);
                        foreach($data as $d){
                                $title = $d['name'];
                                $image = $d['image'];
                                $price = $d['price'];
                                $amount = $price*$qty;
                                $total+=$amount;
                                $No = $no++;
                        }
                 
                ?>
                <tr id="row_2">
                    <td><?php echo $No ?></td>
                    <td><img src="assets/images/<?php echo $image ?>" alt=""></td>
                    <td><?php echo $title ?></td>
                    <td>
                        <a href="decrease.php?id=<?php echo $key ?>" class="btn btn-sm btn-secondary" id="decrease">-</a>
                        <span><?php echo $qty ?></span>
                        <a href="increase.php?id=<?php echo $key ?>" class="btn btn-sm btn-secondary" id="increase">+</a>
                    </td>
                    <td>$<?php echo $price ?> </td> 
                    <td>$<?php echo $amount ?> <a href="delete-item.php?sid=<?php echo $key ?>"><span>&times;</span></a></td>
                </tr>
                
               
                <?php } ?>
          
              
            </table>
            
            <div id="clear_cart">
                <a href="clear-cart.php"><button>Clear  Cart</button></a>
            </div>
            <div id="checkout">
                <a href="checkuser.php"><button>Payment</button></a>
            </div>
            <div id="cart_total">
                <p>Total <span>$<?php echo $total ?></span></p>
            </div>
            
        </div>
    </div>

    <?php    }else{
    ?>
    <h3 class="no_cart">Your shopping cart contains : 0 </h3>
   <?php }  ?>

 
</div> 

 
<?php require_once "template/footer.php" ?>

