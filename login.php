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
            body, html {
                height: 100%;
            }

            * {
                box-sizing: border-box;
            }

            .bg-image {
                background: url("login_img/img.jpg");
                filter: blur(8px);
                -webkit-filter: blur(8px);
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .custom-control.custom-checkbox {
                text-align: right;
                margin-right: 15px;
                margin-top: -10px;
            }
            .form-group.register-form {
                margin-top: -30px;
                color: white;
            }
        </style>

    </head> 

    <body> 

        <div class="bg-image"></div>

        <div class="login-box">
            <form action="login.php" method="post">
                <div class="form-group register-form" align="center">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio" name="usertype" value="admin">
                        <label class="custom-control-label" for="customRadio">admin</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio2" name="usertype" value="user">
                        <label class="custom-control-label" for="customRadio2">user</label>
                    </div>
                </div>
                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <i class="fa fa-key"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1" onclick="showpass()">
                    <label class="custom-control-label" for="customCheck"></label>
                </div>
                <input style="background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));" name="submit" type="submit" value="LOGIN" class="btn btn-primary">
                <br><hr>
                <a href="register.php">Don't have account, register?</a>
            </form>
        </div>
        
    </body> 

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
        function showpass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</html>

<?php

    $count=0;

    if(isset($_POST['submit'])){

        global $conn;

        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        $radiobutton=$_POST["usertype"];

        if($radiobutton=="admin"){
            $usertype="admin";
        }
        else{
            $usertype="user";
        }

        if($radiobutton=="user"){

            $counter=false;

            $query = "select * from customer";
            $result = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($result)){

                $db_email = $row['email'];
                $db_password = $row['password'];
                
                if($email==$db_email){
                    if($pass==$db_password){
                        $_SESSION['email']=$email;
                        $counter=true;
                    }
                }
            }
            if($counter==true){
                echo"
                    <script>window.open('index.php')</script>
                    <script>window.close('login.php','_self')</script>
                ";
            }
            if($counter==false){
                echo"
                    <script>alert('Username or password not match')</script>
                ";
            }
        }
        else if($radiobutton=="admin"){

            $query1 = "select * from admin";
            $result1 = mysqli_query($conn,$query1);

            while($row = mysqli_fetch_array($result1)){

                $counter1=false;

                $db_email = $row['email'];
                $db_password = $row['password'];
                
                if($email==$db_email){
                    if($pass==$db_password){
                        $_SESSION['email']=$email;
                        $counter1=true;
                    }
                }
            }
            if($counter1==true){
                $count_login=0;
                echo"
                    <script>window.open('admin_area/admin_portal.php')</script>
                    <script>window.close('login.php')</script>
                ";
            }
            if($counter1==false){
                echo"
                    <script>alert('Username or password not match')</script>
                ";
            }
        }
        else{

            echo"
                <script>alert('select an option from user and admin')</script>
            ";
            
        }

    }

?>