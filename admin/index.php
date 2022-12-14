<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comart.Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container" id="index">
        <div class="row">
            <div class="col">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <center>
                            <img src="assets/images/user-login.jpg" alt="">
                        </center>
                    </div>
                    <div>
                        <?php 
                            session_start();
                            if(isset($_SESSION['error'])){
                                ?>
                                <p class="alert alert-warning"><?php echo $_SESSION['error'] ?></p>
                           <?php  }  ?>
                        
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="" class="form-label">EMAIL</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="" class="form-label">PASSWORD</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group mt-5 mb-3">
                        <input type="submit" name="submit" value="LOGIN" class="btn btn-success">
                    </div>
                </form>
             
            </div>
        </div>
    </div>
</body>
</html>