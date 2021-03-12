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
                      
        <!----------Side Bar + shop------------>

        <div class="container-fluid s"> <!--container-fluid begin-->
            
            <div class="row"> <!--row begin-->

                <?php $count = 0; ?>
                
                <div class="col-md-3"> <!--col-md-3 begin-->
                    
                    <div class="side-bar bg-light text-center shadow-lg p-3 mb-5 bg-white rounded"> <!--side-bar bg-light text-center shadow-lg p-3 mb-5 bg-white rounded begin-->
                        
                        <h4>Product Categories</h4>    
                        
                        <?php

                            product_categories();

                        ?>
                    
                    </div> <!--side-bar bg-light text-center shadow-lg p-3 mb-5 bg-white rounded finish-->

                    <div class="side-bar bg-light text-center shadow-lg p-3 mb-5 bg-white rounded"> <!--side-bar bg-light text-center shadow-lg p-3 mb-5 bg-white rounded begin-->
                        
                        <h4>Categories</h4>    
                        
                        <?php

                            categories();

                        ?>
                    
                    </div> <!--side-bar bg-light text-center shadow-lg p-3 mb-5 bg-white rounded finish-->
                
                </div> <!--col-md-3 finish-->

                <div class="col-md-9 shop"> <!-- col-md-9 shop Start -->

                    <?php

                    echo" <div class='row'> ";

                        products_according_categories();

                        products_according_p_categories();

                    echo " </div> ";
                    
                    ?>
                    
                    <?php 
                        if(!isset($_GET['cat'])){
                            if(!isset($_GET['pcat'])){ 
                    ?>

                    <div class="title-box"> <!-- box Start -->
                        <h1>Shop</h1>
                    </div> <!-- box finish -->

                    <div class="row"> <!-- row Start -->
                      
                        <?php

                        global $conn;

                        $per_page = 9;

                        if(isset($_GET['page'])){
                                                    
                            $page = $_GET['page'];
                            
                        }else{
                            
                            $page=1;
                            
                        }

                        $start_from = ($page-1) * $per_page;

                        $get_shop_products = "select * from products order by 1 LIMIT $start_from,$per_page";

                        $run_shop_products = mysqli_query($conn,$get_shop_products);

                        $count = mysqli_num_rows($run_shop_products);

                        if($count==0){
                            echo"
                                <h4 style='color:red;'>No products to show</h4>
                            ";
                        }

                        while($row_shop_products=mysqli_fetch_array($run_shop_products)){

                            $pro_id = $row_shop_products["pro_id"];
                            $pro_name = $row_shop_products["pro_name"];
                            $pro_price = $row_shop_products["pro_price"];
                            $pro_img = $row_shop_products["pro_img1"];

                            echo"

                            <div class='col-md-4'> 
                                        
                                <div class='product-top'>

                                <a href='details.php?pro_id=$pro_id'>
                                    <img src='admin_area/Products/$pro_img' alt='Product'>
                                </a>
                                    
                                    <div class='overlay-right'>

                                        <button type='btn' name='eye' class='btn btn-secondary' title='Details'>
                                            <a href='details.php?pro_id=$pro_id'><i class='fa fa-eye'></i></a>
                                        </button>

                                        <button type='btn' class='btn btn-secondary' title='Add to Cart'>
                                            <a href='details.php?pro_id=$pro_id'><i class='fa fa-shopping-cart'></i></a>
                                        </button>

                                    </div>
                                
                                </div> 

                                <div class='product-bottom text-center'> 

                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>

                                    <h3 name='name'>$pro_name</h3>
                                    <p name='price'>$$pro_price</p>
                                
                                </div> 

                            </div>
                            
                            ";
                        }
                        ?>        

                    </div> <!-- row finish -->         

                    <?php 
                            }
                        }
                    ?>

                </div> <!--col-md-9 finish-->

                <!----------Pagination------------>   

                <?php if($count!=0){ ?>

                    <div class="container"> <!--container begin-->

                        <nav aria-label="Page navigation example">
                            
                            <ul class="pagination justify-content-center">
                                
                                <?php

                                $per_page = 9;
                                
                                $query = "select * from products";

                                $run_query = mysqli_query($conn,$query);

                                $total_records = mysqli_num_rows($run_query);

                                $total_pages = ceil($total_records / $per_page) ;

                                echo " <li class='page-item'><a class='page-link' href='shop.php?page=1'> ".'First Page'." </a></li> ";

                                for($i=1; $i<=$total_pages; $i++){
                                    echo " <li class='page-item'><a class='page-link' href='shop.php?page=$i'> ".$i." </a></li> ";
                                }

                                echo " <li class='page-item'><a class='page-link' href='shop.php?page=$total_pages'> ".'Last Page'." </a></li> ";

                                ?>        
                            
                            </ul>
                        
                        </nav> 

                    </div> <!--container finish-->
                    
                <?php } ?>

            </div> <!--row finish-->
            
        </div> <!--container-fluid finish-->

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