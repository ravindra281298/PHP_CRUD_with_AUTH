<?php

    $sql = $conn->prepare("SELECT * FROM users ");
    $sql->execute();
    $result = $sql->fetchAll();

?>

<div class="container well">
    <table class="table " id="table">
        <thead>
            <th><input style="outline: 0.5px solid"type="checkbox" id="select_all" value=""/></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Date of Birth</th>
            <th>Action</th>
        </thead>
        <?php if(count($result) < 1): ?>
                <tr>
                <td>No data here</td>
                </tr>
        <?php else:
            foreach($result as $row): ?>
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