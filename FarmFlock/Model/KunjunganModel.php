<?php
class KunjunganModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllKunjungan() {
        $sql = "SELECT * FROM tbl_kunjungan";
        $result = $this->conn->query($sql);
    
        $kunjunganArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $kunjunganArray[] = $row;
            }
        }
        return $kunjunganArray; // Mengembalikan array asosiatif
    }

    public function getKunjunganByIdPtl($idPTL) {
        $sql = "SELECT * FROM tbl_kunjungan WHERE id_ptl = $idPTL";
        $result = $this->conn->query($sql);
    
        $kunjunganArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $kunjunganArray[] = $row;
            }
        }
        return $kunjunganArray; // Mengembalikan array asosiatif
    }

    public function addKunjungan($idJenisPenyakit, $idTingkatKeparahan, $idPtl, $idStatusBerjalan, $idPengajuan) {
        $sql = "INSERT INTO tbl_kunjungan (id_jenis_penyakit, id_tingkat_keparahan, id_ptl, id_status_berjalan, id_pengajuan) 
                VALUES ($idJenisPenyakit, $idTingkatKeparahan, $idPtl, $idStatusBerjalan, $idPengajuan)";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }
}

?>
