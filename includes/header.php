<?php

    session_start();

    include "logic/connection.php";

    global $conn;

    if(isset($_SESSION['email'])){
        $name='';

        $query="select * from customer";
        $result=mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result)){
            $email=$row['email'];
            if($_SESSION['email']==$email){
                $name=$row['c_fname'];
            }
        }
    }

?>

<div class="top-nav">
    <nav class="navbar navbar-dark bg-dark">

        <?php
            if(isset($_SESSION['email'])){
                echo" 
                <h5 style='background-image: linear-gradient(45deg, #ec9292, #1b8fd8);'>Weclome " . $name . " </h5>
                ";
            }
            else{
                echo" 
                <h5>Weclome Guest</h5>
                ";
            }
        ?>

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <?php
                    if(isset($_SESSION['email'])){
                        echo" 
                            <a class='nav-link' href='#'><i class='fa fa-user-plus'></i> Register</a>
                        ";
                    }
                    else{
                        echo" 
                            <a class='nav-link' href='register.php'><i class='fa fa-user-plus'></i> Register</a>
                        ";
                    }
                ?>
            </li>
            <li class="nav-item">
                <?php
                    if(isset($_SESSION['email'])){
                        echo" 
                        <a class='nav-link' href='logout.php'><i class='fa fa-sign-in'></i> Logout</a>
                        ";
                    }
                    else{
                        echo" 
                        <a class='nav-link' href='login.php'><i class='fa fa-sign-in'></i> Login</a>
                        ";
                    }
                ?>
            </li>
        </ul>

    </nav>
</div>