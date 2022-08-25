<?php

    session_start();
    require_once "controller/User.php";
    require_once "controller/Submit.php";

    $user = new user();
    $res= $user->selectAllCategories();  // For nav dropdown & footer



?>

<?php require_once "template/header.php" ?>

<div class="container mt-5 mb-5" id="success">
    <div class="row" id="row_1">
        <div class="col">
            <h2><b>Dear Customers,</b></h2>
            <h4>You successfully submitted the following products.Thanks for your shopping here!</h4>
        </div>
    </div>
    <div class="row mt-5" id="row_2">
        <div class="col-md-4">
            <div>
                <h4><b>Customer's Information</b></h4>
            </div>
        <?php 
           $submit = new Submit();
           $data = $submit->customerInfo();
           foreach($data as $d){
               $name = $d['name'];
               $phone = $d['phone'];
               $address = $d['address'];
           }
        ?>

            <div id="d2">                   
                <h5>Name : <b><?php echo $name ?></b></h5>
                <h5>Phone : <b><?php echo $phone ?></b></h5>
                <h5>Address : <b><?php echo $address ?></b></h5>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-striped">
                <tr>
                    <th colspan="4">Order Information</th>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Qty</th>
                    <th>Unit Price</th>
                </tr>
                <?php 
                    $total = 0;
                    $order = $submit->orderInfo();
                    foreach($order as $r){
                        $name = $r['product_name'];
                        $qty = $r['quantity'];
                        $price = $r['price'];
                        $amount = $r['amount'];
                        $total+=$amount;
                ?>
                <tr>
                    <td><?php echo $name ?></td>
                    <td>$<?php echo $price ?></td>
                    <td><?php echo $qty ?></td>
                    <td>$<?php echo $amount ?></td>
                </tr>
                <?php } ?>
            </table>
            <div id="total">
                <h5><b>TOTAL : $<?php echo $total ?></b></h5>
            </div>
        </div>
    </div>
</div>

<?php require_once "template/footer.php" ?>