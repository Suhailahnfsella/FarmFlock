<?php
include_once '../Config/database.php';
include_once '../Model/TingkatKeparahanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getAllTingkatKeparahan') {
        $keparahanModel = new TingkatKeparahanModel($conn);
        $keparahanData = $keparahanModel->getAllTingkatKeparahan();
    
        echo json_encode($keparahanData);
    }
}
?>
