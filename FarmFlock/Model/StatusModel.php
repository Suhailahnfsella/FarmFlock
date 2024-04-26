<?php
class StatusModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllStatusAktif() {
        $sql = "SELECT * FROM tbl_status_aktif";
        $result = $this->conn->query($sql);
    
        $statusArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $statusArray[] = $row;
            }
        }
        return $statusArray; // Mengembalikan array asosiatif
    }
}

?>
