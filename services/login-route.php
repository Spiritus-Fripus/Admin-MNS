<?php

function connectRoute()
{
    include './admin/include/connect.php';

    if (isset($_POST['email']) && $_POST['password']) {

        $sql = "SELECT user_password ,user_mail, user_type_id FROM table_user WHERE user_mail = :mail";
        $stmt = $db->prepare($sql);
        $stmt->bindValue("mail", $_POST['email']);
        $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si des résultats ont été retournés
        if ($response) {
            // vérifie si existe dans la bdd et compare avec les mots de passes hashés avec password_hash('', PASSWORD_DEFAULT);
            if (password_verify($_POST['password'], $response['user_password'])) {
                switch ($response['user_type_id']) {
                    case 1:
                        $type_user = 'admin';
                        header('Location: /admin/index.php');
                        break;
                    case 2:
                        $type_user = 'teacher';
                        header('Location: /user/teacher/index.php');
                        break;
                    case 3:
                        $type_user = 'student';
                        header('Location: /user/student/index.php');
                        break;
                }
                session_start();
                $_SESSION['user_type'] = $type_user;
                var_dump($_SESSION);
            }
        }
    }
}

function adminConnected()
{
    include '../admin/include/connect.php';

    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
        header('Location: /login.php');
        exit();
    }

    $sql = "SELECT * FROM table_user WHERE user_mail = :user_mail";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":user_mail", $_SESSION['user_mail']);
    $stmt->execute();
    $recordset = $stmt->fetchAll();

    return $recordset;
}
