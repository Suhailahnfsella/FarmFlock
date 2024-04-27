<?php
include_once '../Config/database.php';
include_once '../Model/KecamatanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getKecamatanById' && isset($_GET['id_kecamatan'])) {
        $conn = get_connection();
    
        $id_kecamatan = $_GET['id_kecamatan'];
    
        $kecamatanModel = new KecamatanModel($conn);
        $kecamatanData = $kecamatanModel->getKecamatanById($id_kecamatan);
    
        echo json_encode($kecamatanData);
    }
}
?>
