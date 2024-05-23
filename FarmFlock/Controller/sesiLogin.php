<?php

    session_start();
    header('Content-Type: application/json');

    if (isset($_SESSION['peternak'])) {
        echo json_encode(['id_peternak' => $_SESSION['peternak']['id_peternak'], 'nama_peternak' => $_SESSION['peternak']['nama_peternak'], 
        'nik_peternak' => $_SESSION['peternak']['nik_peternak'], 'email_peternak' => $_SESSION['peternak']['email_peternak'], 
        'username_peternak' => $_SESSION['peternak']['username_peternak'], 'password_peternak' => $_SESSION['peternak']['password_peternak'],
        'no_telp_peternak' => $_SESSION['peternak']['no_telp_peternak'], 'foto_peternak' => $_SESSION['peternak']['foto_peternak'],
        'id_status_aktif' => $_SESSION['peternak']['id_status_aktif']]);
    } else if (isset($_SESSION['dinas'])) {
        echo json_encode(['id_dinas' => $_SESSION['dinas']['id_dinas'], 'email_dinas' => $_SESSION['dinas']['email_dinas'], 
        'password_dinas' => $_SESSION['dinas']['password_dinas'], 'foto_dinas' => $_SESSION['dinas']['foto_dinas']]);
    } else if (isset($_SESSION['ptl'])) {
        echo json_encode(['id_ptl' => $_SESSION['ptl']['id_ptl'], 'nama_ptl' => $_SESSION['ptl']['nama_ptl'], 'nik_ptl' => $_SESSION['ptl']['nik_ptl'],
        'email_ptl' => $_SESSION['ptl']['email_ptl'], 'username_ptl' => $_SESSION['ptl']['username_ptl'], 'password_ptl' => $_SESSION['ptl']['password_ptl'], 
        'no_telp_ptl' => $_SESSION['ptl']['no_telp_ptl'], 'foto_ptl' => $_SESSION['ptl']['foto_ptl'], 'id_status_aktif' => $_SESSION['ptl']['id_status_aktif']]);
    } else {
        echo json_encode(['error' => 'User not logged in']);
    }

?>