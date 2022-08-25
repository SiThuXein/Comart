<?php
    session_start();
    require_once "controller/User.php";
    require_once "controller/Auth.php";

    $user = new user();
    $res= $user->selectAllCategories();

    $auth = new Auth();

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $msg = $auth->login($email,$password);
    }

?>

<?php require_once "template/header.php" ?>

<div class="container" id="login">
    <div>
        <?php 
            if($msg){
        ?>
            <p class="alert alert-warning"><?php echo $msg ?> </p>
        <?php }  ?>
   </div>
    <div class="row mt-5 mb-5">
        <div class="col-6">
            <form method="post">
                <h3>Login</h3>
                <label class="form-label mt-3">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Email address" required>

                <label class="form-label mt-3">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>

                <button type="submit" name="submit" class="btn btn-success mt-4">Login</button>
                <span id="fp"><a href="">Frogotten Password?</a></span>
            </form>
        </div>
        <div class="col-6">
            <img src="assets/images/login.png" alt="" width="500px" height="400px">
        </div>
    </div>
</div>



<?php require_once "template/footer.php" ?>
