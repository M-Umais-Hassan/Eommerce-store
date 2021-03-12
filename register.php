<?php
    include "logic/functions/functions.php";
    include "logic/connection.php";

    session_start();
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

        <style>
            button.btn.btn-lg.btn-primary {
                border-radius: 50px;
                width: 200px;
                background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));
            }
        </style>
    </head> 

    <body> 
    
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
                                <a class="nav-link" href="index.php">Home</a>
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

        <!---------Register form--------->

        <div class="container">
        
            <form class="register" action="register.php" method="post" enctype="multipart/form-data">

                <div class="form-group register-form">
                    <label>First Name </label>
                    <input type="text" name="fname" required>
                </div>

                <div class="form-group register-form">
                    <label>Last Name </label>
                    <input type="text" name="lname" required>
                </div>

                <div class="form-group register-form">
                    <label>Email </label>
                    <input type="email" name="email" placeholder="example@gmail.com" required>
                </div>

                <div class="form-group register-form">
                    <label>Password </label>
                    <input type="password" name="pass" required>
                </div>

                <div class="form-group register-form">
                    <label>Confirm Password </label>
                    <input type="password" name="cpass" required>
                </div>

                <?php
                if(isset($_POST['submit']) && $_POST['pass']!=$_POST['cpass']){
                    echo "
                        <div class='warning'>
                            <label>*Password not match with confirm password</label>
                        </div>
                    ";
                }
                ?>

                <div class="form-group register-form">
                    <label>Contact </label>
                    <input type="text" name="contact" maxlength="14" value="+92 3" required>
                </div>

                <div class="form-group register-form">
                    <label>City </label>
                    <input type="text" name="city" required>
                </div>

                <div class="form-group row register-form">
                    <label class="col-md-2 col-form-label col-form-label-md">Image : </label>
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name='img1' required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="form-group register-form" align="center">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio" name="gender" value="male">
                        <label class="custom-control-label" for="customRadio">Male</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio2" name="gender" value="female">
                        <label class="custom-control-label" for="customRadio2">Female</label>
                    </div>
                </div>

                <div align="center" class="form-group register-form">
                    <button type="submit" name="submit" class="btn btn-lg btn-primary">
                        <i class="fa fa-user"></i> Register
                    </button><br><br>
                    <a href="login.php">Already have account sign in</a>
                </div>
                
            </form>


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

<?php

    if(isset($_POST["submit"])){

        if(!isset($_SESSION['email'])){

            global $conn;
            $count=0;
            
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $email=$_POST["email"];
            $password=$_POST["pass"];
            $cpassword=$_POST["cpass"];
            $contact=$_POST["contact"];
            $city=$_POST["city"];

            $fname_img1 = $_FILES["img1"]["name"];

            $destination1_img1="$fname_img1";
            
            $temp=$_FILES["img1"]["tmp_name"];

            $filepath="admin_area/customer_images";

            if (!file_exists($filepath)) {
                mkdir($filepath, 0777);
            } 

            move_uploaded_file($temp,"admin_area/customer_images/$fname_img1");

            $radiobutton=$_POST["gender"];

            if($radiobutton=="male"){
                $gender="male";
            }
            else{
                $gender="female";
            }

            $query1="select * from customer";
            $result1=mysqli_query($conn,$query1);

            while($row=mysqli_fetch_array($result1)){

                $checkemail=$row['email'];

                if($checkemail==$email){
                    $count++;
                }

            }

            if($password==$cpassword && $count==0){

                $_SESSION['email'] = $email;

                $query="INSERT INTO customer(c_fname, c_lname, email, password, contact, city, img, gender, created_at) VALUES ('$fname','$lname','$email','$password','$contact','$city','$destination1_img1','$gender',NOW())";
                $result=mysqli_query($conn,$query);

                if ($result) {
                    echo "
                    <script>
                        alert('Account registred successfully')
                    </script>
                    <script>
                        window.open('index.php')
                    </script>";
                }else{
                    echo "
                    <script>
                        alert('Error! while registring new account')
                    </script>";
                }
            }
            else if($count!=0){
                echo "
                <script>
                    alert('Already have account on this email')
                </script>";
            }

        }
        else{
            echo"
                <script>alert('You are already login cannot create another account')</script>
                <script>window.open('index.php')</script>
            ";
        }
    }

?>