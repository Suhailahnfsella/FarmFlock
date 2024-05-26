<?php
class HewanModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllHewan() {
        $sql = "SELECT * FROM tbl_hewan";
        $result = $this->conn->query($sql);
    
        $hewanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $hewanArray[] = $row;
            }
        }
        return $hewanArray; // Mengembalikan array asosiatif
    }

    public function getDataHewanById($idHewan) {
        $sql = "SELECT * FROM tbl_hewan WHERE id_hewan = $idHewan";
        $result = $this->conn->query($sql);
    
        $hewanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $hewanArray[] = $row;
            }
        }
        return $hewanArray; // Mengembalikan array asosiatif
    }
}

?>
