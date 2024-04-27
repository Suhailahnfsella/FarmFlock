<?php
class TingkatKeparahanModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllTingkatKeparahan() {
        $sql = "SELECT * FROM tbl_tingkat_keparahan";
        $result = $this->conn->query($sql);
    
        $tingkatKeparahanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $tingkatKeparahanArray[] = $row;
            }
        }
        return $tingkatKeparahanArray; // Mengembalikan array asosiatif
    }
}

?>
