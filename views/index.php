<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User List</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
        crossorigin="anonymous">
    </head>
    <body>
    <?php 
    require_once '../routes/src.php';
    require_once '../db/users.php';
    ?>

        <?php 
        if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php echo $_SESSION['message'];
                  unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>

        <div class="container center">
        <form  class="form-group" action="" method="post">
            <a class="btn btn-success" href="./addUser.php">+ Add Person</a>
            <button class="btn btn-default "> Reload</button>
            <button class="btn btn-danger">Bulk Delete</button>
        </form>
        </div>

        <?php 
            $users = $mysqli->query("SELECT * from users ") or die($mysqli->error);
        ?>
        <div class="container">
            <table class="table">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Date of Birth</th>
                    <th>Action</th>
                </thead>
                <?php
                    while($row = $users->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td>
                        <a href="index.php?edit=<?php echo $row["id"]; ?>"
                            class="btn btn-info">Edit</a>
                        <a href="index.php?delete=<?php echo $row['id']; ?>"
                            class="btn btn-danger" >Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
            </table>
        </div>
    </body>
</html>