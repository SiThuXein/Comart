<?php
    require_once "controller/Form.php";
    require_once "controller/Orders.php";

    $form = new Form();
    if(isset($_POST['submit'])){
        $input = $_POST["input"];
        $data = $form->searchOrders($input);
    }
    else{
        $order = new Orders();
        $data = $order->selectAllOrder();
    }

?>


<?php require_once "template/header.php"  ?>

<div class="container" id="user_c1">
    <div class="row">
        <div class="col-md-5">
            <h2>
                <a href="order.php" >ORDERS [ <?= count($data) ?> ] </a>
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
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>CARD TYPE</th>
                    <th>CARD NUMBER</th>
                    <th>USER ID</th>
                    <th>DATE</th>
                </tr>
                 <?php

                foreach($data as $d){
                    ?>
                    <tr>
                        <td><?= $d['id'] ?></td>
                        <td><?= $d['name'] ?></td>
                        <td>$<?= $d['email'] ?></td>
                        <td><?= $d['phone'] ?></td>
                        <td><?= $d['address'] ?></td>
                        <td><?= $d['card'] ?></td>
                        <td><?= $d['card_number'] ?></td>
                        <td><?= $d['user_id'] ?></td>
                        <td><?= $d['date'] ?></td>
                        <td id="option">
                            <!-- <a href="edit_product.php?pid=<?php echo $p['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a> -->
                            <a href="delete.php?oid=<?php echo $d['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
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