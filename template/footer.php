<div class="container-fluid" id="footer">
        <div class="row" id="row_1">
                    <div class="col-md-3 col-sm-6">
                        <div>
                            <h3>Get to know us</h3>
                            <a href=""><span>About Comart</span></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div>
                        <h3>Shop With Us</h3>
                        <?php
                            foreach($res as $r){
                                ?>
                                <a href="category.php?id=<?php echo $r['id']  ?>"><span><?php echo $r["name"] ?></span></a>
                        <?php   }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h3>Let Us help You</h3>
                        <a href=""><span>FAQs</span></a>
                        <a href=""><span>Help</span></a>
                        <a href=""><span>Contact Us</span></a>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div>
                            <h3>Social</h3>
                            <a href=""><img src="../user/assets/images/icon_facebook.png" alt="" width="50px" height="50px"></a>
                            <a href=""><img src="../user/assets/images/icon_twitter.png" alt="" width="50px" height="50px"></a>
                            <a href=""><img src="../user/assets/images/icon_ins.png" alt="" width="50px" height="50px"></a>

                        </div>
                    </div>
        </div>
        <hr style="background:rgb(129, 126, 126);width:100%;heigth:3px;margin-top:30px"> 
        <div class="row" id="row_2">
            <div class="col-md-12 col-sm-6">
                <h2><span>&copy;</span>2021 Cmart Online Copyright. All Rights Reserved.</h2>
                <h2>Terms & Conditions | Privacy Policy</h2>
            </div>
        </div>
    </div>

</div>      <!-- close tab for main class-->
 
</body>
</html>