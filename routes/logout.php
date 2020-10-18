<?php

    session_start();

    if(isset($_GET['logout'])) {
        if(isset($_SESSION['email'])) {
            session_destroy();
            header("location: ../index.php?msg= Successfully logged out");
        }
        else{
            header("location: ../index.php ");
        }
    }
?>