<?php
/**
 *
 */
require_once 'Koneksi.php';
class User_model{
    private $conn;
    function __construct(){
        $db = new Koneksi();
        $this->conn = $db->db_connect();
    }

    public function user_registration($username, $password){
        $query = "INSERT INTO `user`(`username`, `password`) VALUES ('$username','".md5($password)."')";
        $result = mysqli_query($this->conn,$query) or die (mysqli_error($this->conn));
        return $result;
    }

    public function user_login_check($username, $password){
        $query = "SELECT
                  `id`,
                  `username`,
                  `password`
                FROM
                  `user`
                WHERE
                  `username` = '$username' AND `password` = '$password'
                ";
        echo $query;
        $result = mysqli_query($this->conn,$query) or die (mysqli_error($this->conn));
        return $result;
    }

    public function detail_user($id){
        // code...
    }
}

?>
