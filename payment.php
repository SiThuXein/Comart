<?php
    session_start();
    require_once "controller/User.php";
    // $user = new user();

    $user = new user();
    $res= $user->selectAllCategories();   // For nav 

?>

<?php require_once "template/header.php" ?>

<div class="container mt-5 mb-5" id="payment">
    <div class="row">
        <div class="col">
            <h2>Add Payment</h2>
            <form action="submit.php" method="post">
                <div class="form-group mt-5">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label">Card</label>
                    <select name="card" id="">
                        <option value="visa">Visa</option>
                        <option value="master">Master</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label">Card Number</label>
                    <input type="text" name="card_no" class="form-control">
                </div>
                <div class="form-group mt-5">
                    <button type="submit" name="submit" class="btn btn-success">Order Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php  require_once "template/footer.php" ?>