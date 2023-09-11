<?php
require_once("koneksi.php");
$username = $_POST['username'];
$pass = $_POST['password'];
$level = $_POST['level'];
$sql = "SELECT * FROM user WHERE username = '$username'";
$query = $db->query($sql);
if($query->num_rows != 0) {
echo "<div align='center'>Username Sudah Terdaftar! <a
href='daftar.php'>Back</a></div>";
} else {
if(!$username || !$pass) {
echo "<div align='center'>Masih ada data yang kosong! <a href='daftar.php'>Back</a>";
} else {
$data = "INSERT INTO user VALUES (NULL, '$username', '$pass','$level')";
$simpan = $db->query($data);
if($simpan) {
    echo '<script>alert("Pendaftaran Sukses");</script>';
    header('Location:login.php');
} else {
echo "<div align='center'>Proses Gagal!</div>";
}
}
}
?>