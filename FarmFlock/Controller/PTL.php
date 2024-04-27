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
}
?>
