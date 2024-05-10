<?php
include_once '../Config/database.php';
include_once '../Model/PengajuanModel.php';

// Cek jika metode permintaan adalah POST dan aksi telah ditentukan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    // Cek jika aksi adalah menambahkan pengajuan baru
    if ($_POST['action'] === 'addPengajuan') {
        // Periksa apakah data yang diperlukan tersedia
        if (
            isset($_POST['deskripsi']) && 
            isset($_POST['id_jenis_pengajuan']) && 
            isset($_POST['id_peternak'])
        ) {
            // Ambil data dari form
            $deskripsi = $_POST['deskripsi'];
            $id_jenis_pengajuan = $_POST['id_jenis_pengajuan'];
            $id_peternak = $_POST['id_peternak'];

            $now = new DateTime('now');

            // Membuat objek DateTimeZone dengan zona waktu Asia/Jakarta
            $jakartaTimezone = new DateTimeZone('Asia/Jakarta');

            // Menyesuaikan zona waktu objek DateTime dengan zona waktu Asia/Jakarta
            $now->setTimezone($jakartaTimezone);

            // Mengambil waktu saat ini yang disesuaikan dengan zona waktu Asia/Jakarta
            $waktuPengajuan = $now->format("H:i:s");

            // Buat objek model
            $pengajuanModel = new PengajuanModel($conn);

            // Panggil fungsi untuk menambahkan pengajuan baru
            $result = $pengajuanModel->addPengajuanBaru($deskripsi, $id_jenis_pengajuan, $id_peternak, $waktuPengajuan);

            // Periksa apakah data berhasil ditambahkan
            if ($result) {
                // Jika berhasil, kirim respons sukses
                echo json_encode(array('status' => 'success', 'message' => 'Data pengajuan berhasil ditambahkan'));
            } else {
                // Jika gagal, kirim respons gagal
                echo json_encode(array('status' => 'error', 'message' => 'Gagal menambahkan data pengajuan'));
            }
        } else {
            // Jika data tidak lengkap, kirim respons gagal
            echo json_encode(array('status' => 'error', 'message' => 'Data yang diperlukan tidak lengkap'));
        }
    } elseif ($_POST['action'] === 'updateStatusPengajuanSetuju') {
        // Periksa apakah data yang diperlukan tersedia
        if (
            isset($_POST['id_pengajuan'])
        ) {
            // Ambil data dari form
            $id_pengajuan = $_POST['id_pengajuan'];
    
            // Buat objek model
            $pengajuanModel = new PengajuanModel($conn);
    
            // Panggil fungsi untuk menambahkan pengajuan baru
            $result = $pengajuanModel->updateStatusPengajuanSetuju($id_pengajuan);

        } else {
            // Jika data tidak lengkap, kirim respons gagal
            echo json_encode(array('status' => 'error', 'message' => 'Gagal'));
        }
    } elseif ($_POST['action'] === 'updateStatusPengajuanTolak') {
        // Periksa apakah data yang diperlukan tersedia
        if (
            isset($_POST['id_pengajuan'])
        ) {
            // Ambil data dari form
            $id_pengajuan = $_POST['id_pengajuan'];
    
            // Buat objek model
            $pengajuanModel = new PengajuanModel($conn);
    
            // Panggil fungsi untuk menambahkan pengajuan baru
            $result = $pengajuanModel->updateStatusPengajuanTolak($id_pengajuan);

        } else {
            // Jika data tidak lengkap, kirim respons gagal
            echo json_encode(array('status' => 'error', 'message' => 'Gagal'));
        }
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getPengajuanByIdPeternakAndStatus' && isset($_GET['id_peternak']) && isset($_GET['id_jenis_persetujuan'])) {
    $conn = get_connection();

    $id_peternak = $_GET['id_peternak'];
    $id_jenis_persetujuan = $_GET['id_jenis_persetujuan'];

    $pengajuanModel = new PengajuanModel($conn);
    $pengajuanData = $pengajuanModel->getPengajuanByIdPeternakAndStatus($id_peternak, $id_jenis_persetujuan);

    echo json_encode($pengajuanData);
    
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getPengajuanByJenisPengajuanAndStatus' && isset($_GET['id_jenis_pengajuan']) && isset($_GET['id_jenis_persetujuan'])) {
    $conn = get_connection();

    $id_jenis_pengajuan = $_GET['id_jenis_pengajuan'];
    $id_jenis_persetujuan = $_GET['id_jenis_persetujuan'];

    $pengajuanModel = new PengajuanModel($conn);
    $pengajuanData = $pengajuanModel->getPengajuanByJenisPengajuanAndStatus($id_jenis_pengajuan, $id_jenis_persetujuan);

    echo json_encode($pengajuanData);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getPengajuanById' && isset($_GET['id_pengajuan'])) {
    $conn = get_connection();

    $id_pengajuan = $_GET['id_pengajuan'];

    $pengajuanModel = new PengajuanModel($conn);
    $pengajuanData = $pengajuanModel->getPengajuanById($id_pengajuan);

    echo json_encode($pengajuanData);
}
?>
