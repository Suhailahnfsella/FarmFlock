<?php
class DinasModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getLoginDinas($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_dinas_peternakan WHERE email_dinas = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($password == $row['password_dinas']) {
                return [
                    'status' => 'success',
                    'data' => $row
                ];
            } else if ($password != $row['password_dinas']) {
                return [
                    'status' => 'error',
                    'message' => 'Password salah'
                ];
            }
        } else if ($result->num_rows <= 0) {
            return [
                'status' => 'error',
                'message' => 'Email tidak ditemukan'
            ];
        }
    }

    public function updateFotoDinas($idDinas, $fotoDinas) {
        $sql = "UPDATE tbl_dinas_peternakan SET foto_dinas = '$fotoDinas' WHERE id_dinas = $idDinas";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateProfilDinas($idDinas, $emailDinas, $passwordDinas) {
        $emailPeternak = $this->conn->real_escape_string($emailDinas);
        $passwordDinas = $this->conn->real_escape_string($passwordDinas);
    
        $sqlCheckEmail = "SELECT * FROM tbl_dinas_peternakan WHERE email_dinas = '$emailPeternak' AND id_dinas != $idDinas";
        $resultCheckEmail = $this->conn->query($sqlCheckEmail);
    
        if ($resultCheckEmail->num_rows > 0) {
            // Jika email sudah terdaftar, kembalikan pesan error
            return [
                'Email sudah terdaftar.'
            ];
        }
    
        // Jika tidak ada data yang terdaftar, lanjutkan dengan pembaruan profil
        $sqlUpdate = "UPDATE tbl_dinas_peternakan SET email_dinas = '$emailDinas', password_dinas = '$passwordDinas' WHERE id_dinas = '$idDinas'";
        
        if ($this->conn->query($sqlUpdate) === TRUE) {
            return 'Profil berhasil diperbarui, keluar dan masuk kembali untuk melihat perubahannya!';
        }
    }   
}

?>
