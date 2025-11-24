<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

// ---- KODE DISINI ----
if($cek > 0){
    $data = mysqli_fetch_assoc($query);
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];  // simpan level untuk hak akses menu

    header("Location: admin.php");
} else {
    echo "Login gagal! <a href='login.php'>Coba lagi</a>";
}
?>
