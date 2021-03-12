<?php
    include "logic/functions/functions.php";
    include "logic/connection.php";
?>

<!DOCTYPE html>
<html>

    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css?v=<?php echo time();?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <title>MY_WEBSITE</title>
    </head> 

    <body> 

    <!----------top nav----------->
      
        <div class="header">
                    
            <?php
                include "includes/header.php";
            ?>

        </div>
    
        <!---------Nav Bar--------->

        <div class="container-fluid" id="nav"> <!--container nav begin-->

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12"> <!--col-sm-12 col-md-12 col-lg-12 col-xl-12 begin-->

                <nav class="navbar navbar-expand-lg navbar-light bg-light"> <!--navbar navbar-expand-lg navbar-light bg-light begin-->

                    <a class="navbar-brand" href="index.php">
                        <img src="admin_area/Logo/Logo.png" alt="Logo Image">
                    </a>
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!--collapse navbar-collapse begin-->
                        
                        <ul class="navbar-nav mr-auto">
                           
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="shop.php">Shop</a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <?php 
                                    if(isset($_SESSION['email'])){
                                        echo"
                                        <a class='nav-link' href='my_account.php'>
                                            My Account
                                        </a>
                                        ";
                                    }
                                    else{
                                        echo"
                                        <a class='nav-link' href='login.php'>
                                            My Account
                                        </a>
                                        ";
                                    }
                                ?>
                            </li>
                            
                            <li class="nav-item active">
                                <a class="nav-link" href="contact.php">Contact US</a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="cart.php" class="nav-link">
                                <span>Shopping Cart</span>
                                    <span class="badge"><?php product_count(); ?></span>
                                </a>
                            </li>
                        
                        </ul>
                        
                        <form class="form-inline">
                            
                            <div class="input-group"> <!--input-group begin-->

                                <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>    
                        
                            </div> <!--input-group finish-->
                        
                        </form>

                    </div> <!--collapse navbar-collapse finish-->

                </nav> <!--navbar navbar-expand-lg navbar-light bg-light finish-->
             
            </div> <!--col-sm-12 col-md-12 col-lg-12 col-xl-12 finish-->

        </div> <!--nav finish-->

        <!---------Contact Form--------->

        <div class="container">
        
            <form action="contact.php" class="contact" method="post">

                <div class="form-group contact-form">
                    <label>Name </label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group contact-form">
                    <label>Email </label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group contact-form">
                    <label>Subject </label>
                    <input type="text" name="subject" required>
                </div>

                <div class="form-group contact-form">
                    <label>Message </label>
                    <textarea type="text" name="msg" required></textarea>
                </div>

                <div align="center" class="form-group contact-form">
                    <button type="submit" name="submit" class="btn btn-lg btn-primary">
                        <i class="fa fa-send"></i> Send
                    </button>
                </div>
                
            </form>

        </div>

        <!----------Footer------------>
      
        <div class="footer">
                    
            <?php
                include "includes/footer.php";
            ?>

        </div>

    </body> 

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>

<?php

    if(isset($_POST['submit'])){
        
        $name = $_POST['name'];
        $from = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];
        $to = "umaishassan66u@gmail.com";

        mail($to, $name, $subject, $msg, $from);

        $to1 = $_POST['email'];
        $subject1 = "MyCart Team";
        $msg1 = "Dear Customer! thankyou for contacting us, our team will contact you soon";
        $from1 = "umaishassan66u@gmail.com";

        mail($to1, $subject1, $msg1, $from1);

        echo"SEND";

    }

?>