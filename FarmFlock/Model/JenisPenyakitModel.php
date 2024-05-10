<?php
class JenisPenyakitModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllJenisPenyakit() {
        $sql = "SELECT * FROM tbl_jenis_penyakit";
        $result = $this->conn->query($sql);
    
        $jenisPenyakitArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $jenisPenyakitArray[] = $row;
            }
        }
        return $jenisPenyakitArray; // Mengembalikan array asosiatif
    }

    public function getJenisPenyakitById($idJenisPenyakit) {
        $sql = "SELECT * FROM tbl_jenis_penyakit WHERE id_jenis_penyakit = $idJenisPenyakit";
        $result = $this->conn->query($sql);
    
        $jenisPenyakitArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $jenisPenyakitArray[] = $row;
            }
        }
        return $jenisPenyakitArray; // Mengembalikan array asosiatif
    }

    public function addPenyakitBaru($penyakitBaru) {
        $sql = "INSERT INTO tbl_jenis_penyakit (jenis_penyakit) 
                VALUES ('$penyakitBaru')";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }
}

?>
