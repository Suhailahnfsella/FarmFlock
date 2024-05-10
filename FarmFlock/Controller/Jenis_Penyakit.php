<?php
include_once '../Config/database.php';
include_once '../Model/JenisPenyakitModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getAllJenisPenyakit') {
        $penyakitModel = new JenisPenyakitModel($conn);
        $penyakitData = $penyakitModel->getAllJenisPenyakit();
    
        echo json_encode($penyakitData);
    } 
    
    if ($_GET['action'] === 'getJenisPenyakitById' && isset($_GET['id_jenis_penyakit'])) {
        $idJenisPenyakit = $_GET['id_jenis_penyakit'];

        $penyakitModel = new JenisPenyakitModel($conn);
        $penyakitData = $penyakitModel->getJenisPenyakitById($idJenisPenyakit);
    
        echo json_encode($penyakitData);
    }
    
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    // Cek jika aksi adalah menambahkan pengajuan baru
    if ($_POST['action'] === 'addPenyakitBaru') {
        // Periksa apakah data yang diperlukan tersedia
        if (
            isset($_POST['penyakit_baru'])
        ) {
            // Ambil data dari form
            $penyakit_baru = $_POST['penyakit_baru'];

            // Buat objek model
            $penyakitModel = new JenisPenyakitModel($conn);

            // Panggil fungsi untuk menambahkan pengajuan baru
            $result = $penyakitModel->addPenyakitBaru($penyakit_baru);
        }
    }
}
?>
