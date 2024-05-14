<?php

require 'admin/include/connect.php';

$step = 1;


if (isset($_POST['email']) && $_POST['password']) {
    $sql = "SELECT user_password ,user_mail FROM table_user WHERE user_mail = :mail";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("mail", $_POST['email']);
    $stmt->execute();
    $response = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifie si des résultats ont été retournés
    if ($response) {
        // vérifie  si existe dans la bdd et compare avec les mots de passes hashés avec password_hash('', PASSWORD_DEFAULT);
        if (password_verify($_POST['password'], $response['user_password'])) {
            $step = 2;
            var_dump($_POST["email"], $_POST['password']);
        } else {
            // mauvais identifiants / mdp
            $step = 3;
        }
    } else {
        // n'existe pas dans la bdd
        $step = 4;
        var_dump($_POST["email"], $_POST['password']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/indexstyle.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>ADMIN</h1>
        </div>
        <div class="formulaire">
            <?php if ($step == 1) { ?>
                <form action="index.php" method="POST">
                    <label for="email"></label>
                    <input type="email" placeholder="ex : a@a.com" name="email" class="input">
                    </br>
                    <label for="password"></label>
                    <input type="password" name="password" placeholder="******" class="input">
                    </br>
                    <label for="send"></label>
                    <button type="submit" value="ok" name="send" id="buttonformu">Se connecter</button>
                    <div class="bodyfooter">
                        <a href="">Mot de passe oublié ?</a>
                    </div>
                </form>

            <?php } ?>

            <?php if ($step == 2) { ?>
                <h1>CONNECTED</h1>
            <?php } ?>

            <?php if ($step == 3) { ?>
                <h1>WRONG PASSWORD/USER_MAIL</h1>
            <?php } ?>

            <?php if ($step == 4) { ?>
                <h1>User not found</h1>
            <?php } ?>
        </div>

    </div>
    <footer></footer>
</body>

</html>