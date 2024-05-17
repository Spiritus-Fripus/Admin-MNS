<?php

require '../admin/include/connect.php';
require '../admin/include/verify.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = 'INSERT INTO table_formation (formation_type_id, formation_name, formation_duration, formation_date_start, formation_date_end, formation_max_student, formation_qualification) VALUES (:formation_type_id, :formation_name, :formation_duration, :formation_date_start, :formation_date_end, :formation_max_student, :formation_qualification)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':formation_type_id', $_POST['formation_type_id']);
        $stmt->bindValue(':formation_name', $_POST['formation_name']);
        $stmt->bindValue(':formation_duration', $_POST['formation_duration']);
        $stmt->bindValue(':formation_date_start', $_POST['formation_date_start']);
        $stmt->bindValue(':formation_date_end', $_POST['formation_date_end']);
        $stmt->bindValue(':formation_max_student', $_POST['formation_max_student']);
        $stmt->bindValue(':formation_qualification', $_POST['formation_qualification']);
        $stmt->execute();
        echo "Formation ajoutée avec succès !";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de la formation : " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="addformation.php" method="post">
            <label for="promotion_name">Nom de la promotion</label>
            <input type="text" name="promotion_name" />

            <label for="promotion_year">Année de la formation</label>
            <input type="text" name="promotion_year" />

            <input class="bouton" type="submit" value="Enregistrer" />
        </form>
    </div>
</body>

</html>