<!DOCTYPE html>
<html>

    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/style.css?v=<?php echo time();?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <title>MY_WEBSITE</title>

        <style>
            li{
                margin: 0 10px;
            }
            button{
                background: rgb(52, 58, 64);
                border: none;
                margin: 0 -8px;
            }
        </style>
    </head> 

    <body> 

        <!---------Nav Bar--------->

        <div id="nav"> <!--container nav begin-->

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!--navbar navbar-expand-lg navbar-light bg-light begin-->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!--collapse navbar-collapse begin-->
                        
                        <ul class="navbar-nav mr-auto">
                           
                            <li class="nav-item active">
                                <a class="nav-link active" href="admin_portal.php">
                                    <i class="fa fa-fw fa-dashboard"></i>Dashboard
                                </a>
                            </li>
                        
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Products
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="admin_portal.php?insert_products">Insert Products</a>
                                    <a class="dropdown-item" href="admin_portal.php?view_products">View Products</a>
                                </div>    
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Product Categories
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="admin_portal.php?insert_pcat">Insert Product Categories</a>
                                    <a class="dropdown-item" href="admin_portal.php?view_pcat">View Product Categories</a>
                                </div>    
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Categories
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="admin_portal.php?insert_cat">Insert Categories</a>
                                    <a class="dropdown-item" href="admin_portal.php?view_cat">View Categories</a>
                                </div>    
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Slides
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="admin_portal.php?insert_slides">Insert Slides</a>
                                    <a class="dropdown-item" href="admin_portal.php?view_slides">View Slides</a>
                                </div>    
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="admin_portal.php?view_customers">Customers</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="admin_portal.php?view_orders">Orders</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="admin_portal.php?view_payments">Payments</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php">
                                    <i class="fa fa-fw fa-power-off"></i>Logout
                                </a>
                            </li>

                        </ul>

                    </div> <!--collapse navbar-collapse finish-->

                </nav> <!--navbar navbar-expand-lg navbar-light bg-light finish-->
             
        </div> <!--nav finish-->
    
    </body> 
        
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
    
</html>

<?php

    if(isset($_GET['insert_products'])){
        include "insert_products.php";
    }
    if(isset($_GET['view_products'])){
        include "view_products.php";
    }
    if(isset($_GET['insert_cat'])){
        include "insert_category.php";
    }
    if(isset($_GET['view_cat'])){
        include "view_category.php";
    }
    if(isset($_GET['insert_pcat'])){
        include "insert_pcategory.php";
    }
    if(isset($_GET['view_pcat'])){
        include "view_pcategory.php";
    }
    if(isset($_GET['insert_slides'])){
        include "insert_slide.php";
    }
    if(isset($_GET['view_slides'])){
        include "view_slides.php";
    }
    

?>