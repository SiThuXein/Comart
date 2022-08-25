<?php
    require_once "controller/Admin.php";
    require_once "controller/Form.php";


    $form = new Form();
    if(isset($_POST['submit'])){
        $input = $_POST["input"];
        $user = $form->searchUsers($input);
    }
    else{
        $admin = new Admin();
        $user = $admin->selectAllUsers();
    }
?>


<?php require_once "template/header.php"  ?>

<div class="container" id="user_c1">
    <div class="row">
        <div class="col-md-5">
            <h2><a href="user.php" > USERS [ <?= count($user) ?> ] </a></h2>
        </div>
        <div class="col-md-7">
            <form action="#" class="form-group" method="post">
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
                    <th>EMAIL</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>FULL NAME</th>
                    <th>PHONE</th>
                    <th>CREATED DATE</th>
                </tr>
                 <?php

                foreach($user as $u){
                    ?>
                    <tr>
                        <td><?= $u['id'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $u['first_name'] ?></td>
                        <td><?= $u['last_name'] ?></td>
                        <td><?= $u['full_name'] ?></td>
                        <td><?= $u['phone'] ?></td>
                        <td><?= $u['created_at'] ?></td>

                    </tr>
                    <?php
                        }

                    ?>
             
            </table>
        </div>
    </div>
</div>


<?php require_once "template/footer.php"   ?>