<?php
include_once '../Config/database.php';
include_once '../Model/DitolakModel.php';

// Cek jika metode permintaan adalah POST dan aksi telah ditentukan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    // Cek jika aksi adalah menambahkan pengajuan baru
    if ($_POST['action'] === 'addDitolak') {
        // Periksa apakah data yang diperlukan tersedia
        if (
            isset($_POST['keterangan_ditolak']) && 
            isset($_POST['id_pengajuan'])
        ) {
            // Ambil data dari form
            $keterangan_ditolak = $_POST['keterangan_ditolak'];
            $id_pengajuan = $_POST['id_pengajuan'];

            // Buat objek model
            $ditolakModel = new DitolakModel($conn);

            // Panggil fungsi untuk menambahkan pengajuan baru
            $result = $ditolakModel->addDitolak($keterangan_ditolak, $id_pengajuan);

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
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getDitolakByIdPengajuan' && isset($_GET['id_pengajuan'])) {
    $conn = get_connection();

    $id_pengajuan = $_GET['id_pengajuan'];

    $ditolakModel = new DitolakModel($conn);
    $ditolakData = $ditolakModel->getDitolakByIdPengajuan($id_pengajuan);

    echo json_encode($ditolakData);
}
?>