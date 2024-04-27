<?php
include_once '../Config/database.php';
include_once '../Model/JenisPelatihanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getAllJenisPelatihan') {
        $pelatihanModel = new JenisPelatihanModel($conn);
        $pelatihanData = $pelatihanModel->getAllJenisPelatihan();
    
        echo json_encode($pelatihanData);
    }

    if ($_GET['action'] === 'getJenisPelatihanById' && isset($_GET['id_jenis_pelatihan'])) {
        $idJenisPelatihan = $_GET['id_jenis_pelatihan'];

        $pelatihanModel = new JenisPelatihanModel($conn);
        $pelatihanData = $pelatihanModel->getJenisPelatihanById($idJenisPelatihan);
    
        echo json_encode($pelatihanData);
    }

} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    // Cek jika aksi adalah menambahkan pengajuan baru
    if ($_POST['action'] === 'addJenisPelatihanBaru') {
        // Periksa apakah data yang diperlukan tersedia
        if (
            isset($_POST['jenispelatihanbaru'])
        ) {
            // Ambil data dari form
            $jenispelatihanbaru = $_POST['jenispelatihanbaru'];

            // Buat objek model
            $pelatihanModel = new JenisPelatihanModel($conn);

            // Panggil fungsi untuk menambahkan pengajuan baru
            $result = $pelatihanModel->addJenisPelatihanBaru($jenispelatihanbaru);
        }
    }
}
?>
