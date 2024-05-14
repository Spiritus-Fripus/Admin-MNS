<?php
require 'include/connect.php';

$sql = "SELECT * FROM table_user LIMIT 10";
$stmt = $db->prepare($sql);
$stmt->execute();
$recordset = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN SIDE</title>
</head>

<body>
    <div class="container">
        <ul>name
            <?php foreach ($recordset as $row) { ?>
                <li><?= $row['user_name'] ?></li>
            <?php } ?>
        </ul>
    </div>
    <div class="container"></div>
    <div class="container"></div>
</body>

</html>