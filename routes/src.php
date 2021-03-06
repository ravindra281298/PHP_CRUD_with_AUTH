<?php

    require_once '../db/users.php';

    session_start();
    $index_url = '../views/index.php';
    $addUser_url = '../views/addUser.php';

    if(isset($_POST['save'])) {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $dob = $_POST['dob'];

        $sql = "INSERT INTO users (first_name, last_name, gender, country, dob)
               VALUES('$first_name','$last_name','$gender','$country','$dob')";
        $conn->exec($sql);
        $_SESSION['message'] = 'Record has been saved';
        $_SESSION['msg_type'] = "success";

        header("location: $index_url ");
    }

    if(isset($_GET['delete'])) {

        $id = $_GET['delete'];

        $sql = "DELETE FROM users where id = $id";
        $conn->exec($sql);

        $_SESSION['message'] = 'Record has been deleted';
        $_SESSION['msg_type'] = 'danger';

        header("Refresh:2; location: $index_url ");
    }

    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $sql = $conn->prepare("SELECT * FROM users where id = $id");
        $sql->execute();
        $result = $sql->fetchAll();

            $row = $result[0];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['country'] = $row['country'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['update'] = true;
            $_SESSION['id'] = $id;

        header("location: $addUser_url");
    }

    if(isset($_POST['update'])) {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $dob = $_POST['dob'];
        $id = $_POST['id'];


        $sql = $conn->prepare("UPDATE users SET first_name='$first_name', last_name='$last_name', 
                            gender='$gender', country='$country', dob='$dob' WHERE id='$id' ");
        $sql->execute();

        $_SESSION['message'] = 'Record has been update.';
        $_SESSION['msg_type'] = 'warning';

        header("location: $index_url ");
    }

    if(isset($_POST['reload'])){

        if(isset($_SESSION['search'])) {
            unset($_SESSION['search']);
        }
        header("Refresh:0; url:$index_url");
    }

?>