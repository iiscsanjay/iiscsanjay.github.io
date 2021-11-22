<?php
    $dsn = 'mysql:host=webdb.cgae1wu7ahk9.us-east-2.rds.amazonaws.com;dbname=webdb;port=3306';
    $username = 'admin';
    $password = 'fireISout3473';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
