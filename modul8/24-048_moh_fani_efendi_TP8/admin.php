<?php 
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
    <style>
        .navbar{
            background: #0b63c5;
            padding: 10px;
            color: white;
        }
        .navbar a{
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }
        .right{
            float: right;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="#">Sistem Penjualan</a>
    <a href="#">Home</a>
    
    <?php if($_SESSION['level'] == 1){ ?>
        <a href="#">Data Master</a>
    <?php } ?>

    <a href="#">Transaksi</a>
    <a href="#">Laporan</a>

    <span class="right">
        <?php echo $_SESSION['username']; ?> |
        <a href="logout.php" style="color: yellow;">Logout</a>
    </span>
</div>

<h2>Selamat datang, <?php echo $_SESSION['username']; ?></h2>

</body>
</html>
