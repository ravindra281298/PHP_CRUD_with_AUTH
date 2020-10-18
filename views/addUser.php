<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Person</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require_once '../routes/src.php' ?>
        <div class="container">

        <h1 class="mb-5 mt-3">Add Person</h1><hr>
        <form class="form-group" action="../routes/src.php" method="post">
            <input type="hidden" name="id", value = <?php if(isset($_SESSION['id'])) { echo $_SESSION['id']; unset($_SESSION['id']); } ?>>
            <label><b>First Name</b></label>
            <input class="form-control" type="text" name="first_name" value = "<?php if(isset($_SESSION['first_name'])) { echo $_SESSION['first_name']; unset($_SESSION['first_name']); } ?>" placeholder="Enter your First Name">
            <label><b>Last Name</b></label>
            <input class="form-control" type="text" name="last_name" value = "<?php if(isset($_SESSION['last_name'])) { echo $_SESSION['last_name']; unset($_SESSION['last_name']); } ?>" placeholder="Enter your Last Name">
            <label><b>Gender</b></label>
            <select class="form-control" name="gender" value = "<?php if(isset($_SESSION['gender'])) { echo $_SESSION['gender']; unset($_SESSION['gender']); } ?>" placeholder="Select your Gender">
            <option name="male">Male</option>
            <option name="female">Female</option>
            <option name="other">Other</option>
            </select>
            <label><b>Country</b></label>
            <input class="form-control" type="text" name="country" value = "<?php if(isset($_SESSION['country'])) { echo $_SESSION['country']; unset($_SESSION['country']); } ?>" placeholder="Enter your Country">
            <label><b>Date of Birth</b></label>
            <input class="form-control mb-3" type="date" name="dob" value = "<?php if(isset($_SESSION['dob'])) { echo $_SESSION['dob']; unset($_SESSION['dob']); } ?>"><br>
            <?php if(isset($_SESSION['update'])): unset($_SESSION['update']); ?>
                <button class="btn btn-info" type="submit" name="update">Update</button>
            <?php else: ?>
                <button class="btn btn-info" type="submit" name="save">Save</button>
            <?php endif ?>
        </form>
        </div>
    </body>
</html>