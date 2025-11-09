<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Nota & Barang</title>
    <script>
        
        function tambahBaris() {
            let tabel = document.getElementById("tabelBarang");
            let barisBaru = tabel.insertRow(-1);
            barisBaru.innerHTML = `
                <td><input type="text" name="nama_barang[]" required></td>
                <td><input type="number" name="qty[]" required></td>
                <td><input type="number" name="harga[]" required></td>
                <td><button type="button" onclick="hapusBaris(this)">Hapus</button></td>
            `;
        }

        
        function hapusBaris(btn) {
            let row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
</head>
<body>
    <h2>Form Input Nota dan Detail Barang</h2>

    <form action="simpan_nota.php" method="post">
        <fieldset>
            <legend>Data Nota (Master)</legend>
            <label>No Nota:</label><br>
            <input type="text" name="no_nota" required><br><br>

            <label>Tanggal:</label><br>
            <input type="date" name="tgl_nota" required><br><br>

            <label>Nama Pelanggan:</label><br>
            <input type="text" name="nama_pelanggan" required><br><br>
        </fieldset>

        <fieldset>
            <legend>Data Barang (Detail)</legend>
            <table border="1" id="tabelBarang" cellpadding="5">
                <tr>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <td><input type="text" name="nama_barang[]" required></td>
                    <td><input type="number" name="qty[]" required></td>
                    <td><input type="number" name="harga[]" required></td>
                    <td><button type="button" onclick="hapusBaris(this)">Hapus</button></td>
                </tr>
            </table>
            <br>
            <button type="button" onclick="tambahBaris()">+ Tambah Barang</button>
        </fieldset>

        <br>
        <input type="submit" value="Simpan Transaksi">
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
