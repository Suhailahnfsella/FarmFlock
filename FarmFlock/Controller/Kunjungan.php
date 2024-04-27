<?php
include_once '../Config/database.php';
include_once '../Model/KunjunganModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getAllKunjungan') {
        $kunjunganModel = new KunjunganModel($conn);
        $kunjunganData = $kunjunganModel->getAllKunjungan();
    
        echo json_encode($kunjunganData);
    }

    if ($_GET['action'] === 'getKunjunganByIdPtl' && isset($_GET['id_ptl'])) {
        $idPtl = $_GET['id_ptl'];

        $kunjunganModel = new KunjunganModel($conn);
        $kunjunganData = $kunjunganModel->getKunjunganByIdPtl($idPtl);
    
        echo json_encode($kunjunganData);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    // Cek jika aksi adalah menambahkan pengajuan baru
    if ($_POST['action'] === 'addKunjungan') {
        // Periksa apakah data yang diperlukan tersedia
        if (
            isset($_POST['id_jenis_penyakit']) && 
            isset($_POST['id_tingkat_keparahan']) && 
            isset($_POST['id_ptl']) && 
            isset($_POST['id_status_berjalan']) && 
            isset($_POST['id_pengajuan'])
        ) {
            $id_jenis_penyakit = $_POST['id_jenis_penyakit'];
            $id_tingkat_keparahan = $_POST['id_tingkat_keparahan'];
            $id_ptl = $_POST['id_ptl'];
            $id_status_berjalan = $_POST['id_status_berjalan'];
            $id_pengajuan = $_POST['id_pengajuan'];

            // Buat objek model
            $kunjunganModel = new KunjunganModel($conn);

            // Panggil fungsi untuk menambahkan pengajuan baru
            $result = $kunjunganModel->addKunjungan($id_jenis_penyakit, $id_tingkat_keparahan, $id_ptl, $id_status_berjalan, $id_pengajuan);
        }
    }
}
?>
