<?php

    require_once '../db/users.php';

    if(isset($_POST['register'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password-confirm'];
        if($password != $password_confirm) {
            header("location:signup.php?msg= Password must match with confirm password");
        }

        $result = $mysqli->query("SELECT * FROM admin where email = '".$email."'") or die($mysqli->error);
        if($result->num_rows >0) {
            header("location:signup.php?msg= Email already exists");
        }

        else if($result->num_rows == 0) {
            $mysqli->query("INSERT INTO admin (email, password) VALUES ('$email', '$password') ") or die($mysqli->error);
            header("location:signup.php?msg= Your have successfully registered");
        }

    }

?>