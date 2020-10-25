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
            try {
                $sql = $conn->prepare("SELECT * FROM admin WHERE email = '".$email."' AND password = '".$password."' ");
                $sql->execute();
                $result = $sql->fetchAll();
                if(count($result) == 1) {
                    $_SESSION['email'] = $result[0]['email'];
                    header("location: ../views/index.php");
                }
                else {
                    header("location: login.php?danger= Invalid credentials");
                }
            }
            catch(PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
        }
    }

?>