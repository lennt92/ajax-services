<?php
/**
 * Created by PhpStorm.
 * User: Valentine
 * Date: 27.02.2017
 * Time: 15:30
 */
define ('__ROOT__', $_SERVER['DOCUMENT_ROOT']);
 require_once(__ROOT__.'/ajax-services/db.php');

if (isset($_GET['id'])) {
    #$var = $_GET['id'];

    $stmt = $pdo->prepare("SELECT service_name, adress, time_work, phone_number, more_info, cities.city FROM service_partner, cities WHERE cities.id = ? AND cities.id = service_partner.city");
    #$stmt->bindParam(1, $var);
    $stmt->execute(array($_GET['id']));
    #$stmt = $pdo->query("SELECT * FROM service_partner WHERE id = $var");
    $row = $stmt->fetchAll();

    echo json_encode($row);
}