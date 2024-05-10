<?php
class PelatihanModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addPelatihan($judulPelatihan,$deskripsiPelatihan,$tempatPelatihan,$tanggalPelatihan,$waktuPelatihan,$idDesa,$idStatusBerjalan) {
        $sql = "INSERT INTO tbl_pelatihan (judul_pelatihan, deskripsi_pelatihan, tempat_pelatihan, tanggal_pelatihan, waktu_pelatihan, id_desa, id_status_berjalan) 
                VALUES ('$judulPelatihan', '$deskripsiPelatihan', '$tempatPelatihan', '$tanggalPelatihan', '$waktuPelatihan', '$idDesa', '$idStatusBerjalan')";
    
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateTempatTanggalWaktu($idPelatihan, $tempatPelatihan, $tanggalPelatihan, $waktuPelatihan) {
        $sql = "UPDATE tbl_pelatihan SET tempat_pelatihan = '$tempatPelatihan', tanggal_pelatihan = '$tanggalPelatihan', waktu_pelatihan = '$waktuPelatihan' WHERE id_pelatihan = $idPelatihan";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateLaporanPelatihan($idPelatihan, $buktiPelatihan, $laporanPelatihan) {
        $sql = "UPDATE tbl_pelatihan SET bukti_pelatihan = '$buktiPelatihan', laporan_pelatihan = '$laporanPelatihan' WHERE id_pelatihan = $idPelatihan";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateStatusBerjalan($idPelatihan, $idStatusBerjalan) {
        $sql = "UPDATE tbl_pelatihan SET id_status_berjalan = $idStatusBerjalan WHERE id_pelatihan = $idPelatihan";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function getPelatihanByIdStatusBerjalan($idStatusBerjalan) {
        $sql = "SELECT * FROM tbl_pelatihan WHERE id_status_berjalan = $idStatusBerjalan";
        $result = $this->conn->query($sql);
    
        $pelatihanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $pelatihanArray[] = $row;
            }
        }
        return $pelatihanArray; // Mengembalikan array asosiatif
    }

    public function getPelatihanByIdStatusBerjalanIdDesa($idStatusBerjalan, $idDesa) {
        $sql = "SELECT * FROM tbl_pelatihan WHERE id_status_berjalan = $idStatusBerjalan AND id_desa = $idDesa";
        $result = $this->conn->query($sql);
    
        $pelatihanArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $pelatihanArray[] = $row;
            }
        }
        return $pelatihanArray; // Mengembalikan array asosiatif
    }
}

?>
