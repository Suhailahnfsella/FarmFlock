<?php
class PeternakanModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getPeternakanById($idPeternak) {
        $sql = "SELECT * FROM tbl_peternakan WHERE id_peternak = $idPeternak";
        $result = $this->conn->query($sql);
    
        $peternakanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $peternakanArray[] = $row;
            }
        }
        return $peternakanArray; // Mengembalikan array asosiatif
    }
}

?>
