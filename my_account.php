<?php
    include "logic/functions/functions.php";
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

        <style>
            label{
                font-size: 20px;
                font-weight: bold;
                align: center;
                float: center;    
            }
            .side-bar1,.info{
                margin: 40px 0px;

            }
            .side-bar1.bg-dark {
                padding: 20px 0;
            }
            .side-bar1 a {
                color: white;
                font-size: 18px;
            }
            .side-bar1 a:hover {
                color: white;
                background: cornflowerblue;
                text-decoration: none;
                padding: 10px;
            }
            h3 {
                padding: 10px 30px;
                background: cornflowerblue;
                color: white;
                font-size: 30px;
                font-family: initial;
                font-weight: 900;
            }
        </style>

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
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="shop.php">Shop</a>
                            </li>
                            
                            <li class="nav-item active">
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

        <!---------my account--------->

        <?php

            global $conn;

            $query="select * from customer";
            $result=mysqli_query($conn,$query);

            while($row=mysqli_fetch_array($result)){
                $email=$row['email'];
                if($_SESSION['email']==$email){
                    $fname=$row['c_fname'];
                    $lname=$row['c_lname'];
                    $email1=$row['email'];
                    $pass=$row['password'];
                    $contact=$row['contact'];
                    $city=$row['city'];
                    $gender=$row['gender'];
                    $date=$row['created_at'];
                    $img=$row['img'];
                }
            }

        ?>

        <div class="box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        
                        <div class="side-bar1 bg-dark">
                            <h3>Menu</h3>                       
                            <ul style="list-style-type:none;">
                                <li style="margin:20px 20px 0px -10px;"><a href="my_account.php?edit"><i class="fa fa-edit"></i> Edit profile</a></li>
                                <li style="margin:20px 20px 0px -10px;"><a href="my_account.php?change_password"><i class="fa fa-key"></i> Change Password</a></li>
                                <li style="margin:20px 20px 0px -10px;"><a href="my_account.php?delete"><i class="fa fa-remove" style="color:red;"></i> Delete account</a></li>
                                <li style="margin:20px 20px 0px -10px;"><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </div>  
                        
                    </div> 

                    <div class="col-md-8">
                        <div class="info bg-light text-center shadow-lg p-3 mb-5 bg-white rounded">                           
                            <?php if(!isset($_GET['edit']) && !isset($_GET['change_password']) && !isset($_GET['delete'])){?>
                                <div class="title-box"><h1 style="margin-top:-10px;">User Info</h1></div>
                                <img class="image" style="border-radius: 50%;margin-bottom:30px;" width="150px" height="150px" <?php echo "src='admin_area/customer_images/$img'"; ?> alt="image"> <br>    
                                <label class="left"><?php echo "$fname"; ?> <?php echo " $lname"; ?></label> <br><hr>    
                                <label class="left">Email: <?php echo "$email1"; ?></label> <br><hr>
                                <label class="right">Password: <?php echo "$pass"; ?></label> <br><hr>
                                <label class="left">Contact: <?php echo "$contact"; ?></label> <br><hr>
                                <label class="right">city: <?php echo "$city"; ?></label> <br><hr>
                                <label class="left">Gender: <?php echo "$gender"; ?></label> <br><hr>
                                <label class="right">Account Created At: <?php echo "$date"; ?></label>  
                            <?php } ?>
                            <?php
                                if(isset($_GET['edit'])){
                                    
                                }
                            ?>
                            <?php
                                if(isset($_GET['change_password'])){
                                    echo"
                                    <form method='post' enctype='multipart/form-data'>

                                        <h4 style='margin:30px 0px;font-size:35px;'>Change your password</h4><hr>

                                        <div class='form-group row'>
                                            <label class='col-md-3 col-form-label col-form-label-md'>Old password : </label>
                                            <div class='col-md-9'>
                                                <input type='text' name='old_pass' class='form-control form-control-md' required>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label class='col-md-3 col-form-label col-form-label-md'>New password : </label>
                                            <div class='col-md-9'>
                                                <input type='text' name='new_pass' class='form-control form-control-md' required>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label class='col-md-3 col-form-label col-form-label-md'>Confirm password : </label>
                                            <div class='col-md-9'>
                                                <input type='text' name='cnew_pass' class='form-control form-control-md' required>
                                            </div>
                                        </div>
                        
                                        <div class='form-group row'>
                                            <label class='col-md-2 col-form-label col-form-label-md'></label>
                                            <div class='col-md-10'>
                                                <input type='submit' value='Change Password' name='changepass' class='btn btn-primary'>
                                            </div>
                                        </div>
                                                
                                    </form>
                                    ";
                                    
                                }
                            ?>
                            <?php
                                if(isset($_GET['delete'])){
                                    echo" 
                                    <form method='post'>
                                        <h4 style='margin:30px 0px;'>Once you delete your account you will not be able to login with that account.Do you really want to delete your account?</h4>
                                        <button style='margin-bottom:30px;' type='submit' name='cancel' class='btn btn-primary btn-md'>Cancel</button>
                                        <button style='margin-bottom:30px;' type='submit' name='delete' class='btn btn-danger btn-md'>Delete</button>
                                    </form>
                                    ";
                                }
                            ?>
                        </div>    

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

<?php
    if(isset($_POST['changepass'])){
        global $conn;
        $checkpass = null;
        $newpass = $_POST['new_pass'];
        $oldpass = $_POST['old_pass'];
        $confirmpass = $_POST['cnew_pass'];

        $query = "select * from customer";
        $run = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($run)){
            $pass = $row['password'];
            if($oldpass==$pass){
                $checkpass = $oldpass;
            }
        }
        if($checkpass!=null){
            if($newpass==$confirmpass){
                $query1 = "UPDATE customer SET password=$newpass WHERE email='$email1'";
                if (mysqli_query($conn, $query1)) {
                    echo "<script>alert('Password updated successfully')</script>";
                }
                else {
                    echo "<script>('Error updating record: ')</script>";
                }
                
                mysqli_close($conn);
            }
            else{
                echo "<script>alert('Password not match with confirm password')</script>";
            }
        }
        else{
            echo "<script>alert('Your password is not correct')</script>";
        }

    }

    if(isset($_POST['cancel'])){
        echo"<script>window.open('my_account.php','_self')</script>";
    }else if(isset($_POST['delete'])){
        $query = "delete * from customer where email='$email1'";
        $run = mysqli_query($query);
        session_destroy();
        echo"<script>window.open('index.php')</script>";
    }
    
?>