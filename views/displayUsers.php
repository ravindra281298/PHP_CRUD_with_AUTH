<?php
    $_SESSION['limit'] = isset($_SESSION['limit']) ? $_SESSION['limit'] : 10;
    $_SESSION['limit'] = isset($_POST['limit']) ? $_POST['limit'] : $_SESSION['limit'];
    $limit = isset($_SESSION['limit']) ? $_SESSION['limit'] : 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    //Getting users in limit
    $user = null;
    $userCount = null;
    $total = null;

    if(isset($_SESSION['search']) && strlen($_SESSION['search'])>0 ) {
        $text = $_SESSION['search'];
        $sql = $conn->prepare("SELECT * FROM users WHERE first_name LIKE '%$text%' OR last_name LIKE '%$text%' OR
                                  gender LIKE '%$text%' OR country LIKE '%$text%' LIMIT $start, $limit");
        $sql->execute();
        $user = $sql->fetchAll();

        //Getting total No. of pages.
        $result = $conn->prepare("SELECT count(id) AS id  FROM users WHERE first_name LIKE '%$text%' OR last_name LIKE '%$text%' OR
                                gender LIKE '%$text%' OR country LIKE '%$text%' ");
        $result->execute();
        $userCount = $result->fetchAll();
    }
    else {

        if(isset($_SESSION['search'])){
            unset($_SESSION['search']);
        }

        $sql = $conn->prepare("SELECT * from users LIMIT $start, $limit");
        $sql->execute();
        $user = $sql->fetchAll();

        //Getting total No. of pages.
        $result = $conn->prepare("SELECT count(id) AS id FROM users");
        $result->execute();
        $userCount = $result->fetchAll();
    }

    $total = $userCount[0]['id'];
    $pages = ceil( $total / $limit);

    $previous = $page - 1;
    $next = $page + 1;

?>
<div class="container well">
    <div class="row">
        <div class="col-md-10">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                <li>
                    <?php if($previous == 0): ?>
                    <a class="btn disabled" href="index.php?page=<?= $previous; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;Previous</span>
                    </a>
                    <?php else: ?>
                    <a href="index.php?page=<?= $previous; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;Previous</span>
                    </a>
                    <?php endif; ?>
                </li>
                <?php for($page = 1; $page <=$pages; $page++): ?>
                <li><a href="index.php?page=<?= $page; ?>"><?= $page; ?></a></li>
                <?php endfor; ?>
                <li>
                    <?php if($next >= $pages + 1): ?>
                    <a class="btn disabled" href="index.php?page=<?= $next; ?>" aria-label="Next">
                        <span aria-hidden="true">Next &raquo;</span>
                    </a>
                    <?php else: ?>
                    <a href="index.php?page=<?= $next; ?>" aria-label="Next">
                        <span aria-hidden="true">Next &raquo;</span>
                    </a>
                    <?php endif; ?>
                </li>
                </ul>
            </nav>
        </div>
        <div class="text-center" style="margin-top: 20px" class="col-md-2">
            <form class="" method="post" action="#">
                        <select name="limit" id="limit">
                        <option disabled="disabled" selected="selected">Limit Record</option>
                        <?php foreach([10,25,100,500] as $limit): ?>
                        <option <?php if( isset($_SESSION['limit']) && $_SESSION['limit'] == $limit ) echo "selected" ?> values="<?= $limit; ?>"><?= $limit; ?></option>
                        <?php endforeach; ?>
                        </select>
            </form>
        </div>
    </div>
    <table class="table ">
        <thead>
            <th><input style="outline: 0.5px solid"type="checkbox" id="select_all" value=""/></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Date of Birth</th>
            <th>Action</th>
        </thead>
        <?php if(count($user) < 1): ?>
                <tr>
                <td>No data here</td>
                </tr>
        <?php else:
            foreach($user as $row): ?>
            <tr>
                <td><input type="checkbox" name='delete[]' class="checkbox" value='<?php echo $row['id']; ?>' /></td>
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
            <?php endforeach; endif; ?>
    </table>
</div>