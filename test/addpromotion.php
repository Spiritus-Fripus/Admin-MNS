<?php

require '../admin/include/connect.php';
require '../admin/include/verify.php';




//AJOUT PROMOTION 
$sql = "SELECT * FROM table_formation";
$stmt = $db->prepare($sql);
$stmt->execute();
$recordset = $stmt->fetchAll();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['formation_id'])) {
    try {
        $sql = 'INSERT INTO table_promotion (promotion_name, promotion_year, formation_id) VALUES (:promotion_name, :promotion_year, :formation_id)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':promotion_name', $_POST['promotion_name']);
        $stmt->bindValue(':promotion_year', $_POST['promotion_year']);
        $stmt->bindValue(':formation_id', $_POST['formation_id']);
        $stmt->execute();
        echo "Promotion ajoutée avec succès !";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de la formation : " . $e->getMessage();
    }
}
//AJOUT PROMOTION

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
            <select name="formation_id" id="formationid">
                <?php foreach ($recordset as $row) { ?>
                    <option value="<?= $row['formation_id'] ?>"><?= $row['formation_name'] ?></option>
                <?php } ?>
            </select>

            <label for="promotion_name">Nom de la promotion</label>
            <input type="text" name="promotion_name" />

            <label for="promotion_year">Année de la formation</label>
            <input type="text" name="promotion_year" />

            <input class="bouton" type="submit" value="Enregistrer" />
        </form>
    </div>
</body>

</html>