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

    public function getIdDesaByIdPeternak($idPeternak) {
        $sql = "SELECT id_desa FROM tbl_peternakan WHERE id_peternak = $idPeternak";

        $result = $this->conn->query($sql);

        $peternakan = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $peternakan = $row['id_desa'];
            }
        }
        return $peternakan;
    }

    public function getPeternakanByIdPeternak($idPeternak) {
        $sql = "SELECT * FROM tbl_peternakan WHERE id_peternak = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idPeternak);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updatePeternakan($idPeternak, $namaPeternakan, $jalanPeternakan, $idDesa) {
        $sql = "UPDATE tbl_peternakan SET nama_peternakan = ?, jalan_peternakan = ?, id_desa = ? WHERE id_peternak = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssii", $namaPeternakan, $jalanPeternakan, $idDesa, $idPeternak);
        return $stmt->execute();
    }

    public function insertPeternakan($idPeternak, $namaPeternakan, $jalanPeternakan, $idDesa) {
        $sql = "INSERT INTO tbl_peternakan (id_peternak, nama_peternakan, jalan_peternakan, id_desa) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issi", $idPeternak, $namaPeternakan, $jalanPeternakan, $idDesa);
        return $stmt->execute();
    }
}

?>
