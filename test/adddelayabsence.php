<?php
//code pour ajouter une formation depuis le côté admin

require '../admin/include/connect.php';
require '../admin/include/verify.php';

if (isset($_POST['formation_name']) && isset($_POST['formation_duration'])) {
    $sql = 'INSERT INTO table_formation (formation_name, formation_duration, formation_date_start, formation_date_end, formation_max_student, formation_qualification) VALUES (:formation_name, :formation_duration, :formation_date_start, :formation_date_end, :formation_max_student, :formation_qualification)';
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':formation_name' => $_POST['formation_name'],
        ':formation_duration' => $_POST['formation_duration'], ':formation_date_start' => $_POST['formation_date_start'], ':formation_date_end' => $_POST['formation_date_end'],
        ':formation_max_student' => $_POST['formation_max_student'], ':formation_qualification' => $_POST['formation_qualification']
    ]);
}

//code pour ajouter un retard ou une absence à un élève
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter un retard ou une absence</title>
</head>

<body>
    <div class="container"></div>
</body>

</html>