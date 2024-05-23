<?php
class KecamatanModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllKecamatan() {
        $sql = "SELECT * FROM tbl_kecamatan";
        $result = $this->conn->query($sql);
    
        $kecamatanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $kecamatanArray[] = $row;
            }
        }
        return $kecamatanArray; // Mengembalikan array asosiatif
    }

    public function getKecamatanById($idKecamatan) {
        $sql = "SELECT * FROM tbl_kecamatan WHERE id_kecamatan = $idKecamatan";
        $result = $this->conn->query($sql);
    
        $kecamatanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $kecamatanArray[] = $row;
            }
        }
        return $kecamatanArray; // Mengembalikan array asosiatif
    }
}

?>
