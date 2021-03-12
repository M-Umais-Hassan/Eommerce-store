<?php

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

        <?php

            $counter=0;

            $query = "select * from products";
            $result = mysqli_query($conn, $query);

            echo"
                <div class='container' style='text-align:center;'>
                    <hr><h2>Products</h2><hr>
                    <table class='table table-dark table-striped'>
                        <thead>
                            <tr style='font-size: 18px;'>
                                <th>#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
            ";
            
            while($row = mysqli_fetch_array($result)){
            
                $counter++;

                $id = $row['pro_id'];
                $name = $row['pro_name'];
                $price = $row['pro_price'];
                $img = $row['pro_img1'];

            echo"
                        <tbody>
                            <tr>
                                <td style='font-weight:bold;'>$counter</td>
                                <td>$id</td>
                                <td>$name</td>
                                <td>$price</td>
                                <td><img src='Products/$img' alt='product-img' width='60px' height='60px'></td>
                                <td>
                                    <form method='post' action='view_products.php'>
                                        <input type='submit' name='submit' value='Delete' class='btn btn-danger btn-md'>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
            ";
            }
            echo"
                    </table>
                </div>
            ";

            if(isset($_POST['submit'])){
                $query = "delete from products where pro_id='$id'";
                $run = mysqli_query($conn,$query);
                echo"<script>window.open('admin_portal.php?view_products','_self')</script>";
            }

        ?>
 
    </body> 
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>   
        
</html>
