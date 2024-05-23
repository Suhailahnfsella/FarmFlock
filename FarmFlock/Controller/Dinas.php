<?php
include_once '../Config/database.php';
include_once '../Model/DinasModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $conn = get_connection();

    if ($_GET['action'] === 'getLoginDinas' && isset($_GET['Email']) && isset($_GET['Password'])) {
        session_start();
        $email = $_GET['Email'];
        $password = $_GET['Password'];
    
        $dinasModel = new DinasModel($conn);
        $response = $dinasModel->getLoginDinas($email, $password);
    
        if ($response['status'] === 'success') {
            $_SESSION['dinas'] = $response['data'];
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

    if ($_POST['action'] === 'updateFotoDinas') {
        
        $uploadDir = '../View/assets/img/gambar_profil_dinas/';

        $originalName = $_FILES['fotoDinas']['name'];
        $tmpName = $_FILES['fotoDinas']['tmp_name'];

        $randomName = uniqid() . '_' . mt_rand(1000, 9999) . '_' . $originalName;

        $destination = $uploadDir . $randomName;

        if (move_uploaded_file($tmpName, $destination)) {
            $fotoDinas = $randomName;
            $idDinas = $_POST['id_dinas'];

            $dinasModel = new DinasModel($conn);

            $result = $dinasModel->updateFotoDinas($idDinas, $fotoDinas);
        }
    }

    if ($_POST['action'] === 'hapusFoto') {
        $fotoDinas = 'ppdinas.png';
        $idDinas = $_POST['id_dinas'];

        $dinasModel = new DinasModel($conn);

        $result = $dinasModel->updateFotoDinas($idDinas, $fotoDinas);
    }

    if ($_POST['action'] === 'updateProfilDinas') {
        $idDinas = $_POST['id_dinas'];
        $emailDinas = $_POST['email_dinas'];
        $passwordDinas = $_POST['password_dinas'];

        $dinasModel = new DinasModel($conn);

        $result = $dinasModel->updateProfilDinas($idDinas, $emailDinas, $passwordDinas);

        echo json_encode($result);
    }
}
?>
