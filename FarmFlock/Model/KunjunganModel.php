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

    public function getPenyakitData() {
        $sql = "SELECT tbl_jenis_penyakit.jenis_penyakit, COUNT(tbl_kunjungan.id_jenis_penyakit) AS jumlah 
        FROM tbl_kunjungan 
        JOIN tbl_jenis_penyakit ON tbl_jenis_penyakit.id_jenis_penyakit = tbl_kunjungan.id_jenis_penyakit 
        GROUP BY tbl_kunjungan.id_jenis_penyakit";
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

    public function getJumlahKunjunganPTL($idPtl) {
        $sql = "SELECT id_status_berjalan, COUNT(id_ptl) AS jumlah
        FROM tbl_kunjungan
        WHERE id_ptl = $idPtl
        GROUP BY id_status_berjalan";
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

    public function getJumlahKunjungan() {
        $sql = "SELECT id_status_berjalan, COUNT(id_status_berjalan) AS jumlah
        FROM tbl_kunjungan
        GROUP BY id_status_berjalan";
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

    public function getKunjunganByIdPtlIdStatusBerjalan($idPTL, $idStatusBerjalan) {
        $sql = "SELECT * FROM tbl_kunjungan WHERE id_ptl = $idPTL AND id_status_berjalan = $idStatusBerjalan ORDER BY id_tingkat_keparahan DESC, id_pengajuan ASC";
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

    public function getKunjunganByIdStatusBerjalanIdPengajuan($idStatusBerjalan, $idPengajuanArr) {
        $sql = "SELECT * FROM tbl_kunjungan WHERE id_status_berjalan = $idStatusBerjalan AND id_pengajuan IN ($idPengajuanArr)";
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
    
    public function getKunjunganByIdStatusBerjalan($idStatusBerjalan) {
        $sql = "SELECT * FROM tbl_kunjungan WHERE id_status_berjalan = $idStatusBerjalan";
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

    public function updateLaporanKunjungan($idKunjungan, $buktiKunjungan, $laporanKunjungan) {
        $sql = "UPDATE tbl_kunjungan SET bukti_kunjungan = '$buktiKunjungan', laporan_kunjungan = '$laporanKunjungan' WHERE id_kunjungan = $idKunjungan";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateStatusBerjalan($idKunjungan, $idStatusBerjalan) {
        $sql = "UPDATE tbl_kunjungan SET id_status_berjalan = $idStatusBerjalan WHERE id_kunjungan = $idKunjungan";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }
}

?>
