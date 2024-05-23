<?php
include_once '../Config/database.php';
include_once '../Model/PeternakModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getPeternakById' && isset($_GET['id_peternak'])) {
        $id_peternak = $_GET['id_peternak'];
    
        $peternakModel = new PeternakModel($conn);
        $peternakData = $peternakModel->getPeternakById($id_peternak);
    
        echo json_encode($peternakData);
    }

    if ($_GET['action'] === 'getLoginPeternak' && isset($_GET['Username']) && isset($_GET['Password'])) {
        session_start();
        $username = $_GET['Username'];
        $password = $_GET['Password'];
    
        $peternakModel = new PeternakModel($conn);
        $response = $peternakModel->getLoginPeternak($username, $password);
    
        if ($response['status'] === 'success') {
            $_SESSION['peternak'] = $response['data'];
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        exit;
    }

    if ($_GET['action'] === 'getAllPeternak') {
        $peternakModel = new PeternakModel($conn);
        $peternakData = $peternakModel->getAllPeternak();
    
        echo json_encode($peternakData);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    if ($_POST['action'] === 'updateFotoPeternak') {
        
        $uploadDir = '../View/assets/img/gambar_profil_peternak/';

        $originalName = $_FILES['fotopeternak']['name'];
        $tmpName = $_FILES['fotopeternak']['tmp_name'];

        $randomName = uniqid() . '_' . mt_rand(1000, 9999) . '_' . $originalName;

        $destination = $uploadDir . $randomName;

        if (move_uploaded_file($tmpName, $destination)) {
            $fotoPeternak = $randomName;
            $idPeternak = $_POST['id_peternak'];

            $peternakModel = new PeternakModel($conn);

            $result = $peternakModel->updateFotoPeternak($idPeternak, $fotoPeternak);
        }
    }

    if ($_POST['action'] === 'hapusFoto') {
        $fotopeternak = 'pppeternak.png';
        $idPeternak = $_POST['id_peternak'];

        $peternakModel = new PeternakModel($conn);

        $result = $peternakModel->updateFotoPeternak($idPeternak, $fotopeternak);
    }

    if ($_POST['action'] === 'updateProfilPeternak') {
        $idPeternak = $_POST['id_peternak'];
        $emailPeternak = $_POST['email_peternak'];
        $noTelpPeternak = $_POST['no_telp_peternak'];
        $usernamePeternak = $_POST['username_peternak'];
        $passwordPeternak = $_POST['password_peternak'];

        $peternakModel = new peternakModel($conn);

        $result = $peternakModel->updateProfilPeternak($idPeternak, $emailPeternak, $noTelpPeternak, $usernamePeternak, $passwordPeternak);

        echo json_encode($result);
    }

    if ($_POST['action'] === 'addPeternak') {
        $namaPeternak = $_POST['nama_peternak'];
        $nikPeternak = $_POST['nik_peternak'];
        $emailPeternak = $_POST['email_peternak'];
        $noTelpPeternak = $_POST['no_telp_peternak'];
        $usernamePeternak = $_POST['username_peternak'];
        $passwordPeternak = $_POST['password_peternak'];

        $peternakModel = new peternakModel($conn);

        $result = $peternakModel->addPeternak($namaPeternak, $nikPeternak, $emailPeternak, $noTelpPeternak, $usernamePeternak, $passwordPeternak);

        echo json_encode($result);
    }
}
?>
