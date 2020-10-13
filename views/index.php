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
            <button class="btn btn-info " onClick="window.location.reload();">&#x21bb;  Reload</button>
            <button class="btn btn-danger" type="submit" value="delete" name="bulk_delete">Bulk Delete</button>
        <!-- </form> -->
        </div>
        <div class="container">
            <?php require_once './displayUsers.php'; ?>
        </div>
        </form>
    </body>
</html>