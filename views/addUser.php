<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Person</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <h1>Add Person</h1><hr>
        <form class="form-group" action="../routes/src.php" method="post">
            <label>First Name</label>
            <input class="form-control" type="text" name="first_name" placeholder="Enter your First Name">
            <label>Last Name</label>
            <input class="form-control" type="text" name="last_name" placeholder="Enter your Last Name">
            <label>Gender</label>
            <select class="form-control" name="gender" placeholder="Select your Gender">
            <option name="male">Male</option>
            <option name="female">Female</option>
            <option name="other">Other</option>
            </select>
            <label>Country</label>
            <input class="form-control" type="text" name="country" placeholder="Enter your Country">
            <label>Date of Birth</label>
            <input class="form-control" type="date" name="dob"><br>
            <button class="btn btn-info" type="submit" name="save">Save</button>
        </form>
        </div>
    </body>
</html>