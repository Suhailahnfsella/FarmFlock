<?php
include_once '../config/database.php';
include_once '../model/KecamatanModel.php';

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
