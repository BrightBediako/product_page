<?php 
    // Development Connection
    $host = '127.0.0.1';
    $db = 'product_page';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    // live connection
    // $host = 'localhost';
    // $db = 'id19539263_product_page';
    // $user = 'id19539263_scandiweb';
    // $pass = 'sC]$\cp6zP?\+VWD';
    // $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
?>