<?php
include_once '../Config/database.php';
include_once '../Model/DesaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getDesaById' && isset($_GET['id_desa'])) {
        $conn = get_connection();
    
        $id_desa = $_GET['id_desa'];
    
        $desaModel = new desaModel($conn);
        $desaData = $desaModel->getDesaById($id_desa);
    
        echo json_encode($desaData);
    }

    if ($_GET['action'] === 'getDesaByKecamatanId' && isset($_GET['id_kecamatan'])) {
        $conn = get_connection();
    
        $idKecamatan = $_GET['id_kecamatan'];
    
        $desaModel = new desaModel($conn);
        $desaData = $desaModel->getDesaByKecamatanId($idKecamatan);
    
        echo json_encode($desaData);
    }
}
?>
