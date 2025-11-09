<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_nota = $_POST['no_nota'];
    $tgl_nota = $_POST['tgl_nota'];
    $nama_pelanggan = $_POST['nama_pelanggan'];

    // Simpan data ke tabel nota (master)
    $queryMaster = mysqli_query($koneksi, "INSERT INTO nota (no_nota, tgl_nota, nama_pelanggan)
                                           VALUES ('$no_nota', '$tgl_nota', '$nama_pelanggan')");

    if ($queryMaster) {
        // Ambil id_nota terakhir
        $id_nota = mysqli_insert_id($koneksi);

        // Simpan data ke tabel nota_detail (detail barang)
        for ($i = 0; $i < count($_POST['nama_barang']); $i++) {
            $barang = $_POST['nama_barang'][$i];
            $qty = $_POST['qty'][$i];
            $harga = $_POST['harga'][$i];

            mysqli_query($koneksi, "INSERT INTO nota_detail (id_nota, nama_barang, qty, harga)
                                    VALUES ('$id_nota', '$barang', '$qty', '$harga')");
        }

        echo "<script>alert('Transaksi berhasil disimpan!'); window.location='nota.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan transaksi!'); window.location='nota.php';</script>";
    }
}
?>
