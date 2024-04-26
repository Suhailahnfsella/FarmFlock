<?php

define('DB_HOST', 'localhost'); // Host database
define('DB_USER', 'root'); // Nama pengguna database
define('DB_PASS', ''); // Kata sandi database
define('DB_NAME', 'db_farmflock'); // Nama database

function get_connection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        throw new Exception("Koneksi database gagal: " . $conn->connect_error);
    }
    return $conn;
}
?>
