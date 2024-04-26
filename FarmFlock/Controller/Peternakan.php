<?php
include_once '../config/database.php';
include_once '../model/PeternakanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getPeternakanById' && isset($_GET['id_peternak'])) {
        $conn = get_connection();
    
        $id_peternak = $_GET['id_peternak'];
    
        $peternakanModel = new PeternakanModel($conn);
        $peternakanData = $peternakanModel->getPeternakanById($id_peternak);
    
        echo json_encode($peternakanData);
    }
}
?>
