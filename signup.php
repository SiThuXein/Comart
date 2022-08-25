<?php
    session_start();
    require_once "controller/User.php";
    require_once "controller/Auth.php";

    $user = new user();
    $res= $user->selectAllCategories();

    $auth = new Auth();

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $msg = $auth->signup($email,$fname,$lname,$phone,$password);
       
    }

?>

<?php require_once "template/header.php" ?>



<div class="container " id="signup">
    <div>
        <?php 
            if($msg){
        ?>
            <p class="alert alert-info"><?php echo $msg ?></p>
        <?php
    
            header("location:login.php");
                } 
    
        ?>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-6">
            <form action="#" method="post">
                <h3>Create Account</h3>
                
                <label class="form-label mt-3">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                
                <label class="form-label mt-3">First Name</label>
                <input type="text" name="fname"class="form-control" placeholder="First Name" required>

                <label class="form-label mt-3">Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="Last Name" required>

                <label class="form-label mt-3 ">Phone Number</label>
                <input type="number" name="phone" class="form-control" placeholder="Phone Number" required >

                <label class="form-label mt-3">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>

                <button type="submit" name="submit" class="btn btn-success mt-4">Create Account</button>
                <a href="login.php"><button type="button" class="btn btn-success mt-4">Login</button></a>

            </form>
        </div>
        <div class="col-1"></div>
        <div class="col-4">
            <img src="assets/images/signup.png" alt="" width="500px" height="600px">
        </div>
    </div>
</div>



<?php require_once "template/footer.php" ?>
