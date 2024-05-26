<?php
include_once '../Config/database.php';
include_once '../Model/PelatihanModel.php';
include_once '../Model/PeternakanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getPelatihanByIdStatusBerjalan' && isset($_GET['id_status_berjalan'])) {
        $idStatusBerjalan = $_GET['id_status_berjalan'];

        $pelatihanModel = new PelatihanModel($conn);
        $pelatihanData = $pelatihanModel->getPelatihanByIdStatusBerjalan($idStatusBerjalan);
    
        echo json_encode($pelatihanData);
    }

    if ($_GET['action'] === 'getPelatihanByIdStatusBerjalanIdPeternak' && isset($_GET['id_peternak']) && isset($_GET['id_status_berjalan'])) {
        $idPeternak = $_GET['id_peternak'];
        $idStatusBerjalan = $_GET['id_status_berjalan'];

        $peternakanModel = new PeternakanModel($conn);
        $peternakanData = $peternakanModel->getIdDesaByIdPeternak($idPeternak);

        $peternakanData = intval($peternakanData);

        $pelatihanModel = new PelatihanModel($conn);
        $pelatihanData = $pelatihanModel->getPelatihanByIdStatusBerjalanIdDesa($idStatusBerjalan, $peternakanData);
    
        echo json_encode($pelatihanData);
    }

    if ($_GET['action'] === 'getJumlahPelatihan') {
        $pelatihanModel = new PelatihanModel($conn);
        $pelatihanData = $pelatihanModel->getJumlahPelatihan();
    
        echo json_encode($pelatihanData);
    }

    if ($_GET['action'] === 'getJadwalPelatihan') {
        $pelatihanModel = new PelatihanModel($conn);
        $pelatihanData = $pelatihanModel->getJadwalPelatihan();
    
        echo json_encode($pelatihanData);
    }

} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    // Cek jika aksi adalah menambahkan pengajuan baru
    if ($_POST['action'] === 'addPelatihan') {
        // Periksa apakah data yang diperlukan tersedia
        if (
            isset($_POST['judulPelatihan']) &&
            isset($_POST['deskripsiPelatihan']) &&
            isset($_POST['tempatPelatihan']) &&
            isset($_POST['tanggalPelatihan']) &&
            isset($_POST['waktuPelatihan']) &&
            isset($_POST['idDesa']) &&
            isset($_POST['idStatusBerjalan']) 
        ) {
            // Ambil data dari form
            $judulPelatihan = $_POST['judulPelatihan'];
            $deskripsiPelatihan = $_POST['deskripsiPelatihan'];
            $tempatPelatihan = $_POST['tempatPelatihan'];
            $tanggalPelatihan = $_POST['tanggalPelatihan'];
            $waktuPelatihan = $_POST['waktuPelatihan'];
            $idDesa = $_POST['idDesa'];
            $idStatusBerjalan = $_POST['idStatusBerjalan'];

            // Buat objek model
            $pelatihanModel = new PelatihanModel($conn);

            // Panggil fungsi untuk menambahkan pengajuan baru
            $result = $pelatihanModel->addPelatihan($judulPelatihan,$deskripsiPelatihan,$tempatPelatihan,$tanggalPelatihan,$waktuPelatihan,$idDesa,$idStatusBerjalan);
        }
    }

    if ($_POST['action'] === 'updateTempatTanggalWaktu') {
        if (
            isset($_POST['idPelatihan']) &&
            isset($_POST['tempatPelatihan']) &&
            isset($_POST['tanggalPelatihan']) &&
            isset($_POST['waktuPelatihan'])
        ) {
            $idPelatihan = $_POST['idPelatihan'];
            $tempatPelatihan = $_POST['tempatPelatihan'];
            $tanggalPelatihan = $_POST['tanggalPelatihan'];
            $waktuPelatihan = $_POST['waktuPelatihan'];

            $pelatihanModel = new PelatihanModel($conn);

            $result = $pelatihanModel->updateTempatTanggalWaktu($idPelatihan,$tempatPelatihan,$tanggalPelatihan,$waktuPelatihan);
        }
    }

    if ($_POST['action'] === 'updateLaporanPelatihan') {
        
        $uploadDir = '../View/assets/img/gambar_laporan_pelatihan/';

        if (isset($_FILES['bukti_pelatihan'])) {
            $originalName = $_FILES['bukti_pelatihan']['name'];
            $tmpName = $_FILES['bukti_pelatihan']['tmp_name'];

            $randomName = uniqid() . '_' . mt_rand(1000, 9999) . '_' . $originalName;

            $destination = $uploadDir . $randomName;

            if (move_uploaded_file($tmpName, $destination)) {
                $id_pelatihan = $_POST['id_pelatihan'];
                $bukti_pelatihan = $randomName;
                $laporan_pelatihan = $_POST['laporan_pelatihan'];
        
                $pelatihanModel = new PelatihanModel($conn);
    
                $result = $pelatihanModel->updateLaporanPelatihan($id_pelatihan, $bukti_pelatihan, $laporan_pelatihan);
            } 
            
        } else {
            $id_pelatihan = $_POST['id_pelatihan'];
            $bukti_pelatihan = $_POST['bukti_data'];
            $laporan_pelatihan = $_POST['laporan_pelatihan'];
    
            $pelatihanModel = new PelatihanModel($conn);

            $result = $pelatihanModel->updateLaporanPelatihan($id_pelatihan, $bukti_pelatihan, $laporan_pelatihan);
        }
    }

    if ($_POST['action'] === 'updateStatusBerjalan') {
        if (
            isset($_POST['id_pelatihan']) &&
            isset($_POST['id_status_berjalan']) 
        ) {
            // Ambil data dari form
            $id_pelatihan = $_POST['id_pelatihan'];
            $id_status_berjalan = $_POST['id_status_berjalan'];
    
            // Buat objek model
            $pelatihanModel = new PelatihanModel($conn);

            $result = $pelatihanModel->updateStatusBerjalan($id_pelatihan, $id_status_berjalan);
        }
    }
}
?>
