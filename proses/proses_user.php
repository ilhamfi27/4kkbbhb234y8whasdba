<?php
include_once '../koneksi.php';
session_start();
if(isset($_GET['proses'])){
    switch ($_GET['proses']) {
        case 'registrasi':
        	$username = isset($_POST['username']) ? $_POST['username'] : "";
        	$password = isset($_POST['password']) ? $_POST['password'] : "";
        	$password_confirm = isset($_POST['password']) ? $_POST['password'] : "";
        	if ($password == $password_confirm) {
        		$query = "INSERT INTO `user`(`username`, `password`) VALUES ('$username','".md5($password)."')";
        		$result = mysqli_query($conn,$query);
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
            $query = "SELECT `id`, `username`, `password` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
            $result = mysqli_query($conn, $query);
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
