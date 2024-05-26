<?php
include_once '../Config/database.php';
include_once '../Model/HewanPeternakanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getHewanPeternakanByIdPeternakan' && isset($_GET['idPeternakan'])) {
        $idPeternakan = $_GET['idPeternakan'];

        $hewanPeternakanModel = new HewanPeternakanModel($conn);
        $hewanPeternakanData = $hewanPeternakanModel->getHewanPeternakanByIdPeternakan($idPeternakan);
    
        echo json_encode($hewanPeternakanData);
    }

    if ($_GET['action'] === 'checkHewanPeternakan' && isset($_GET['id_peternakan']) && isset($_GET['id_jenis_hewan'])) {
        $id_peternakan = $_GET['id_peternakan'];
        $id_jenis_hewan = $_GET['id_jenis_hewan'];

        $hewanPeternakanModel = new HewanPeternakanModel($conn);
        $hewanPeternakanData = $hewanPeternakanModel->checkHewanPeternakan($id_peternakan, $id_jenis_hewan);
    
        echo json_encode($hewanPeternakanData);
    }

    if ($_GET['action'] === 'getJumlahJenisHewan') {
        $hewanPeternakanModel = new HewanPeternakanModel($conn);
        $hewanPeternakanData = $hewanPeternakanModel->getJumlahJenisHewan();
    
        echo json_encode($hewanPeternakanData);
    }
    
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    if ($_POST['action'] === 'addHewanPeternakan') {
        if (
            isset($_POST['id_peternakan']) &&
            isset($_POST['id_jenis_hewan']) &&
            isset($_POST['jumlah']) 
        ) {
            $id_peternakan = $_POST['id_peternakan'];
            $id_jenis_hewan = $_POST['id_jenis_hewan'];
            $jumlah = $_POST['jumlah'];

            $hewanPeternakanModel = new HewanPeternakanModel($conn);

            $result = $hewanPeternakanModel->addHewanPeternakan($id_peternakan, $id_jenis_hewan, $jumlah);
        }
    }

    if ($_POST['action'] === 'updateHewanPeternakan') {
        if (
            isset($_POST['id_peternakan']) &&
            isset($_POST['id_jenis_hewan']) &&
            isset($_POST['jumlah']) 
        ) {
            $id_peternakan = $_POST['id_peternakan'];
            $id_jenis_hewan = $_POST['id_jenis_hewan'];
            $jumlah = $_POST['jumlah'];

            $hewanPeternakanModel = new HewanPeternakanModel($conn);

            $result = $hewanPeternakanModel->updateHewanPeternakan($id_peternakan, $id_jenis_hewan, $jumlah);
        }
    }
}
?>
