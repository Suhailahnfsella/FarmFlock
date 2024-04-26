<?php
class DitolakModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addDitolak($keteranganDitolak, $idPengajuan) {
        $sql = "INSERT INTO tbl_alasan_ditolak (keterangan_ditolak, id_pengajuan) 
                VALUES ('$keteranganDitolak', $idPengajuan)";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function getDitolakByIdPengajuan($idPengajuan) {
        // Query untuk mengambil data pengajuan berdasarkan id_peternak
        $sql = "SELECT * FROM tbl_alasan_ditolak WHERE id_pengajuan = $idPengajuan";

        // Menjalankan query
        $result = $this->conn->query($sql);

        // Menyimpan hasil query ke dalam array
        $ditolakArray = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ditolakArray[] = $row;
            }
        }
        return $ditolakArray;
    }
}