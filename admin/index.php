<?php

require_once './include/connect.php';
require_once '../services/login-route.php';

session_start();
var_dump($_SESSION);

$recordset = adminConnected();

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
        <?php foreach ($recordset as $row) { ?>
            <h1>Bienvenue votre page <?= $row['user_name'] ?>!</h1>
            <ul>
                <li> id : <?= $row['user_id'] ?></li>
                <li> name : <?= $row['user_name'] ?></li>
                <li> firstname : <?= $row['user_firstname'] ?></li>
                <li> mail : <?= $row['user_mail'] ?></li>
                <li> birthday : <?= $row['user_birthday_date'] ?></li>
            </ul>
        <?php } ?>
    </div>
    <div class="container"></div>
    <div class="container"></div>
</body>

</html>