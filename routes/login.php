<?php

    session_start();
    require_once '../db/users.php';

    if(isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)) {
            header("location: login.php?warning= Please fill in the blanks");
        }
        else {
            $result = $mysqli->query("SELECT * FROM admin WHERE email = '".$email."' AND password = '".$password."' ") or die($mysqli->error);
            if($result->num_rows != 0) {
                $_SESSION['email'] = $email;
                header("location: ../views/index.php");
            }
            else {
                header("location: login.php?danger= Invalid credentials");
            }
        }
    }

?>