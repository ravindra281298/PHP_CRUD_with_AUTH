<?php

    require_once '../db/users.php';


    if(isset($_POST['bulk_delete'])){

        if(isset($_POST['delete'])){
          foreach($_POST['delete'] as $id){
            $mysqli->query("DELETE FROM users where id = $id") or die($mysqli->error);
          }
        }

        $_SESSION['message'] = 'Bulk Record has been deleted';
        $_SESSION['msg_type'] = 'danger';

        header("Refresh:2; location: ../views/index.php ");
      }

?>