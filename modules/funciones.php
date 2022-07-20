<?php
session_start();

function destroyUser() {
        if (!isset($_SESSION['dni'])){
            session_destroy();
            header("location:index.php");
        }
    }

 ?>