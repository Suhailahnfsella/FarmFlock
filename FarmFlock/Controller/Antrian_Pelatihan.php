<?php
include_once '../Config/database.php';
include_once '../Model/AntrianPelatihanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getAntrianPelatihanByStatus') {
        $antrianPelatihanModel = new AntrianPelatihanModel($conn);
        $antrianPelatihanData = $antrianPelatihanModel->getAntrianPelatihanByStatus();
    
        echo json_encode($antrianPelatihanData);
    }

    // if ($_GET['action'] === 'getKunjunganByIdPtl' && isset($_GET['id_ptl'])) {
    //     $idPtl = $_GET['id_ptl'];

    //     $kunjunganModel = new KunjunganModel($conn);
    //     $kunjunganData = $kunjunganModel->getKunjunganByIdPtl($idPtl);
    
    //     echo json_encode($kunjunganData);
    // }

} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    // Cek jika aksi adalah menambahkan pengajuan baru
    if ($_POST['action'] === 'addAntrianPelatihan') {
        // Periksa apakah data yang diperlukan tersedia
        if (
            isset($_POST['id_pengajuan']) && 
            isset($_POST['id_desa']) && 
            isset($_POST['id_jenis_pelatihan']) && 
            isset($_POST['id_status_antrian_pelatihan'])
        ) {
            $idJenisPelatihan = $_POST['id_jenis_pelatihan'];
            $idStatusAntrianPelatihan = $_POST['id_status_antrian_pelatihan'];
            $idPengajuan = $_POST['id_pengajuan'];
            $idDesa = $_POST['id_desa'];

            // Buat objek model
            $antrianPelatihanModel = new AntrianPelatihanModel($conn);

            // Panggil fungsi untuk menambahkan pengajuan baru
            $result = $antrianPelatihanModel->addAntrianPel($idJenisPelatihan, $idStatusAntrianPelatihan, $idPengajuan, $idDesa);
        }
    }

    if ($_POST['action'] === 'updateAntrianPelatihan') {
        // Periksa apakah data yang diperlukan tersedia
        if (
            isset($_POST['idDesa']) && 
            isset($_POST['idJenisPelatihan'])
        ) {
            $idJenisPelatihan = $_POST['idJenisPelatihan'];
            $idDesa = $_POST['idDesa'];

            // Buat objek model
            $antrianPelatihanModel = new AntrianPelatihanModel($conn);

            // Panggil fungsi untuk menambahkan pengajuan baru
            $result = $antrianPelatihanModel->updateAntrianPelatihan($idJenisPelatihan, $idDesa);
        }
    }
}
?>
