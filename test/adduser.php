<?php

require '../admin/include/connect.php';

if (isset($_POST['user_name']) && ($_POST['user_name']) != "") {
    $sql = "INSERT INTO table_user (user_name, user_firstname, user_mail, user_phonenumber, user_birthday_date, user_gender, user_type_id) VALUES (:user_name, :user_firstname, :user_mail, :user_phonenumber, :user_birthday_date, :user_gender, :user_type_id)";
    $stmt = $db->prepare($sql);

    //on regarde quel type de user doit être créé grâce au switch et à la valeur envoyée par le select du formulaire
    switch ($_POST['user_type_id']) {
        case "admin":
            $usertypeid = 1;
            break;
        case "user":
            $usertypeid = 3;
            break;
        case "teacher":
            $usertypeid = 2;
            break;
    }

    $stmt->bindValue(":user_name", $_POST['user_name']);
    $stmt->bindValue(":user_firstname", $_POST['user_firstname']);
    $stmt->bindValue(":user_mail", $_POST['user_mail']);
    $stmt->bindValue(":user_phonenumber", $_POST['user_phonenumber']);
    $stmt->bindValue(":user_gender", $_POST['user_gender']);
    $stmt->bindValue(":user_birthday_date", $_POST['user_birthday_date']);
    $stmt->bindValue(":user_type_id", $usertypeid);
    $stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adduser</title>
</head>

<body>
    <div class="container">
        <form action="adduser.php" method="post">
            <label for="user_name">Nom de l'élève</label>
            <input type="text" name="user_name">
            <label for="user_firstname">Prénom de l'élève</label>
            <input type="text" name="user_firstname">
            <label for="user_phonenumber">Numéro de téléphone de l'élève</label>
            <input type="text" name="user_phonenumber">
            <label for="user_mail">Mail de l'élève</label>
            <input type="text" name="user_mail">
            <label for="user_birthday_date">Date d'anniversaire de l'élève</label>
            <input type="date" name="user_birthday_date">
            <label for="user_gender">Genre de l'élève</label>
            <input type="text" name="user_gender">
            <select name="user_type_id">
                <option value="admin">Administrateur</option>
                <option value="user">Elève</option>
                <option value="teacher">Professeur</option>
            </select>
            <input class="bouton" type="submit" value="Enregistrer">
        </form>
    </div>
</body>

</html>