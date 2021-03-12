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
                           
                            <li class="nav-item active">
                                <a class="nav-link active" href="index.php">Home</a>
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
                            
                            <li class="nav-item">
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

        <!---------------------Slider----------------------->

        <div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
            
            <div class='carousel-inner'>
                   
            <?php
                $query="select * from slider";
                $result=mysqli_query($conn, $query);
                $row=mysqli_fetch_array($result);
                $img = $row['slide_img'];

                    echo"
                    <div class='carousel-item active'>
                        <img height='700px' class='d-block w-100' src='admin_area/slider_images/$img' alt='First slide'>
                    </div>
                    ";

                while($row=mysqli_fetch_array($result)){
                    $img = $row['slide_img'];
                    echo"
                    <div class='carousel-item'>
                        <img height='700px' class='d-block w-100' src='admin_area/slider_images/$img' alt='First slide'>
                    </div>
                    ";
                }
            ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-------Advantages-------->

        <section class="website-features">
            
            <div class="container text-center"> <!--container begin-->

                <div class="row"> <!--row begin-->

                    <div class="col-md-3 feature-box"> <!--col-md-3 feature-box begin-->

                        <img src="admin_area/Advantages Images/featured1.jpg" alt="100% Original">

                        <div class="featured-text"> <!--featured-text begin-->

                            <p><b>100% original Products</b> are available at company</p>

                        </div> <!--featured-text finish-->

                    </div> <!--col-md-3 feature-box finish-->

                    <div class="col-md-3 feature-box"> <!--col-md-3 feature-box begin-->
                    
                        <img src="admin_area/Advantages Images/featured2.png" alt="Returning">

                        <div class="featured-text"> <!--featured-text begin-->

                            <p><b>Return within 30 days</b> after recieving your product</p>

                        </div> <!--featured-text finish-->

                    </div> <!--col-md-3 feature-box finish-->

                    <div class="col-md-3 feature-box"> <!--col-md-3 feature-box begin-->

                        <img src="admin_area/Advantages Images/featured3.jpg" alt="Free delievery">

                        <div class="featured-text"> <!--featured-text begin-->

                            <p><b>Get free delievery</b> on every more then 3000 shopping</p>

                        </div> <!--featured-text finish-->

                    </div> <!--col-md-3 feature-box finish-->

                    <div class="col-md-3 feature-box"> <!--col-md-3 feature-box begin-->

                        <img src="admin_area/Advantages Images/featured4.png" alt="Online Pay">

                        <div class="featured-text"> <!--featured-text begin-->

                            <p><b>Pay Online</b> through multiple options(Credit Card)</p>

                        </div> <!--featured-text finish-->

                    </div> <!--col-md-3 feature-box finish-->

                </div> <!--row finish-->

            </div> <!--container finish-->

        </section>

        <!-------------Trending Products--------------->

        <div class="container"> <!--container begin-->
            
            <div class="title-box"> <!--title-box begin-->
                <h2>Trending Products</h2>
            </div> <!--title-box finish-->
            
            <div class="row"> <!--row begin-->
                
                <?php
                    get_Pro_Home();
                ?>

            </div> <!--row finish-->

        </div> <!--container finish-->

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