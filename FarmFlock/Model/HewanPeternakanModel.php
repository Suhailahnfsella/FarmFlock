<?php
class HewanPeternakanModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addHewanPeternakan($idPeternakan, $idJenisHewan, $jumlah) {
        $sql = "INSERT INTO tbl_hewan_peternakan (id_peternakan, id_jenis_hewan, jumlah) 
                VALUES ($idPeternakan, $idJenisHewan, $jumlah)";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateHewanPeternakan($idPeternakan, $idJenisHewan, $jumlah) {
        $sql = "UPDATE tbl_hewan_peternakan SET jumlah = $jumlah
                WHERE id_peternakan = $idPeternakan AND id_jenis_hewan = $idJenisHewan";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function getHewanPeternakanByIdPeternakan($idPeternakan) {
        $sql = "SELECT * FROM tbl_hewan_peternakan WHERE id_peternakan = $idPeternakan";
        $result = $this->conn->query($sql);
    
        $hewanPeternakanArray = array();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $hewanPeternakanArray[] = $row;
            }
        }
        return $hewanPeternakanArray; // Mengembalikan array asosiatif
    }

    public function getJumlahJenisHewan() {
        $sql = "SELECT CONCAT(tbl_hewan.hewan, ' ', tbl_jenis_hewan.jenis_hewan) AS jenis_hewan, SUM(tbl_hewan_peternakan.jumlah) AS jumlah FROM tbl_hewan_peternakan 
        JOIN tbl_jenis_hewan ON tbl_jenis_hewan.id_jenis_hewan = tbl_hewan_peternakan.id_jenis_hewan 
        JOIN tbl_hewan ON tbl_hewan.id_hewan = tbl_jenis_hewan.id_hewan 
        GROUP BY tbl_hewan_peternakan.id_jenis_hewan
        ORDER BY jumlah DESC";
        $result = $this->conn->query($sql);
    
        $hewanPeternakanArray = array();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $hewanPeternakanArray[] = $row;
            }
        }
        return $hewanPeternakanArray; // Mengembalikan array asosiatif
    }

    public function checkHewanPeternakan($idPeternakan, $idJenisHewan) {
        $sql = "SELECT * FROM tbl_hewan_peternakan WHERE id_peternakan = $idPeternakan AND id_jenis_hewan = $idJenisHewan";
        $result = $this->conn->query($sql);
    
        $hewanPeternakanArray = array();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $hewanPeternakanArray[] = $row;
            }
        }
        return $hewanPeternakanArray; // Mengembalikan array asosiatif
    }
}

?>
