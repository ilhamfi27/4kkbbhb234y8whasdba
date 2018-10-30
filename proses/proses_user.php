<?php
require_once '../models/User_model.php';
$um = new User_model();
session_start();
if(isset($_GET['proses'])){
    switch ($_GET['proses']) {
        case 'registrasi':
        	$username = isset($_POST['username']) ? $_POST['username'] : "";
        	$password = isset($_POST['password']) ? $_POST['password'] : "";
        	$password_confirm = isset($_POST['password']) ? $_POST['password'] : "";
        	if ($password == $password_confirm) {
                $result = $um->user_registration($username, $password);
        		if ($result) {
        			header('location: ../index.php');
        		} else {
        			header('location: ../registrasi.php');
        		}
        	}
            break;
        case 'login':
            $username = isset($_POST['username']) ? $_POST['username'] : "";
            $password = isset($_POST['password']) ? md5($_POST['password']) : "";
            $result = $um->user_login_check($username, $password);
            $jumlah_data = mysqli_num_rows($result);
            $d = mysqli_fetch_array($result);
            if ($jumlah_data > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $d['id'];
                header('location: ../dashboard.php');
            } else {
                header('location: ../index.php');
            }
            break;
        default:
            // code...
            break;
    }
}
?>
