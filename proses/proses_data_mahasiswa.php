<?php
include_once '../koneksi.php';
if (isset($_GET['proses'])) {
    switch ($_GET['proses']) {
        case 'input':
            $nama_depan     = isset($_POST['nama_depan']) ? $_POST['nama_depan'] : "";
            $nama_belakang  = isset($_POST['nama_belakang']) ? $_POST['nama_belakang'] : "";
            $nim            = isset($_POST['nim']) ? $_POST['nim'] : "";
            $kelas          = isset($_POST['kelas']) ? $_POST['kelas'] : "";
            $tanggal_lahir  = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : "";
            $hobby          = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']) : "";
            $tempat_wisata  = isset($_POST['tempat_wisata']) ? implode(", ", $_POST['tempat_wisata']) : "";
            $genre_film     = isset($_POST['genre_film']) ? implode(", ", $_POST['genre_film']) : "";

            $query = "INSERT INTO `mahasiswa` (
                      `nim`,
                      `nama_depan`,
                      `nama_belakang`,
                      `kelas`,
                      `tanggal_lahir`,
                      `hobby`,
                      `wisata_favorit`,
                      `genre_film_favorit`
                    )
                    VALUES
                      (
                        '$nim',
                        '$nama_depan',
                        '$nama_belakang',
                        '$kelas',
                        '$tanggal_lahir',
                        '$hobby',
                        '$tempat_wisata',
                        '$genre_film'
                      );
                    ";
            $result = mysqli_query($conn, $query);
            if ($result) {
                header('location: ../dashboard.php');
            } else {
                header('location: ../new_data.php');
            }
            break;

        case 'update':
            $id             = isset($_POST['id']) ? $_POST['id'] : "";
            $nama_depan     = isset($_POST['nama_depan']) ? $_POST['nama_depan'] : "";
            $nama_belakang  = isset($_POST['nama_belakang']) ? $_POST['nama_belakang'] : "";
            $nim            = isset($_POST['nim']) ? $_POST['nim'] : "";
            $kelas          = isset($_POST['kelas']) ? $_POST['kelas'] : "";
            $tanggal_lahir  = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : "";
            $hobby          = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']) : "";
            $tempat_wisata  = isset($_POST['tempat_wisata']) ? implode(", ", $_POST['tempat_wisata']) : "";
            $genre_film     = isset($_POST['genre_film']) ? implode(", ", $_POST['genre_film']) : "";
            $query = "UPDATE
                          `mahasiswa`
                        SET
                          `nim` = 'nim',
                          `nama_depan` = '$nama_depan',
                          `nama_belakang` = '$nama_belakang',
                          `kelas` = '$kelas',
                          `tanggal_lahir` = '$tanggal_lahir',
                          `hobby` = '$hobby',
                          `wisata_favorit` = '$tempat_wisata',
                          `genre_film_favorit` = '$genre_film'
                        WHERE `id` = '$id';
                        ";
            $result = mysqli_query($conn, $query);
            if ($result) {
                header('location: ../dashboard.php');
            } else {
                header('location: ../edit.php?id='.$id);
            }
            break;
        case 'hapus':
            $id = $_GET['id'];
            $query = "DELETE
                        FROM
                          `mahasiswa`
                        WHERE `id` = '$id';
                        ";
            $result = mysqli_query($conn, $query);
            if ($result) {
                header('location: ../dashboard.php');
            } else {
                header('location: ../dashboard.php');
            }
            break;
        default:
            // code...
            break;
    }
}
?>
