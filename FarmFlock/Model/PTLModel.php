<?php
class PTLModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllPTL() {
        $sql = "SELECT * FROM tbl_ptl";
        $result = $this->conn->query($sql);
    
        $ptlArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $ptlArray[] = $row;
            }
        }
        return $ptlArray; // Mengembalikan array asosiatif
    }
}

?>
