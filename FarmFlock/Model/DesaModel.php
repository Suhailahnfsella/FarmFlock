<?php
class DesaModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getDesaById($idDesa) {
        $sql = "SELECT * FROM tbl_desa WHERE id_desa = $idDesa";
        $result = $this->conn->query($sql);
    
        $desaArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $desaArray[] = $row;
            }
        }
        return $desaArray; // Mengembalikan array asosiatif
    }

    public function getDesaByKecamatanId($idKecamatan) {
        $sql = "SELECT * FROM tbl_desa WHERE id_kecamatan = $idKecamatan";
        $result = $this->conn->query($sql);
    
        $desaArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $desaArray[] = $row;
            }
        }
        return $desaArray; // Mengembalikan array asosiatif
    }
}

?>
