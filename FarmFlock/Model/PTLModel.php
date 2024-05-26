<?php
class PTLModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllPTL() {
        $sql = "SELECT * FROM tbl_ptl";
        $result = $this->conn->query($sql);
    
        $ptlArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $ptlArray[] = $row;
            }
        }
        return $ptlArray; // Mengembalikan array asosiatif
    }

    public function getAllPTLAktif() {
        $sql = "SELECT * FROM tbl_ptl WHERE id_status_aktif = 1";
        $result = $this->conn->query($sql);
    
        $ptlArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $ptlArray[] = $row;
            }
        }
        return $ptlArray; // Mengembalikan array asosiatif
    }

    public function getPTLById($idPTL) {
        $sql = "SELECT * FROM tbl_ptl WHERE id_ptl = $idPTL";
        $result = $this->conn->query($sql);
    
        $ptlArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $ptlArray[] = $row;
            }
        }
        return $ptlArray; // Mengembalikan array asosiatif
    }

    public function getLoginPTL($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_ptl WHERE username_ptl = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($password == $row['password_ptl']) {
                if ($row['id_status_aktif'] == 1) {
                    return [
                        'status' => 'success',
                        'data' => $row
                    ];
                } else if ($row['id_status_aktif'] == 2) {
                    return [
                        'status' => 'error',
                        'message' => 'Akun anda sudah tidak aktif.'
                    ];
                }
            } else if ($password != $row['password_ptl']) {
                return [
                    'status' => 'error',
                    'message' => 'Password salah'
                ];
            }
        } else if ($result->num_rows <= 0) {
            return [
                'status' => 'error',
                'message' => 'Username tidak ditemukan'
            ];
        }
    }

    public function updateStatusPTL($idPTL, $idStatusAktif) {
        $sql = "UPDATE tbl_ptl SET id_status_aktif = $idStatusAktif WHERE id_ptl = $idPTL";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateFotoPTL($idPTL, $fotoPTL) {
        $sql = "UPDATE tbl_ptl SET foto_ptl = '$fotoPTL' WHERE id_ptl = $idPTL";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateProfilPtl($idPtl, $emailPtl, $noTelpPtl, $usernamePtl, $passwordPtl) {
        $emailPtl = $this->conn->real_escape_string($emailPtl);
        $noTelpPtl = $this->conn->real_escape_string($noTelpPtl);
        $usernamePtl = $this->conn->real_escape_string($usernamePtl);
        $passwordPtl = $this->conn->real_escape_string($passwordPtl);
    
        $sqlCheckEmail = "SELECT * FROM tbl_ptl WHERE email_ptl = '$emailPtl' AND id_ptl != $idPtl";
        $resultCheckEmail = $this->conn->query($sqlCheckEmail);
    
        if ($resultCheckEmail->num_rows > 0) {
            // Jika email sudah terdaftar, kembalikan pesan error
            return [
                'Email sudah terdaftar.'
            ];
        }
    
        // Cek apakah nomor telepon sudah terdaftar di database
        $sqlCheckNoTelp = "SELECT * FROM tbl_ptl WHERE no_telp_ptl = '$noTelpPtl' AND id_ptl != $idPtl";
        $resultCheckNoTelp = $this->conn->query($sqlCheckNoTelp);
    
        if ($resultCheckNoTelp->num_rows > 0) {
            // Jika nomor telepon sudah terdaftar, kembalikan pesan error
            return 'Nomor telepon sudah terdaftar.';
        }
    
        // Cek apakah username sudah terdaftar di database
        $sqlCheckUsername = "SELECT * FROM tbl_ptl WHERE username_ptl = '$usernamePtl' AND id_ptl != $idPtl";
        $resultCheckUsername = $this->conn->query($sqlCheckUsername);
    
        if ($resultCheckUsername->num_rows > 0) {
            // Jika username sudah terdaftar, kembalikan pesan error
            return 'Username sudah terdaftar';
        }
    
        // Jika tidak ada data yang terdaftar, lanjutkan dengan pembaruan profil
        $sqlUpdate = "UPDATE tbl_ptl SET email_ptl = '$emailPtl', no_telp_ptl = '$noTelpPtl', username_ptl = '$usernamePtl', password_ptl = '$passwordPtl' WHERE id_ptl = '$idPtl'";
        
        if ($this->conn->query($sqlUpdate) === TRUE) {
            return 'Profil berhasil diperbarui, keluar dan masuk kembali untuk melihat perubahannya!';
        }
    }

    public function addPTLBaru($namaPtl, $nikPtl, $emailPtl, $noTelpPtl, $usernamePtl, $passwordPtl) {
        $emailPtl = $this->conn->real_escape_string($emailPtl);
        $noTelpPtl = $this->conn->real_escape_string($noTelpPtl);
        $usernamePtl = $this->conn->real_escape_string($usernamePtl);
        $passwordPtl = $this->conn->real_escape_string($passwordPtl);
    
        $sqlCheckNIK = "SELECT * FROM tbl_ptl WHERE nik_ptl = '$nikPtl'";
        $resultCheckNIK = $this->conn->query($sqlCheckNIK);
    
        if ($resultCheckNIK->num_rows > 0) {
            // Jika email sudah terdaftar, kembalikan pesan error
            return 'NIK sudah terdaftar.';
        }

        $sqlCheckEmail = "SELECT * FROM tbl_ptl WHERE email_ptl = '$emailPtl'";
        $resultCheckEmail = $this->conn->query($sqlCheckEmail);
    
        if ($resultCheckEmail->num_rows > 0) {
            // Jika email sudah terdaftar, kembalikan pesan error
            return 'Email sudah terdaftar.';
        }
    
        // Cek apakah nomor telepon sudah terdaftar di database
        $sqlCheckNoTelp = "SELECT * FROM tbl_ptl WHERE no_telp_ptl = '$noTelpPtl'";
        $resultCheckNoTelp = $this->conn->query($sqlCheckNoTelp);
    
        if ($resultCheckNoTelp->num_rows > 0) {
            // Jika nomor telepon sudah terdaftar, kembalikan pesan error
            return 'Nomor telepon sudah terdaftar.';
        }
    
        // Cek apakah username sudah terdaftar di database
        $sqlCheckUsername = "SELECT * FROM tbl_ptl WHERE username_ptl = '$usernamePtl'";
        $resultCheckUsername = $this->conn->query($sqlCheckUsername);
    
        if ($resultCheckUsername->num_rows > 0) {
            // Jika username sudah terdaftar, kembalikan pesan error
            return 'Username sudah terdaftar';
        }
    
        // Jika tidak ada data yang terdaftar, lanjutkan dengan pembaruan profil
        $sqlUpdate = "INSERT INTO tbl_ptl (nama_ptl, nik_ptl, email_ptl, username_ptl, password_ptl, no_telp_ptl, id_status_aktif)
                        VALUES ('$namaPtl', '$nikPtl', '$emailPtl', '$usernamePtl', '$passwordPtl', '$noTelpPtl', 1)";
        
        if ($this->conn->query($sqlUpdate) === TRUE) {
            return 'PTL berhasil ditambahkan!';
        }
    }
}

?>
