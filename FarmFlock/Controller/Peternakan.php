<?php
include_once '../Config/database.php';
include_once '../Model/PeternakanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getPeternakanById' && isset($_GET['id_peternak'])) {
        $conn = get_connection();
    
        $id_peternak = $_GET['id_peternak'];
    
        $peternakanModel = new PeternakanModel($conn);
        $peternakanData = $peternakanModel->getPeternakanById($id_peternak);
    
        echo json_encode($peternakanData);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    if ($_POST['action'] === 'updatePeternakan') {
        $idPeternak = $_POST['id_peternak'];
        $namaPeternakan = $_POST['nama_peternakan'];
        $jalanPeternakan = $_POST['jalan_peternakan'];
        $idDesa = $_POST['id_desa'];
    
        $peternakanModel = new PeternakanModel($conn);
    
        // Cek apakah data peternakan dengan id_peternak ada
        $existingPeternakan = $peternakanModel->getPeternakanByIdPeternak($idPeternak);
    
        if ($existingPeternakan) {
            // Update data peternakan
            $result = $peternakanModel->updatePeternakan($idPeternak, $namaPeternakan, $jalanPeternakan, $idDesa);
            if ($result) {
                echo json_encode('Data peternakan berhasil diperbarui');
            } else {
                echo json_encode('Gagal memperbarui data peternakan');
            }
        } else {
            // Insert data peternakan baru
            $result = $peternakanModel->insertPeternakan($idPeternak, $namaPeternakan, $jalanPeternakan, $idDesa);
            if ($result) {
                echo json_encode('Data peternakan baru berhasil ditambahkan');
            } else {
                echo json_encode('Gagal menambahkan data peternakan baru');
            }
        }
    }
    
}
?>
