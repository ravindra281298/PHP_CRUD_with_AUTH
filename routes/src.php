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

        $mysqli->query("INSERT INTO users (first_name, last_name, gender, country, dob)
                        VALUES('$first_name','$last_name','$gender','$country','$dob')")
                        or die($mysqli->error);

        $_SESSION['message'] = 'Record has been saved';
        $_SESSION['msg_type'] = "success";

        header("location: $index_url ");
    }

    if(isset($_GET['delete'])) {

        $id = $_GET['delete'];

        $mysqli->query("DELETE FROM users where id = $id") or die($mysqli->error);

        $_SESSION['message'] = 'Record has been deleted';
        $_SESSION['msg_type'] = 'danger';

        header("Refresh:2; location: $index_url ");
    }

    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $result = $mysqli->query("SELECT * FROM users where id = $id") or die($mysqli->error);

        // if($row = $result->fetch_assoc()) {
            $row = $result->fetch_assoc();
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['country'] = $row['country'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['update'] = true;
            $_SESSION['id'] = $id;

        // }

        header("location: $addUser_url");
    }

    if(isset($_POST['update'])) {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $dob = $_POST['dob'];
        $id = $_POST['id'];

        $mysqli->query("UPDATE users SET first_name='$first_name', last_name='$last_name', 
                        gender='$gender', country='$country', dob='$dob' WHERE id='$id' ")
                        or die($mysqli->error);

        $_SESSION['message'] = 'Record has been update.';
        $_SESSION['msg_type'] = 'warning';

        header("location: $index_url ");
    }

    if(isset($_POST['bulk_delete'])){

        if(isset($_POST['delete'])){
          foreach($_POST['delete'] as $id){
            $mysqli->query("DELETE FROM users where id = $id") or die($mysqli->error);
          }
        }

        $_SESSION['message'] = 'Bulk Record has been deleted';
        $_SESSION['msg_type'] = 'danger';

        header("Refresh:2; location: $index_url ");
      }

      if(isset($_POST["bulk_insert"])) {
          $_SESSION['message'] = 'Something went wrong';
          $_SESSION['msg_type'] = "danger";

          $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream',
                            'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv',
                             'application/excel', 'application/vnd.msexcel', 'text/plain');

          if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
            //   $fileName = explode('.',$_FILES['file']['name']);
                $_SESSION['message'] ='here';
              if(is_uploaded_file($_FILES['file']['tmp_name'])) {

                  $result = fopen($_FILES['file']['tmp_name'], 'r');

                  while($data = fgetcsv($result) != FALSE) {

                      $first_name = $data[0];
                      $last_name = $data[1];
                      $gender = $data[2];
                      $country = $data[3];
                      $dob = $data[4];

                      $mysqli->query("INSERT INTO users (first_name, last_name, gender, country, dob)
                        VALUES('$first_name','$last_name','$gender','$country','$dob')")
                        or die($mysqli->error);
                  }
                  fclose($result);

                  $_SESSION['message'] = 'Record has been saved';
                  $_SESSION['msg_type'] = "success";
              }
          }
          header("location: $index_url ");
      }
?>