<?php
class PeternakModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getPeternakById($idPeternak) {
        $sql = "SELECT * FROM tbl_peternak WHERE id_peternak = $idPeternak";
        $result = $this->conn->query($sql);
    
        $peternakArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $peternakArray[] = $row;
            }
        }
        return $peternakArray; // Mengembalikan array asosiatif
    }

    public function getLoginPeternak($username, $password) {
        // Gunakan prepared statement untuk mencegah SQL Injection
        $stmt = $this->conn->prepare("SELECT * FROM tbl_peternak WHERE username_peternak = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Cek apakah username ditemukan
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verifikasi password
            if ($password == $row['password_peternak']) {
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
            } else if ($password != $row['password_peternak']) {
                // Jika password salah
                return [
                    'status' => 'error',
                    'message' => 'Password salah'
                ];
            }
        } else if ($result->num_rows <= 0) {
            // Jika username tidak ditemukan
            return [
                'status' => 'error',
                'message' => 'Username tidak ditemukan'
            ];
        }
    }

    public function getAllPeternak() {
        $sql = "SELECT * FROM tbl_peternak";
        $result = $this->conn->query($sql);
    
        $peternakArray = array(); // Inisialisasi array kosong untuk menyimpan hasil
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Menambahkan setiap baris sebagai elemen array asosiatif
                $peternakArray[] = $row;
            }
        }
        return $peternakArray; // Mengembalikan array asosiatif
    }

    public function updateFotoPeternak($idPeternak, $fotoPeternak) {
        $sql = "UPDATE tbl_peternak SET foto_peternak = '$fotoPeternak' WHERE id_peternak = $idPeternak";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateProfilPeternak($idPeternak, $emailPeternak, $noTelpPeternak, $usernamePeternak, $passwordPeternak) {
        $emailPeternak = $this->conn->real_escape_string($emailPeternak);
        $noTelpPeternak = $this->conn->real_escape_string($noTelpPeternak);
        $usernamePeternak = $this->conn->real_escape_string($usernamePeternak);
        $passwordPeternak = $this->conn->real_escape_string($passwordPeternak);
    
        $sqlCheckEmail = "SELECT * FROM tbl_peternak WHERE email_peternak = '$emailPeternak' AND id_peternak != $idPeternak";
        $resultCheckEmail = $this->conn->query($sqlCheckEmail);
    
        if ($resultCheckEmail->num_rows > 0) {
            // Jika email sudah terdaftar, kembalikan pesan error
            return [
                'Email sudah terdaftar.'
            ];
        }
    
        // Cek apakah nomor telepon sudah terdaftar di database
        $sqlCheckNoTelp = "SELECT * FROM tbl_peternak WHERE no_telp_peternak = '$noTelpPeternak' AND id_peternak != $idPeternak";
        $resultCheckNoTelp = $this->conn->query($sqlCheckNoTelp);
    
        if ($resultCheckNoTelp->num_rows > 0) {
            // Jika nomor telepon sudah terdaftar, kembalikan pesan error
            return 'Nomor telepon sudah terdaftar.';
        }
    
        // Cek apakah username sudah terdaftar di database
        $sqlCheckUsername = "SELECT * FROM tbl_peternak WHERE username_peternak = '$usernamePeternak' AND id_peternak != $idPeternak";
        $resultCheckUsername = $this->conn->query($sqlCheckUsername);
    
        if ($resultCheckUsername->num_rows > 0) {
            // Jika username sudah terdaftar, kembalikan pesan error
            return 'Username sudah terdaftar';
        }
    
        // Jika tidak ada data yang terdaftar, lanjutkan dengan pembaruan profil
        $sqlUpdate = "UPDATE tbl_peternak SET email_peternak = '$emailPeternak', no_telp_Peternak = '$noTelpPeternak', username_peternak = '$usernamePeternak', password_peternak = '$passwordPeternak' WHERE id_peternak = '$idPeternak'";
        
        if ($this->conn->query($sqlUpdate) === TRUE) {
            return 'Profil berhasil diperbarui, keluar dan masuk kembali untuk melihat perubahannya!';
        }
    }   

    public function addPeternak($namaPeternak, $nikPeternak, $emailPeternak, $noTelpPeternak, $usernamePeternak, $passwordPeternak) {
        $emailPeternak = $this->conn->real_escape_string($emailPeternak);
        $noTelpPeternak = $this->conn->real_escape_string($noTelpPeternak);
        $usernamePeternak = $this->conn->real_escape_string($usernamePeternak);
        $passwordPeternak = $this->conn->real_escape_string($passwordPeternak);
    
        $sqlCheckNIK = "SELECT * FROM tbl_peternak WHERE nik_peternak = '$nikPeternak'";
        $resultCheckNIK = $this->conn->query($sqlCheckNIK);
    
        if ($resultCheckNIK->num_rows > 0) {
            // Jika email sudah terdaftar, kembalikan pesan error
            return 'NIK sudah terdaftar.';
        }

        $sqlCheckEmail = "SELECT * FROM tbl_peternak WHERE email_peternak = '$emailPeternak'";
        $resultCheckEmail = $this->conn->query($sqlCheckEmail);
    
        if ($resultCheckEmail->num_rows > 0) {
            // Jika email sudah terdaftar, kembalikan pesan error
            return 'Email sudah terdaftar.';
        }
    
        // Cek apakah nomor telepon sudah terdaftar di database
        $sqlCheckNoTelp = "SELECT * FROM tbl_peternak WHERE no_telp_peternak = '$noTelpPeternak'";
        $resultCheckNoTelp = $this->conn->query($sqlCheckNoTelp);
    
        if ($resultCheckNoTelp->num_rows > 0) {
            // Jika nomor telepon sudah terdaftar, kembalikan pesan error
            return 'Nomor telepon sudah terdaftar.';
        }
    
        // Cek apakah username sudah terdaftar di database
        $sqlCheckUsername = "SELECT * FROM tbl_peternak WHERE username_peternak = '$usernamePeternak'";
        $resultCheckUsername = $this->conn->query($sqlCheckUsername);
    
        if ($resultCheckUsername->num_rows > 0) {
            // Jika username sudah terdaftar, kembalikan pesan error
            return 'Username sudah terdaftar';
        }
    
        // Jika tidak ada data yang terdaftar, lanjutkan dengan pembaruan profil
        $sqlUpdate = "INSERT INTO tbl_peternak (nama_peternak, nik_peternak, email_peternak, username_peternak, password_peternak, no_telp_peternak, id_status_aktif)
                        VALUES ('$namaPeternak', '$nikPeternak', '$emailPeternak', '$usernamePeternak', '$passwordPeternak', '$noTelpPeternak', 1)";
        
        if ($this->conn->query($sqlUpdate) === TRUE) {
            return 'Peternak berhasil ditambahkan!';
        }
    }
}

?>
