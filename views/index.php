<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User List</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            require_once '../routes/src.php';
            require_once '../db/users.php';
            require_once '../routes/bulkDelete.php';
        ?>
        <?php
            if(!isset($_SESSION['email'])) {
                header("location: ../index.php ");
                exit;
            }
        ?>
        <?php
        if(@isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php echo $_SESSION['message'];
                  unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"> Welcome <?php echo @$_SESSION['email']; ?></a>
                </div>
                <div class="pull-right">
                    <a class="navbar-brand pull-right" href="../routes/logout.php?logout">Logout</a>
                </div>
            </div>
        </nav>

        <div class="container center ">
        <form  class="form-group" action="" method="post">
            <a class="btn btn-success" href="./addUser.php">+ Add Person</a>
            <!-- <button class="btn btn-info " onClick="window.location.reload();">&#x21bb;  Reload</button> -->
            <a class="btn btn-info" href="./index.php">&#x21bb;  Reload</a>
            <button class="btn btn-danger" type="submit" value="delete" name="bulk_delete">Bulk Delete</button>
            <a class="btn btn-warning pull-right" href="./bulkInsert.php">Import CSV</a>
        <!-- </form> -->
        </div>
        <div class="container">
            <?php if(isset($_SESSION['email'])) require_once './displayUsers.php'; ?>
        </div>
        </form>
    </body>
</html>