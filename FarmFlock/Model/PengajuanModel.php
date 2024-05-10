<?php
class PengajuanModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addPengajuanBaru($deskripsi, $idJenisPengajuan, $idPeternak, $waktuPengajuan) {
        $tanggalPengajuan = date("Y-m-d");
        // Membuat objek DateTime dengan waktu saat ini

        $sql = "INSERT INTO tbl_pengajuan (deskripsi_pengajuan, tanggal_pengajuan, waktu_pengajuan, id_jenis_pengajuan, id_peternak, id_jenis_persetujuan) 
                VALUES ('$deskripsi', '$tanggalPengajuan', '$waktuPengajuan', $idJenisPengajuan, $idPeternak, 1)";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateStatusPengajuanTolak($idPengajuan) {
        $sql = "UPDATE tbl_pengajuan SET id_jenis_persetujuan = 3 WHERE id_pengajuan = $idPengajuan";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateStatusPengajuanSetuju($idPengajuan) {
        $sql = "UPDATE tbl_pengajuan SET id_jenis_persetujuan = 2 WHERE id_pengajuan = $idPengajuan";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function getPengajuanByIdPeternakAndStatus($idPeternak, $idJenisPersetujuan) {
        // Query untuk mengambil data pengajuan berdasarkan id_peternak
        $sql = "SELECT * FROM tbl_pengajuan WHERE id_peternak = $idPeternak AND id_jenis_persetujuan = $idJenisPersetujuan ORDER BY id_pengajuan DESC";

        // Menjalankan query
        $result = $this->conn->query($sql);

        // Menyimpan hasil query ke dalam array
        $pengajuanArray = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pengajuanArray[] = $row;
            }
        }
        return $pengajuanArray;
    }

    public function getIdPengajuanByIdPeternak($idPeternak) {
        // Query untuk mengambil data pengajuan berdasarkan id_peternak
        $sql = "SELECT id_pengajuan FROM tbl_pengajuan WHERE id_peternak = $idPeternak";

        // Menjalankan query
        $result = $this->conn->query($sql);

        // Menyimpan hasil query ke dalam array
        $pengajuanArray = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pengajuanArray[] = $row['id_pengajuan'];
            }
        }
        return $pengajuanArray;
    }

    public function getPengajuanByJenisPengajuanAndStatus($idJenisPengajuan, $idJenisPersetujuan) {
        // Query untuk mengambil data pengajuan berdasarkan id_peternak
        $sql = "SELECT * FROM tbl_pengajuan WHERE id_jenis_pengajuan = $idJenisPengajuan AND id_jenis_persetujuan = $idJenisPersetujuan";

        // Menjalankan query
        $result = $this->conn->query($sql);

        // Menyimpan hasil query ke dalam array
        $pengajuanArray = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pengajuanArray[] = $row;
            }
        }
        return $pengajuanArray;
    }

    public function getPengajuanById($idPengajuan) {
        // Query untuk mengambil data pengajuan berdasarkan id_peternak
        $sql = "SELECT * FROM tbl_pengajuan WHERE id_pengajuan = $idPengajuan";

        // Menjalankan query
        $result = $this->conn->query($sql);

        // Menyimpan hasil query ke dalam array
        $pengajuanArray = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pengajuanArray[] = $row;
            }
        }
        return $pengajuanArray;
    }
}
?>
