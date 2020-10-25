<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>Sign Up</title>
    </head>
    <body>
        <?php require_once '../routes/signup.php' ?>
        <?php
        if(@$_GET['msg'] == true): ?>
            <div class="alert alert-warning"><?php echo $_GET['msg']; ?>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        <?php endif ?>

        <div class="container m-auto">
            <h1 class="mb-5 mt-3">Sign Up</h1>
            <form class="form form-group" action="" method="post">
                <label>Email</label>
                <input class="form-control" type="email" name="email" required />
                <label>Password</label>
                <input class="form-control" type="password" name="password1" required />
                <label>Confirm Password</label>
                <input class="form-control mb-3" type="password" name="password2" required />
                <button class="btn btn-info" type="submit" name="register">Sign Up</button>
            </form>
            <a href="./login.php">Login</a>
        </div>
    </body>
</html>