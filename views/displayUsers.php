<?php
    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    //Getting users in limit
    $users = $mysqli->query("SELECT * from users LIMIT $start, $limit") or die($mysqli->error);
    // $user = $users->fetch_all(MYSQLI_ASSOC);

    //Getting total No. of pages.
    $result = $mysqli->query("SELECT count(id) AS id FROM users");
    $userCount = $result->fetch_all(MYSQLI_ASSOC);
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
    </div>
    <table class="table ">
        <thead>
            <th></th>
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
                <td><input type="checkbox" name='delete[]' value='<?= $row['id']?>'></td>
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