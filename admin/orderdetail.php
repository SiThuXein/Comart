<?php
    require_once "controller/Form.php";
    require_once "controller/Orders.php";

    $form = new Form();
    if(isset($_POST['submit'])){
        $input = $_POST["input"];
        $data = $form->searchOrderdetails($input);
    }
    else{
        $order = new Orders();
        $data = $order->selectAllOrderdetails();
    }

?>


<?php require_once "template/header.php"  ?>

<div class="container" id="user_c1">
    <div class="row">
        <div class="col-md-5">
            <h2>
                <a href="orderdetail.php" >ORDER DETAILS[ <?= count($data) ?> ] </a>
            </h2>
        </div>
        <div class="col-md-7">
            <form action="" class="form-group" method="post">
                <input type="search" class="form-control" name="input">
                <button type="submit" class="btn btn-primary" name="submit">SEARCH</button>
            </form>
        </div>
    </div>
</div>

<div class="container" id="user_c2">
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <th>ID</th>
                    <th>PRODUCT NAME</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                    <th>AMOUNT</th>
                    <th>ORDER ID</th>
                    <th>DATE</th>
                </tr>
                 <?php

                foreach($data as $d){
                    ?>
                    <tr>
                        <td><?= $d['id'] ?></td>
                        <td><?= $d['product_name'] ?></td>
                        <td><?= $d['quantity'] ?></td>
                        <td>$<?= $d['price'] ?></td>
                        <td>$<?= $d['amount'] ?></td>
                        <td><?= $d['order_id'] ?></td>
                        <td><?= $d['created_at'] ?></td>
                        <td id="option">
                            <a href="delete.php?odid=<?php echo $d['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
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