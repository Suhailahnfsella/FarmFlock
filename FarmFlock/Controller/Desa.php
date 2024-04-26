<?php
include_once '../config/database.php';
include_once '../model/DesaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getDesaById' && isset($_GET['id_desa'])) {
        $conn = get_connection();
    
        $id_desa = $_GET['id_desa'];
    
        $desaModel = new desaModel($conn);
        $desaData = $desaModel->getDesaById($id_desa);
    
        echo json_encode($desaData);
    }
}
?>
