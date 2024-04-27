<?php
include_once '../Config/database.php';
include_once '../Model/StatusModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'showAllStatusAktif') {
        $statusModel = new StatusModel($conn);
        $statusArray = $statusModel->getAllStatusAktif();
        
        // Mengecek apakah array status kosong
        if (!empty($statusArray)) {
            // Menginisialisasi status sebagai dictionary kosong
            $status = array();
            // Mencetak setiap elemen array satu per satu
            foreach ($statusArray as $row) {
                // Menambahkan elemen dictionary dengan ID sebagai kunci
                $status[$row['id_status_aktif']] = $row['status_aktif'];
            }
            
            // Menampilkan status sebagai dictionary
            foreach ($status as $id => $status_aktif) {
                echo "ID: $id - Status: $status_aktif<br>";
            }
        } else {
            echo "Tidak ada data status aktif.";
        }
    }
}
?>
