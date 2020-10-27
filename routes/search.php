<?php

    // session_start();
    require_once '../db/users.php';

    if(isset($_POST['search'])) {
        if(isset($_POST['textSearch'])){
            $text = $_POST['textSearch'];
            $_SESSION['search'] = $text;
            header("Refresh:0");
            // header("refresh:3; location: ../views/index.php ");
            // $sql = $conn->prepare("SELECT * FROM users WHERE first_name LIKE '%$text%' OR last_name LIKE '%$text%' OR
            //                       gender LIKE '%$text%' OR country LIKE '%$text%' ");
            // $sql->execute();
            // $result = $sql->fetchAll();
            // echo count($result);
        }
    }
?>