<?php
include_once '../Config/database.php';
include_once '../Model/PeternakModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getPeternakById' && isset($_GET['id_peternak'])) {
        $id_peternak = $_GET['id_peternak'];
    
        $peternakModel = new PeternakModel($conn);
        $peternakData = $peternakModel->getPeternakById($id_peternak);
    
        echo json_encode($peternakData);
    }

    if ($_GET['action'] === 'getAllPeternak') {
        $peternakModel = new PeternakModel($conn);
        $peternakData = $peternakModel->getAllPeternak();
    
        echo json_encode($peternakData);
    }
}
?>
