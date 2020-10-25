<?php

    require_once '../db/users.php';

    if(isset($_POST['register'])) {

        $email = $_POST['email'];
        $password = $_POST['password1'];
        $password_confirm = $_POST['password2'];
        if($password == $password_confirm) {

            $sql = $conn->prepare("SELECT * FROM admin where email = '".$email."'");
            $sql->execute();
            $result = $sql->fetchAll();
            if(count($result) > 0) {
                header("location:signup.php?msg= Email already exists");
            }

            if(count($result) == 0) {
                $sql = "INSERT INTO admin (email, password) VALUES ('$email', '$password')";
                $conn->exec($sql);
                header("location: ../index.php?msg= Your have successfully registered");
            }
        }
        else {
            header("location:signup.php?msg= Password must match with confirm password");
        }
    }

?>