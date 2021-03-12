<?php

    include "logic/connection.php";

function get_Pro_Home(){

    global $conn;

    $get_products = "select * from products order by 1 desc LIMIT 0,8";

    $run_products = mysqli_query($conn, $get_products);

    $count = mysqli_num_rows($run_products);

    if($count==0){
        echo"
            <h4 style='color:red;'>No products to show</h4>
        ";
    }

    while($row_products = mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products["pro_id"];
        $pro_name = $row_products["pro_name"];
        $pro_price = $row_products["pro_price"];
        $pro_img = $row_products["pro_img1"];

        echo"
        
        <div class='col-md-3'> 
                    
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

}

function categories(){

    global $conn;

    $get_cat = "select * from categories";

    $query = mysqli_query($conn, $get_cat);

    while($row_cat = mysqli_fetch_array($query)){
        
        $cat_id = $row_cat['cat_id'];

        $cat_name = $row_cat['cat_name'];

        echo "

        <a class='nav-link' href='shop.php?cat=$cat_id'>$cat_name</a>  
        
        ";

    }

}

function product_categories(){

    global $conn;

    $get_pcat = "select * from product_categories";

    $query = mysqli_query($conn, $get_pcat);

    while($row_pcat = mysqli_fetch_array($query)){
        
        $p_cat_id = $row_pcat['p_cat_id'];

        $p_cat_name = $row_pcat['p_cat_name'];

        echo "

        <a class='nav-link' href='shop.php?pcat=$p_cat_id'>$p_cat_name</a>  
        
        ";

    }

}

function products_according_categories(){
    
    global $conn;

    if(isset($_GET['cat'])){

        $cat_id = $_GET['cat'];

        $get_cat = "select * from categories where cat_id = $cat_id";

        $query =  mysqli_query($conn,$get_cat);

        $row_cat = mysqli_fetch_array($query);

        $cat_name = $row_cat['cat_name'];

        $get_cat = "select * from products where cat_id = $cat_id";

        $query1 =  mysqli_query($conn,$get_cat);

        $count = mysqli_num_rows($query1);

        echo"

        <div class='col-md-9 shop'>

            <div class='title-box'> <!-- box Start -->

                <h1>$cat_name</h1>
            
            </div> <!-- box finish -->

        </div>

        ";

        if($count==0){
            echo"
                <h4 style='color:red;'>No products to show</h4>
            ";
        }

        while($row_shop_products=mysqli_fetch_array($query1)){

            $pro_id = $row_shop_products["pro_id"];
            $pro_name = $row_shop_products["pro_name"];
            $pro_price = $row_shop_products["pro_price"];
            $pro_img = $row_shop_products["pro_img1"];

            echo"

            <div class='col-md-4'> 
                        
                <div class='product-top'>

                    <img src='admin_area/Products/$pro_img' alt='Product'>
                    
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

    }

}

function products_according_p_categories(){
    
    global $conn;

    if(isset($_GET['pcat'])){

        $p_cat_id = $_GET['pcat'];

        $get_p_cat = "select * from product_categories where p_cat_id = $p_cat_id";

        $p_query =  mysqli_query($conn,$get_p_cat);

        $row_p_cat = mysqli_fetch_array($p_query);

        $p_cat_name = $row_p_cat['p_cat_name'];

        $get_p_cat = "select * from products where p_cat_id = $p_cat_id";

        $p_query1 =  mysqli_query($conn,$get_p_cat);

        $count = mysqli_num_rows($p_query1);

        echo"

        <div class='col-md-9 shop'>

            <div class='title-box'> <!-- box Start -->

                <h1>$p_cat_name</h1>
            
            </div> <!-- box finish -->

        </div>

        ";

        if($count==0){
            echo"
                <h4 style='color:red;'>No products to show</h4>
            ";
        }

        while($row_products=mysqli_fetch_array($p_query1)){

            $pro_id = $row_products["pro_id"];
            $pro_name = $row_products["pro_name"];
            $pro_price = $row_products["pro_price"];
            $pro_img = $row_products["pro_img1"];

            echo"

            <div class='col-md-4'> 
                        
                <div class='product-top'>

                    <img src='admin_area/Products/$pro_img' alt='Product'>
                    
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

    }

}

function more_Products(){

    global $conn;

    $get_products = "select * from products order by 1 desc LIMIT 0,4";

    $run_products = mysqli_query($conn, $get_products);

    while($row_products = mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products["pro_id"];
        $pro_name = $row_products["pro_name"];
        $pro_price = $row_products["pro_price"];
        $pro_img = $row_products["pro_img1"];

        echo"

        <div class='col-md-3'> 
                    
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

}

function IPUser(){
    //whether ip is from share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from remote address
    else{
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }

    return $ip_address;
}

function add_cart(){

    global $conn;

    if(isset($_POST['submit'])){

        $pro_id = $_GET['pro_id'];
        $ip_add = IPUser();
        $pro_qty = $_POST['quantity'];
        $pro_size = $_POST['size'];

        if($pro_size==null){
            echo "
                <script>
                    alert('Please select size')
                </script>";
            echo "
                <script>
                    window.open('details.php?pro_id=$pro_id','_self')
                </script>";
        }
        else if($pro_qty<1){
            echo "
                <script>
                    alert('Please select atleast 1 quantity')
                </script>";
            echo "
                <script>
                    window.open('details.php?pro_id=$pro_id','_self')
                </script>";
        }
        else{
            $SQL = "INSERT INTO cart(p_id, ip_add, qty, size) VALUES ($pro_id,'$ip_add',$pro_qty,'$pro_size')" ;      
            $query=mysqli_query($conn,$SQL);

            if ($query) {
                echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";
            }else{
                echo "failed";
            }   
        }

    }

}

function product_count(){

    global $conn;

    $ip = IPUser();

    $query = "select * from cart where ip_add = '$ip'";

    $run = mysqli_query($conn, $query);

    $count = mysqli_num_rows($run);

    echo "$count";
}

?>