<?php
session_start();

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Akhirnya, hancurkan sesi.
if(isset($_SESSION['peternak'])) unset($_SESSION['peternak']);
if(isset($_SESSION['peternak'])) unset($_SESSION['peternak']);
if(isset($_SESSION['peternak'])) unset($_SESSION['peternak']);

// Mengirim respons JSON
echo json_encode(['status' => 'success']);
exit;
?>
