<?php
class JenisPelatihanModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllJenisPelatihan() {
        $sql = "SELECT * FROM tbl_jenis_pelatihan";
        $result = $this->conn->query($sql);
    
        $jenisPelatihanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $jenisPelatihanArray[] = $row;
            }
        }
        return $jenisPelatihanArray; // Mengembalikan array asosiatif
    }
    
    public function getJenisPelatihanById($idJenisPelatihan) {
        $sql = "SELECT * FROM tbl_jenis_pelatihan WHERE id_jenis_pelatihan = $idJenisPelatihan";
        $result = $this->conn->query($sql);
    
        $jenisPelatihanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $jenisPelatihanArray[] = $row;
            }
        }
        return $jenisPelatihanArray; // Mengembalikan array asosiatif
    }

    public function addJenisPelatihanBaru($pelatihanBaru) {
        $sql = "INSERT INTO tbl_jenis_pelatihan (jenis_pelatihan) 
                VALUES ('$pelatihanBaru')";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }
}

?>
