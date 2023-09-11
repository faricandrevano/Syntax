<?php
session_start();
require_once("koneksi.php");
$username = $_POST['username'];
$pass = $_POST['password'];
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$pass'";
$query = $db->query($sql);
$hasil = $query->fetch_assoc();
$level = $hasil['level'];
if($query->num_rows == 0) {
echo "<div align='center'>Username Belum Terdaftar! <a
href='login.php'>Back</a></div>";
} else {
if($pass <> $hasil['password']) {
echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
} else {
    if($level == 'User') {
        $_SESSION['level'] = $hasil['level'];
        header('location:user.php');
    } elseif($level == 'Admin') {
        $_SESSION['level'] =  $hasil['level'];
        header('location:admin.php');
    } elseif($level == 'Kasir') {
        $_SESSION['level'] =  $hasil['level'];
        header('location:kasir.php');
    }
}
}
?>