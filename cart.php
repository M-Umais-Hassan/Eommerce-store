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
                           
                            <li class="nav-item">
                                <a class="nav-link home" href="index.php">Home</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" name="shop" href="shop.php">Shop</a>
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
                            
                            <li class="nav-item active">
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

        <!---------Cart--------->

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class='cart'>
                        <table class='table' border='1'>
                            <thead class='thead-light'>
                                <tr align='center'>
                                    <th scope='col'>#</th>
                                    <th scope='col'colspan='2'>Product</th>
                                    <th scope='col'>Price</th>
                                    <th scope='col'>Quantity</th>
                                    <th scope='col'>Size</th>
                                    <th scope='col'>Remove Item</th>
                                </tr>
                            </thead>

                    <?php
                    
                    global $conn;

                    $ip = IPUser();

                    $query = "select * from cart where ip_add='$ip'";
                
                    $run_query = mysqli_query($conn, $query);

                    $count = mysqli_num_rows($run_query);

                    $counter=0;
                    $total=0;

                    while($row_products = mysqli_fetch_array($run_query)){

                        $counter++;
                        $c_id = $row_products['cart_id'];
                        $id = $row_products['p_id'];
                        $size = $row_products['size'];
                        $qty = $row_products['qty'];

                        $query1 = "select * from products where pro_id='$id'";
                
                        $run_query1 = mysqli_query($conn, $query1);

                        $row_products1 = mysqli_fetch_array($run_query1);

                        $pro_name = $row_products1['pro_name'];
                        $pro_price = $row_products1['pro_price'];
                        $pro_img = $row_products1['pro_img1'];

                        $total += $qty*$pro_price;

                        echo"
                            <tbody>
                                <tr align='center'>
                                    <th scope='row'>$counter</th>
                                    <td><img src='admin_area/Products/$pro_img' alt='product img'></td>
                                    <td>$pro_name</td>
                                    <td>$$pro_price</td>
                                    <td>$qty</td>
                                    <td>$size</td>
                                    <form method='get' action='cart.php'>
                                        <td><input type='submit' name='delete' value='Delete Item' class='btn btn-sm btn-danger'></td>
                                    </form>
                                </tr>
                            </tbody>
                        ";
                        
                    }
                    if(isset($_GET['delete'])){
                        global $conn;
                        $query = "delete from cart where cart_id='$c_id'";
                        $run = mysqli_query($conn,$query);
                        echo"<script>window.open('cart.php','_self')</script>";
                    }

                    ?>
                        </table>  
                    <?php 
                        if($count==0){
                            echo"<h3 align='center' style='color:red;'>No products to show in the Cart</h3>";
                        } 
                    ?>

                    <form action="payment.php" method='post'>
                        <input type="submit" value="Buy" name='buy' class='btn btn-large btn-primary btn-block'>
                    </form> 

                    </div>   
                </div>

                <div class="col-md-3">
                    <div class="amount bg-light text-center shadow-lg p-3 mb-5 bg-white rounded">
                            
                            <h4>Amount</h4><hr>

                            <?php 
                                if($counter==0){
                                    $shipping = 0;
                                }
                                else{
                                    $shipping = 4.9;
                                }
                            ?>
                            
                            <label>Total Products: <?php echo"$counter"; ?></label><br><br>
                            <label>Shipping fee: <?php echo"$$shipping"; ?></label><br><br>
                            <label>Total Price: <?php echo"$$total"; ?></label>
                            <?php $sub_total = $total + $shipping; ?>
                            <hr>
                            <label class='sub_total'>Total: <?php echo"$$sub_total";?></label>
                        
                    </div>
                </div>
            </div>
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
