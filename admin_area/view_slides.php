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

            $query = "select * from slider";
            $result = mysqli_query($conn, $query);

            echo"
                <div class='container' style='text-align:center;'>
                    <hr><h2>Product categories</h2><hr>
                    <table class='table table-dark table-striped'>
                        <thead>
                            <tr style='font-size: 18px;'>
                                <th>#</th>
                                <th>ID</th>
                                <th style='height: 50px;'>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
            ";
            
            while($row = mysqli_fetch_array($result)){
            
                $counter++;

                $slider_id = $row['slide_id'];
                $slider_img = $row['slide_img'];

            echo"
                        <tbody>
                            <tr>
                                <td style='font-weight:bold;'>$counter</td>
                                <td>$slider_id</td>
                                <td><img height=100px width='100px' src='slider_images/$slider_img' alt='slider image'></td>
                                <td>
                                    <form method='post' action='view_slides.php'>
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
                $query = "delete from slider where slide_id='$slider_id'";
                $run = mysqli_query($conn,$query);
                echo"<script>window.open('admin_portal.php?view_slides','_self')</script>";
            }

        ?>
 
    </body> 
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>   
        
</html>
