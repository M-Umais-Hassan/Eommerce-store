<?php

    session_start();
    session_destroy();

    echo"
        <script>window.open('index.php')</script>
        <script>window.close('logout.php')</script>
    ";

?>