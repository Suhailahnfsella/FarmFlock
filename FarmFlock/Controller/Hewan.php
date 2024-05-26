<?php
include_once '../Config/database.php';
include_once '../Model/HewanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getAllHewan') {
        $conn = get_connection();
    
        $hewanModel = new HewanModel($conn);
        $hewanData = $hewanModel->getAllHewan();
    
        echo json_encode($hewanData);
    }

    if ($_GET['action'] === 'getDataHewanById' && isset($_GET['idHewan'])) {
        $conn = get_connection();
    
        $idHewan = $_GET['idHewan'];
    
        $hewanModel = new HewanModel($conn);
        $hewanData = $hewanModel->getDataHewanById($idHewan);
    
        echo json_encode($hewanData);
    }
}
?>
