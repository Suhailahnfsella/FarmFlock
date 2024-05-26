<?php
include_once '../Config/database.php';
include_once '../Model/JenisHewanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getJenisHewanByIdHewan' && isset($_GET['id_hewan'])) {
        $conn = get_connection();
    
        $id_hewan = $_GET['id_hewan'];
    
        $jenisHewanModel = new JenisHewanModel($conn);
        $jenisHewanData = $jenisHewanModel->getJenisHewanByIdHewan($id_hewan);
    
        echo json_encode($jenisHewanData);
    }

    if ($_GET['action'] === 'getJenisHewanById' && isset($_GET['idJenisHewan'])) {
        $conn = get_connection();
    
        $idJenisHewan = $_GET['idJenisHewan'];
    
        $jenisHewanModel = new JenisHewanModel($conn);
        $jenisHewanData = $jenisHewanModel->getJenisHewanById($idJenisHewan);
    
        echo json_encode($jenisHewanData);
    }

} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    if ($_POST['action'] === 'addJenisHewanBaru') {
        if (
            isset($_POST['id_hewan']) &&
            isset($_POST['jenis_hewan']) 
        ) {
            $id_hewan = $_POST['id_hewan'];
            $jenis_hewan = $_POST['jenis_hewan'];

            $jenisHewanModel = new JenisHewanModel($conn);

            $result = $jenisHewanModel->addJenisHewanBaru($id_hewan, $jenis_hewan);
        }
    }
}
?>
