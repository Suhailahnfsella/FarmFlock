<?php
class JenisHewanModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getJenisHewanByIdHewan($idHewan) {
        $sql = "SELECT * FROM tbl_jenis_hewan WHERE id_hewan = $idHewan";
        $result = $this->conn->query($sql);
    
        $jenisHewanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $jenisHewanArray[] = $row;
            }
        }
        return $jenisHewanArray; // Mengembalikan array asosiatif
    }

    public function getJenisHewanById($idJenisHewan) {
        $sql = "SELECT * FROM tbl_jenis_hewan WHERE id_jenis_hewan = $idJenisHewan";
        $result = $this->conn->query($sql);
    
        $jenisHewanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $jenisHewanArray[] = $row;
            }
        }
        return $jenisHewanArray; // Mengembalikan array asosiatif
    }

    public function addJenisHewanBaru($idHewan, $jenisHewan) {
        $sql = "INSERT INTO tbl_jenis_hewan (jenis_hewan, id_hewan) 
                VALUES ('$jenisHewan', $idHewan)";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }
}

?>
