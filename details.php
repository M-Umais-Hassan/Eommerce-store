<?php 

include "logic/connection.php";

include "logic/functions/functions.php";

global $conn;

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
                                <a class="nav-link home" href="index.php">Home</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link active" name="shop" href="shop.php">Shop</a>
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

        </div> <!--container nav finish-->

        <!-------Detail------->

        <div class="container"> <!--container start-->

            <?php 
            global $conn;

            $pro_id = $_GET['pro_id'];
        
            $get_detail = "select * from products where pro_id = $pro_id";
        
            $query = mysqli_query($conn,$get_detail);
        
            $row_detail = mysqli_fetch_array($query);
        
            $pro_name = $row_detail['pro_name'];
            $pro_price = $row_detail['pro_price'];
            $pro_desc = $row_detail['pro_desc'];
            $pro_img1 = $row_detail['pro_img1'];
            $pro_img2 = $row_detail['pro_img2'];
            $pro_img3 = $row_detail['pro_img3'];
        
            echo"
        
            <div class='row'>
        
                <div class='col-md-6 detail-img'>
        
                    <div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
                        
                        <div class='carousel-inner'>
                            
                            <div class='carousel-item active'>
                                <img src='admin_area/Products/$pro_img1' class='d-block w-100' alt='Product'>
                            </div>
                            
                            <div class='carousel-item'>
                                <img src='admin_area/Products/$pro_img2' class='d-block w-100' alt='Product'>
                            </div>
                            
                            <div class='carousel-item'>
                                <img src='admin_area/Products/$pro_img3' class='d-block w-100' alt='Product'>
                            </div>
        
                        </div>
                        
                        <a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                        <span class='sr-only'>Previous</span>
                        </a>
                        
                        <a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                        <span class='sr-only'>Next</span>
                        </a>
                    
                    </div>
        
                </div>
        
                <div class='col-md-6 detail-img-right'>
        
                    <div class='row upper'>
        
                        <div class='col-md-12'>
                            
                            <div class='product-bottom'> 
        
                                <h1 name='name'>$pro_name</h1><hr>
        
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
        
                                <h3 name='price'>$$pro_price</h3> 
                                        
                            </div>";

                            add_cart();
                    
                            echo"
                            <form class='details-form' action='details.php?pro_id=$pro_id' method='post'>
        
                                <div class='form-group row'>
                                    <label class='col-md-2 col-form-label col-form-label-md'>Size : </label>
                                    <div class='col-md-10'>
                                        
                                        <select name='size' class='form-control'>
                                            
                                            <option selected disabled value=''> Select Size </option>
                                            <option>small</option>
                                            <option>medium</option>
                                            <option>large</option>
        
                                        </select>
        
                                    </div>
                                </div>
        
                                <div class='form-group1'>
        
                                    <div class='form-group row'>
                                        <label class='col-md-2 col-form-label col-form-label-md'>Quantity:</label>
                                        <div class='col-md-10'>
                                            <input type='number' name='quantity' id='quantity' value='1' class='form-control form-control-md required'>
                                        </div>
                                    </div>
        
                                </div>
        
                                <input type='submit' value='Add to Cart' name='submit' class='btn btn-primary btn-block'>
        
                            </form>
        
                        </div>
        
                    </div>
        
                    <div class='row lower'>
        
                        <div class='col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                            <img src='admin_area/Products/$pro_img1' alt='Product'>
                        </div>
        
                        <div class='col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                            <img src='admin_area/Products/$pro_img2' alt='Product'>
                        </div>
        
                        <div class='col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                            <img src='admin_area/Products/$pro_img3' alt='Product'>
                        </div>
        
                    </div>
        
                </div>
        
            </div>
        
            <div class='row desc'>
        
                <div class='col-md-12'>
        
                    <div class='Description'>
        
                        <h1>Description</h1>
        
                    </div>
        
                </div>
        
                <div class='col-md-12'>
        
                    <div class='bg-light shadow-lg p-3 mb-5 bg-white rounded'> <!--side-bar bg-light shadow-lg p-3 mb-5 bg-white rounded begin-->
                                    
                        <p>$pro_desc</p>    
                
                    </div> <!--bg-light shadow-lg p-3 mb-5 bg-white rounded finish-->
        
                </div>
        
            </div>
        
            ";
            ?>

        </div> <!--container finish-->

        <!------Related Products----->

        <div class="container"> <!--container begin-->
            
            <div class="title-box"> <!--title-box begin-->
                <h2>Similar Products</h2>
            </div> <!--title-box finish-->
            
            <div class="row"> <!--row begin-->
                
                <?php
                    more_Products();
                ?>

            </div> <!--row finish-->

        </div> <!--container finish-->

        <!----------Footer------------>

        <div class="footer"> <!--footer begin-->
                    
            <?php
                include "includes/footer.php";
            ?>
        
        </div> <!--footer finish-->
                
    </body> 
        
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        
</html>