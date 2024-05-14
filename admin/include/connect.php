<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=adminmns;charset=utf8', 'root', '');
} catch (PDOexception $e) {
    die($e->getMessage());
}
