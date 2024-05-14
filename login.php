

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login adminmns</title>
</head>

<body>
    <?php if ($step == 1) { ?>
        <form action="login.php" method="POST">
            <label for="email">E-mail</label>
            <input type="email" placeholder="ex : a@a.com" name="email">
            </br>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="******">
            </br>
            <label for="send"></label>
            <button type="submit" value="ok" name="send">Envoyer</button>
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

</body>

</html>