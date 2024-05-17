<?php

require_once './include/connect.php';
require_once '../services/login-route.php';

session_start();
$recordset = userConnected();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN SIDE</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/css/index-style.css">
    <!-- Ubuntu font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="grid-container">

        <!-- Header  -->
        <header class="header">
            <div class="header-l">
                <form action="" class="form-search">
                    <input id="search-bar" type="search" placeholder="Recherche">
                    <button type="submit">
                        <span class="material-symbols-rounded">
                            search
                        </span>
                    </button>
                </form>
            </div>
            <div class="header-r">
                <span class="material-symbols-rounded">
                    notifications
                </span>
                <span class="material-symbols-rounded">
                    shield_person
                </span>
            </div>
        </header>
        <!-- Header  -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="logo">
                <img src="/img/carlos.png" alt="logo">
                <h1>Admin MNS</h1>
            </div>
            <ul>
                <li>Accueil</li>
                <li>Classes</li>
                <li>Absences</li>
                <li>Retards</li>
            </ul>
        </aside>
        <!-- Sidebar -->

        <!-- Main -->
        <main class="main-container">
            <?php foreach ($recordset as $row) { ?>
                <div class="welcome">
                    <h1>Bonjour , <?= $row['user_name'] ?> </h1>
                </div>
                <h2>Information de l'utilisateur:</h2>
                <hr>
                <ul>
                    <li> id : <?= $row['user_id'] ?></li>
                    <li> name : <?= $row['user_name'] ?></li>
                    <li> firstname : <?= $row['user_firstname'] ?></li>
                    <li> mail : <?= $row['user_mail'] ?></li>
                    <li> birthday : <?= $row['user_birthday_date'] ?></li>
                </ul>
                <hr>
            <?php } ?>
        </main>
        <!-- Main -->

    </div>
</body>

</html>