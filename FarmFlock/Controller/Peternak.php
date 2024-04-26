<?php
include_once '../config/database.php';
include_once '../model/PeternakModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getPeternakById' && isset($_GET['id_peternak'])) {
        $conn = get_connection();
    
        $id_peternak = $_GET['id_peternak'];
    
        $peternakModel = new PeternakModel($conn);
        $peternakData = $peternakModel->getPeternakById($id_peternak);
    
        echo json_encode($peternakData);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getAllPeternak') {
        $conn = get_connection();
    
        $peternakModel = new PeternakModel($conn);
        $peternakData = $peternakModel->getAllPeternak();
    
        echo json_encode($peternakData);
    }
}
?>
