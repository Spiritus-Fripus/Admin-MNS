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
            <label for="formation_name">Nom de la formation</label>
            <input type="text" name="formation_name" />

            <label for="formation_duration">Durée de la formation</label>
            <input type="text" name="formation_duration" />

            <label for="formation_date_start">Date de début de la formation</label>
            <input type="date" name="formation_date_start" />

            <label for="formation_date_end">Date de fin de la formation</label>
            <input type="date" name="formation_date_end" />

            <label for="formation_max_student">Nombre maximal d'élèves</label>
            <input type="number" name="formation_max_student" />

            <select name="formation_qualification">
                <option value="1">Bac+1</option>
                <option value="2">Bac+2</option>
                <option value="3">Bac+3</option>
                <option value="5">Bac+5</option>
            </select>
            <select name="formation_type_id">
                <option value="1">Développement</option>
                <option value="2">Cybersécurité</option>
                <option value="3">Marketing</option>
                <option value="4">Réseau</option>
            </select>
            <input class="bouton" type="submit" value="Enregistrer" />
        </form>
    </div>
</body>

</html>