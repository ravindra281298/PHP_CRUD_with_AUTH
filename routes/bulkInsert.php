<?php

    session_start();
    require_once '../db/users.php';

    if(isset($_POST['bulk_insert'])) {

        if(isset($_FILES['file'])) {

            if($_FILES['file']['error'] > 0) {

                $_SESSION['message'] = 'something went wrong with file';
                $_SESSION['msg_type'] = 'danger';
            }

            else {
                $Inserted = 0;
                $Failed = 0;
                $result = fopen($_FILES["file"]["tmp_name"], "r");
                while($data = fgetcsv($result)) {

                    $first_name = $data[0];
                    $last_name = $data[1];
                    $gender = $data[2];
                    $country = $data[3];
                    $dob = $data[4];
                    if(!$first_name || !$last_name || !$gender || !$country || !$dob) {
                        $Failed += 1;
                    }
                    else {

                        $sql = "INSERT INTO users (first_name, last_name, gender, country, dob)
                                VALUES('$first_name','$last_name','$gender','$country','$dob')";
                        $conn->exec($sql);
                        $Inserted += 1;
                    }
                }

                $_SESSION['message'] = "inserted: ".$Inserted."  Failed: ".$Failed;
                $_SESSION['msg_type'] = 'success';
            }
        }
        else {
            $_SESSION['message'] = 'Please upload a file';
            $_SESSION['msg_type'] = 'warning';
        }
        header("location: ../views/index.php");
    }

?>