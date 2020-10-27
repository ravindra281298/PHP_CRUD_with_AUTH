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
            require_once '../routes/search.php';
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

        <div class="container center">
        <form  class="form-group" action="" method="post">
            <div class="row-md-3 col-md-9">
            <a class="btn btn-success" href="./addUser.php">+ Add Person</a>
            <a class="btn btn-info" href="./index.php">&#x21bb;  Reload</a>
            <input class="btn btn-danger" type="submit" value="Bulk Delete" name="bulk_delete" />
            <a class="btn btn-warning" href="./bulkInsert.php">Import CSV</a>
            </div>
            
            <div class="row">
                <div class="col-xs-6 col-md-3">
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Search" name="textSearch" />
                    <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="search">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </div>
                </div>
                </div>
            </div>
            
        </div>
        <div class="container">
            <?php if(isset($_SESSION['email'])) require_once './displayUsers.php'; ?>
        </div>
        <!-- </form> -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#limit').change(function(){
                    $('form').submit();
                });
            });

            $(document).ready(function(){
                $('#select_all').on('click',function(){
                if(this.checked){
                    $('.checkbox').each(function(){
                        this.checked = true;
                    });
                }else{
                    $('.checkbox').each(function(){
                        this.checked = false;
                    });
                }
                });

                $('.checkbox').on('click',function(){
                    if($('.checkbox:checked').length == $('.checkbox').length){
                        $('#select_all').prop('checked',true);
                    }else{
                        $('#select_all').prop('checked',false);
                    }
                });
             });
        </script>
        </form>
    </body>
</html>