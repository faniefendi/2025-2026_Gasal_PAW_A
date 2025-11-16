<?php
include "koneksi.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rekap_penjualan.xls");

$awal = $_GET['awal'];
$akhir = $_GET['akhir'];

$q = mysqli_query($koneksi,"
    SELECT tanggal, pelanggan, SUM(qty*harga) AS total
    FROM penjualan 
    JOIN penjualan_detail USING(id_penjualan)
    WHERE tanggal BETWEEN '$awal' AND '$akhir'
    GROUP BY id_penjualan
");
?>

<table border="1">
<tr>
    <th>Tanggal</th>
    <th>Pelanggan</th>
    <th>Total</th>
</tr>

<?php while ($d = mysqli_fetch_assoc($q)) { ?>
<tr>
    <td><?=$d['tanggal']?></td>
    <td><?=$d['pelanggan']?></td>
    <td><?=$d['total']?></td>
</tr>
<?php } ?>

</table>
