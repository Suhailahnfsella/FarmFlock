<?php
include_once '../Config/database.php';
include_once '../Model/KunjunganModel.php';
include_once '../Model/PengajuanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getAllKunjungan') {
        $kunjunganModel = new KunjunganModel($conn);
        $kunjunganData = $kunjunganModel->getAllKunjungan();
    
        echo json_encode($kunjunganData);
    }

    if ($_GET['action'] === 'getPenyakitData') {
        $kunjunganModel = new KunjunganModel($conn);
        $kunjunganData = $kunjunganModel->getPenyakitData();
    
        echo json_encode($kunjunganData);
    }

    if ($_GET['action'] === 'getJumlahKunjungan') {
        $kunjunganModel = new KunjunganModel($conn);
        $kunjunganData = $kunjunganModel->getJumlahKunjungan();
    
        echo json_encode($kunjunganData);
    }

    if ($_GET['action'] === 'getJumlahKunjunganPTL') {
        $idPtl = $_GET['id_ptl'];

        $kunjunganModel = new KunjunganModel($conn);
        $kunjunganData = $kunjunganModel->getJumlahKunjunganPTL($idPtl);
    
        echo json_encode($kunjunganData);
    }

    if ($_GET['action'] === 'getKunjunganByIdPtl' && isset($_GET['id_ptl'])) {
        $idPtl = $_GET['id_ptl'];

        $kunjunganModel = new KunjunganModel($conn);
        $kunjunganData = $kunjunganModel->getKunjunganByIdPtl($idPtl);
    
        echo json_encode($kunjunganData);
    }

    if ($_GET['action'] === 'getKunjunganByIdPtlIdStatusBerjalan' && isset($_GET['id_ptl']) && isset($_GET['id_status_berjalan'])) {
        $idPtl = $_GET['id_ptl'];
        $idStatusBerjalan = $_GET['id_status_berjalan'];

        $kunjunganModel = new KunjunganModel($conn);
        $kunjunganData = $kunjunganModel->getKunjunganByIdPtlIdStatusBerjalan($idPtl, $idStatusBerjalan);
    
        echo json_encode($kunjunganData);
    }

    if ($_GET['action'] === 'getKunjunganByIdStatusBerjalanIdPeternak' && isset($_GET['id_peternak']) && isset($_GET['id_status_berjalan'])) {
        $idPeternak = $_GET['id_peternak'];
        $idStatusBerjalan = $_GET['id_status_berjalan'];

        $pengajuanModel = new PengajuanModel($conn);
        $pengajuanData = $pengajuanModel->getIdPengajuanByIdPeternak($idPeternak);

        $pengajuanData = array_map('intval', $pengajuanData);
        $pengajuanDataFiks = implode(', ', $pengajuanData);

        $kunjunganModel = new KunjunganModel($conn);
        $kunjunganData = $kunjunganModel->getKunjunganByIdStatusBerjalanIdPengajuan($idStatusBerjalan, $pengajuanDataFiks);
    
        echo json_encode($kunjunganData);
    }

    if ($_GET['action'] === 'getKunjunganByIdStatusBerjalan' && isset($_GET['id_status_berjalan'])) {
        $idStatusBerjalan = $_GET['id_status_berjalan'];

        $kunjunganModel = new KunjunganModel($conn);
        $kunjunganData = $kunjunganModel->getKunjunganByIdStatusBerjalan($idStatusBerjalan);
    
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
    
    if ($_POST['action'] === 'updateLaporanKunjungan') {
        
        $uploadDir = '../View/assets/img/gambar_laporan_kunjungan/';

        if (isset($_FILES['bukti_kunjungan'])) {
            $originalName = $_FILES['bukti_kunjungan']['name'];
            $tmpName = $_FILES['bukti_kunjungan']['tmp_name'];

            $randomName = uniqid() . '_' . mt_rand(1000, 9999) . '_' . $originalName;

            $destination = $uploadDir . $randomName;

            if (move_uploaded_file($tmpName, $destination)) {
                $bukti_kunjungan = $randomName;
                $id_kunjungan = $_POST['id_kunjungan'];
                $laporan_kunjungan = $_POST['laporan_kunjungan'];

                $kunjunganModel = new KunjunganModel($conn);

                $result = $kunjunganModel->updateLaporanKunjungan($id_kunjungan, $bukti_kunjungan, $laporan_kunjungan);
            } 
            
        } else {
            $id_kunjungan = $_POST['id_kunjungan'];
            $laporan_kunjungan = $_POST['laporan_kunjungan'];
            $bukti_kunjungan = $_POST['bukti_data'];

            $kunjunganModel = new KunjunganModel($conn);

            $result = $kunjunganModel->updateLaporanKunjungan($id_kunjungan, $bukti_kunjungan, $laporan_kunjungan);
        }
        
    }

    if ($_POST['action'] === 'updateStatusBerjalan') {
        if (
            isset($_POST['id_kunjungan']) &&
            isset($_POST['id_status_berjalan']) 
        ) {
            // Ambil data dari form
            $id_kunjungan = $_POST['id_kunjungan'];
            $id_status_berjalan = $_POST['id_status_berjalan'];
    
            // Buat objek model
            $kunjunganModel = new KunjunganModel($conn);

            $result = $kunjunganModel->updateStatusBerjalan($id_kunjungan, $id_status_berjalan);
        }
    }

    
}
?>
