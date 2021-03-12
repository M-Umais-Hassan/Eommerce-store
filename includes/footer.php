<div id="footer"> <!--footer Begin-->
    <div class="container-fluid"> <!--container Begin-->
        <div class="row"> <!--row Begin-->
            <div class="col-sm-6 col-md-3"> <!--col-sm-6 col-md-3 Begin-->

                <h4>Pages</h4>

                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact US</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                </ul>

                <hr>

                <h4>User Section</h4>

                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div> <!--col-sm-6 col-md-3 Finish-->

            <div class="col-sm-6 col-md-3"> <!--col-sm-6 col-md-3 Start-->

                <h4>Top Products Categories</h4>

                <ul>
                    <li>
                        <?php 
                            product_categories(); 
                        ?>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg">

            </div> <!--col-sm-6 col-md-3 Finish-->

            <div class="col-sm-6 col-md-3"> <!--col-sm-6 col-md-3 Start-->

                <h4>Find Us:</h4>

                <p>

                    <strong>Umais Store</strong>
                    <br>Umais.com
                    <br>Umais.com
                    <br>0300-0000000
                    <br>abc@gmail.com 
                    <br><strong>Umais</strong>

                </p>

                <a href="contact.php">Check our contact page</a>

                <hr class="hidden-md hidden-lg">

            </div> <!--col-sm-6 col-md-3 Finish-->

            <div class="col-sm-6 col-md-3"> <!--col-sm-6 col-md-3 Start-->

                <h4>Get the news</h4>

                <p>

                    Don't miss our latest uploaded products

                </p>

                <form class="form-inline">
                            
                    <div class="input-group"> <!--input-group begin-->
                            
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                        <button><i class="fa fa-search"></i></button>    
                        
                    </div> <!--input-group finish-->
                        
                </form>

                <hr>

                <h4>Keep In Touch</h4>

                <p class="social">
                    <a href="https://www.facebook.com" class="fa fa-facebook"></a>
                    <a href="https://www.twitter.com" class="fa fa-twitter"></a>
                    <a href="https://www.instagram.com" class="fa fa-instagram"></a>
                    <a href="https://www.google.com" class="fa fa-google-plus"></a>
                    <a href="https://www.youtube.com" class="fa fa-youtube"></a>
                </p>
             
            </div> <!--col-sm-6 col-md-3 Finish-->

        </div> <!--row Finish-->
    </div> <!--container Finish-->
</div> <!--footer Finish-->

<div id="copyright"> <!--copyright Begin-->
    <div class="container"> <!--container Begin-->
        <div class="col-md-6"> <!--col-md-6 Begin-->

            <p class="pull-left">&copy; 2020 Muhammad Umais Hassan</p>

        </div> <!--col-md-6 Finish-->

        <div class="col-md-6"> <!--col-md-6 Begin-->

            <p class="pull-right">Theme by <a href="#">Umais Hassan</a></p>

        </div> <!--col-md-6 Finish-->
    </div> <!--container Finish-->
</div> <!--copyright Finish-->