<?php

    require_once '../db/users.php';

    session_start();

    if(isset($_POST['save'])) {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $address = $_POST['country'];
        $dob = $_POST['dob'];

        $mysqli->query("INSERT INTO users (first_name, last_name, gender, country, dob)
                        VALUES('$first_name','$last_name','$gender','$country','$dob')")
                        or die($mysqli->error);

        $_SESSION['message'] = 'Record has been saved';
        $_SESSION['msg_type'] = "success";

        $url = '../views/index.php';
        header("location: $url ");
    }
?>