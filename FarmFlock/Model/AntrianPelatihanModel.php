<?php
class AntrianPelatihanModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addAntrianPel($idJenisPelatihan, $idStatusAntrianPel, $idPengajuan, $idDesa) {
        $sql = "INSERT INTO tbl_antrian_pelatihan (id_jenis_pelatihan, id_status_antrian_pelatihan, id_pengajuan, id_desa) 
                VALUES ($idJenisPelatihan, $idStatusAntrianPel, $idPengajuan, $idDesa)";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateAntrianPelatihan($idJenisPelatihan, $idDesa) {
        $sql = "UPDATE tbl_antrian_pelatihan SET id_status_antrian_pelatihan = 2 WHERE id_desa = $idDesa AND id_jenis_pelatihan = $idJenisPelatihan;";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function getAntrianPelatihanByStatus() {
        $sql = "SELECT * FROM tbl_antrian_pelatihan WHERE id_status_antrian_pelatihan = 1";
        $result = $this->conn->query($sql);
    
        $antrianPelArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $antrianPelArray[] = $row;
            }
        }
        return $antrianPelArray; // Mengembalikan array asosiatif
    }
}

?>
