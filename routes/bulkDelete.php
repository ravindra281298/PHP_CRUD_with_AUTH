<?php

    require_once '../db/users.php';

    $counter = 0;
    if(isset($_POST['bulk_delete'])){
        $_SESSION['message'] = 'Something went wrong';
        $_SESSION['msg_type'] = 'danger';
        // if(isset($_POST['delete'])){
        //   foreach($_POST['delete'] as $id){
        //       $sql = "DELETE FROM users where id = $id ";
        //       $conn->exec($sql);
        //       // $sql->execute();
        //       $count1 += 1;
        //     }
        //     $_SESSION['message'] = '$count1 Record has been deleted';
        //     $_SESSION['msg_type'] = 'danger';
        //   }
          if(isset($_POST['delete'])) {

            $ids = implode(",",$_POST['delete']);
            $sql = "DELETE FROM users WHERE id IN ($ids)";
            $conn->exec($sql);
            $counter += 1;
            $_SESSION['message'] = '$count1 Record has been deleted';
            $_SESSION['msg_type'] = 'danger';
          }
        }
        header("Refresh:2; location: ../views/index.php ");

?>