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

            <hr><h1 align='center'>Add New Category</h1><hr>

            <form class='add-product' method="post" enctype="multipart/form-data">

                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md">Category : </label>
                    <div class="col-sm-10">
                        <input type="text" name='category' class="form-control form-control-md" required>
                    </div>
                </div><hr>
                
                <div class="form-group row">
                    <label class="col-md-2 col-form-label col-form-label-md"></label>
                    <div class="col-md-10">
                        <input type="submit" value='Submit' name='submit' class="btn btn-primary btn-block">
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

        $cat = $_POST['category'];

        if($cat!=null){
            $query = "insert into categories(cat_name) values('$cat')";
            $run = mysqli_query($conn,$query);
        }

        if ($query) {
            echo "
            <script>
                alert('Category has been inserted sucessfully')
            </script>";
            echo "
            <script>
                window.open('admin_portal.php?insert_cat','_self')
            </script>";
        }else{
            echo "
            <script>
                alert('Error!')
            </script>";
            echo "
            <script>
                window.open('admin_portal.php?insert_cat','_self')
            </script>";
        }

    }

?>
