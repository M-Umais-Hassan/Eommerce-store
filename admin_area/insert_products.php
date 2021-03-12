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

        <div class="container">

            <hr><h1 align='center'>Add Products</h1><hr>

            <form class='add-product' method="post" enctype="multipart/form-data">

                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md">Product Name : </label>
                    <div class="col-sm-10">
                        <input type="text" name='name' class="form-control form-control-md" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md">Product Price : </label>
                    <div class="col-md-10">
                        <input type="text" name='price' class="form-control form-control-md " required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md">Product Image(1) : </label>
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name='img1' required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md">Product Image(2) : </label>
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name='img2'>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md">Product Image(3) : </label>
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name='img3'>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md">Category : </label>
                    <div class="col-md-10">
                        
                        <select name="cat" class="form-control" required>
                              
                            <option selected disabled value=""> Select a Category </option>
                              
                            <?php 
                              
                            $get_cat = "select * from categories";
                            $run_cat = mysqli_query($conn,$get_cat);
                              
                            while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                $cat_id = $row_cat['cat_id'];
                                $cat_title = $row_cat['cat_name'];
                                  
                                echo "
                                  
                                <option value='$cat_id' required> $cat_title </option>
                                  
                                ";
                                  
                            }
                              
                            ?>
                              
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md">Product Category:</label>
                    <div class="col-md-10">
                        
                        <select name="p_cat" class="form-control" required>
                              
                            <option selected disabled value=""> Select a Category </option>
                          
                            <?php 
                              
                            $get_cat = "select * from product_categories";
                            $run_cat = mysqli_query($conn,$get_cat);
                              
                            while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                $p_cat_id = $row_cat['p_cat_id'];
                                $p_cat_title = $row_cat['p_cat_name'];
                                  
                                echo "
                                  
                                <option value='$p_cat_id' required> $p_cat_title </option>
                                  
                                ";
                                  
                            }
                              
                            ?>
                              
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md">Product Desc : </label>
                    <div class="col-md-10">
                        <textarea class="form-control" name='desc' id="comment"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md"></label>
                    <div class="col-md-10">
                        <input type="submit" value='Insert Product' name='submit' class="btn btn-primary btn-block">
                    </div>
                </div>
                        
            </form>

        </div>
    
    </body> 
        
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>   
    
</html>

<?php

    if(isset($_POST["submit"])){

        global $conn;

        $name = $_POST["name"];
        $price = $_POST["price"];
        $cat = $_POST["cat"];
        $pro_cat = $_POST["p_cat"];
        $desc = $_POST["desc"];

        $fname_img1 = $_FILES["img1"]["name"];
        $fname_img2 = $_FILES["img2"]["name"];
        $fname_img3 = $_FILES["img3"]["name"];

        $destination_img1="Products/$fname_img1";
        $destination_img2="Products/$fname_img2";
        $destination_img3="Products/$fname_img3";

        $destination1_img1="$fname_img1";
        $destination1_img2="$fname_img2";
        $destination1_img3="$fname_img3";
        
        move_uploaded_file($_FILES["img1"]["tmp_name"],$destination_img1);
        move_uploaded_file($_FILES["img2"]["tmp_name"],$destination_img2);
        move_uploaded_file($_FILES["img3"]["tmp_name"],$destination_img3);

        $SQL = "INSERT INTO products(pro_name,pro_price,pro_img1,pro_img2,pro_img3,cat_id,p_cat_id,pro_desc,created_at) VALUES ('$name',$price,'$destination1_img1','$destination1_img2','$destination1_img3',$cat,$pro_cat,'$desc',NOW())";
        $query=mysqli_query($conn,$SQL);
        if ($query) {
            echo "
            <script>
                alert('Product has been inserted sucessfully')
            </script>";
            echo "
            <script>
                window.open('add_products.php','_self')
            </script>";
        }else{
            echo "
            <script>
                alert('Error! May be you are entering discription in wrong way correct it or contact to your developer')
            </script>";
            echo "
            <script>
                window.open('add_products.php','_self')
            </script>";
        }

    }

?>
