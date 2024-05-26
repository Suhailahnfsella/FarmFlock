<?php
include_once '../Config/database.php';
include_once '../Model/PTLModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getAllPTL') {
        $ptlModel = new PTLModel($conn);
        $ptlData = $ptlModel->getAllPTL();
    
        echo json_encode($ptlData);
    }

    if ($_GET['action'] === 'getAllPTLAktif') {
        $ptlModel = new PTLModel($conn);
        $ptlData = $ptlModel->getAllPTLAktif();
    
        echo json_encode($ptlData);
    }

    if ($_GET['action'] === 'getPTLById' && isset($_GET['id_ptl'])) {
        $id_ptl = $_GET['id_ptl'];
    
        $ptlModel = new PTLModel($conn);
        $ptlData = $ptlModel->getPTLById($id_ptl);
    
        echo json_encode($ptlData);
    }

    if ($_GET['action'] === 'getLoginPTL' && isset($_GET['Username']) && isset($_GET['Password'])) {
        session_start();
        $username = $_GET['Username'];
        $password = $_GET['Password'];
    
        $ptlModel = new PTLModel($conn);
        $response = $ptlModel->getLoginPTL($username, $password);
    
        if ($response['status'] === 'success') {
            $_SESSION['ptl'] = $response['data'];
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        exit;
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    if ($_POST['action'] === 'updateFotoPTL') {
        
        $uploadDir = '../View/assets/img/gambar_profil_ptl/';

        $originalName = $_FILES['fotoPtl']['name'];
        $tmpName = $_FILES['fotoPtl']['tmp_name'];

        $randomName = uniqid() . '_' . mt_rand(1000, 9999) . '_' . $originalName;

        $destination = $uploadDir . $randomName;

        if (move_uploaded_file($tmpName, $destination)) {
            $fotoPtl = $randomName;
            $idPtl = $_POST['id_ptl'];

            $ptlModel = new PTLModel($conn);

            $result = $ptlModel->updateFotoPTL($idPtl, $fotoPtl);
        }
    }

    if ($_POST['action'] === 'hapusFoto') {
        $fotoPtl = 'ppptl.png';
        $idPtl = $_POST['id_ptl'];

        $ptlModel = new PTLModel($conn);

        $result = $ptlModel->updateFotoPTL($idPtl, $fotoPtl);
    }

    if ($_POST['action'] === 'updateProfilPtl') {
        $idPtl = $_POST['id_ptl'];
        $emailPtl = $_POST['email_ptl'];
        $noTelpPtl = $_POST['no_telp_ptl'];
        $usernamePtl = $_POST['username_ptl'];
        $passwordPtl = $_POST['password_ptl'];

        $ptlModel = new PTLModel($conn);

        $result = $ptlModel->updateProfilPtl($idPtl, $emailPtl, $noTelpPtl, $usernamePtl, $passwordPtl);

        echo json_encode($result);
    }

    if ($_POST['action'] === 'updateStatusPTL') {
        $idPtl = $_POST['id_ptl'];
        $id_status_aktif = $_POST['id_status_aktif'];

        $ptlModel = new PTLModel($conn);

        $result = $ptlModel->updateStatusPTL($idPtl, $id_status_aktif);

        echo json_encode($result);
    }

    if ($_POST['action'] === 'addPTLBaru') {
        if (
            isset($_POST['nama_ptl']) && 
            isset($_POST['nik_ptl']) && 
            isset($_POST['email_ptl']) &&
            isset($_POST['no_telp_ptl']) &&
            isset($_POST['username_ptl']) &&
            isset($_POST['password_ptl']) 
        ) {
            $namaPtl = $_POST['nama_ptl'];
            $nikPtl = $_POST['nik_ptl'];
            $emailPtl = $_POST['email_ptl'];
            $noTelpPtl = $_POST['no_telp_ptl'];
            $usernamePtl = $_POST['username_ptl'];
            $passwordPtl = $_POST['password_ptl'];

            $ptlModel = new PTLModel($conn);

            $result = $ptlModel->addPTLBaru($namaPtl, $nikPtl, $emailPtl, $noTelpPtl, $usernamePtl, $passwordPtl);

            echo json_encode($result);
        } else {
            echo json_encode('Data yang diperlukan tidak lengkap');
        }
    }
}
?>