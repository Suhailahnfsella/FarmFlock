<?php
include_once '../Config/database.php';
include_once '../Model/PTLModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getAllPTL') {
        $ptlModel = new PTLModel($conn);
        $ptlData = $ptlModel->getAllPTL();
    
        echo json_encode($ptlData);
    }

    if ($_GET['action'] === 'getPTLById' && isset($_GET['id_ptl'])) {
        $id_ptl = $_GET['id_ptl'];
    
        $ptlModel = new PTLModel($conn);
        $ptlData = $ptlModel->getPTLById($id_ptl);
    
        echo json_encode($ptlData);
    }
}
?>
