<?php
include_once __DIR__ . '/includes/config.php';
header('Content-Type: application/json');

if(isset($_GET['date'])) {
    $creneaux = getCreneauxDisponibles($_GET['date']);
    echo json_encode($creneaux);
} else {
    echo json_encode([]);
}