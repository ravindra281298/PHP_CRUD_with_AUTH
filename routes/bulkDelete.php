<?php

    require_once '../db/users.php';


    if(isset($_POST['bulk_delete'])){

        if(isset($_POST['delete'])){
          foreach($_POST['delete'] as $id){
            try {
              $sql = "DELETE FROM users where id = $id";
              $conn->exec($sql);
              $_SESSION['message'] = 'Bulk Record has been deleted';
              $_SESSION['msg_type'] = 'danger';
            }
            catch(PDOException $e) {
              echo $sql."<br>".$e->getMessage();
            }
          }
        }
        header("Refresh:2; location: ../views/index.php ");
      }

?>