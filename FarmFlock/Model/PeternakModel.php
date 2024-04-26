<?php
class PeternakModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getPeternakById($idPeternak) {
        $sql = "SELECT * FROM tbl_peternak WHERE id_peternak = $idPeternak";
        $result = $this->conn->query($sql);
    
        $peternakArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $peternakArray[] = $row;
            }
        }
        return $peternakArray; // Mengembalikan array asosiatif
    }

    public function getAllPeternak() {
        $sql = "SELECT * FROM tbl_peternak";
        $result = $this->conn->query($sql);
    
        $peternakArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $peternakArray[] = $row;
            }
        }
        return $peternakArray; // Mengembalikan array asosiatif
    }
}

?>
