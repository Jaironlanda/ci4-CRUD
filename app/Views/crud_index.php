<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    CRUD in codeingniter 4
    <br>
    <?php
        foreach ($data as $row) {
            echo $row['name'] . '<br>';
            echo $row['email'] . '<br>';
            echo $row['address'] . '<br>';
            echo '<a href="edit/'.$row['user_id'].'">Edit</a><br>';
            echo '<a href="delete/'.$row['user_id'].'">Delete</a><br>';
            echo '<br>';
        }
        // print_r($data);
    ?>
</body>
</html>