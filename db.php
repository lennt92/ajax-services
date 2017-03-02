<?php
/**
 * Created by PhpStorm.
 * User: Valentine
 * Date: 01.03.2017
 * Time: 14:50
 */
$dsn = "mysql:host=localhost; dbname=******;";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);


try {
    $pdo = new PDO($dsn, 'root', '*******', $opt);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}