<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h2>Report Penjualan</h2>

<form method="GET">
    Tanggal Awal:
    <input type="date" name="awal" required>

    Tanggal Akhir:
    <input type="date" name="akhir" required>

    <button type="submit">Tampilkan</button>
</form>

<hr>

<?php 
if (isset($_GET['awal'])) {

$awal = $_GET['awal'];
$akhir = $_GET['akhir'];

echo "<h3>Periode $awal sampai $akhir</h3>";

$q = mysqli_query($koneksi, "
    SELECT tanggal, SUM(qty*harga) AS total
    FROM penjualan 
    JOIN penjualan_detail USING(id_penjualan)
    WHERE tanggal BETWEEN '$awal' AND '$akhir'
    GROUP BY tanggal
");

$tanggal = [];
$total = [];

while ($d = mysqli_fetch_assoc($q)) {
    $tanggal[] = $d['tanggal'];
    $total[] = $d['total'];
}
?>

<h3>Grafik Penjualan</h3>
<canvas id='grafik'></canvas>

<script>
new Chart(document.getElementById('grafik'), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($tanggal); ?>,
        datasets: [{
            label: 'Total Penjualan',
            data: <?php echo json_encode($total); ?>
        }]
    }
});
</script>

<br>
<button onclick="window.location='report_print.php?awal=<?=$awal?>&akhir=<?=$akhir?>'">Print</button>
<button onclick="window.location='report_excel.php?awal=<?=$awal?>&akhir=<?=$akhir?>'">Export Excel</button>

<hr>
<h3>Rekap Penjualan</h3>

<table border="1" cellpadding="5">
<tr>
    <th>Tanggal</th>
    <th>Pelanggan</th>
    <th>Total</th>
</tr>

<?php
$r = mysqli_query($koneksi,"
    SELECT tanggal, pelanggan, SUM(qty*harga) AS total
    FROM penjualan 
    JOIN penjualan_detail USING(id_penjualan)
    WHERE tanggal BETWEEN '$awal' AND '$akhir'
    GROUP BY id_penjualan
");

$totalPendapatan = 0;
$pelanggan = [];

while ($row = mysqli_fetch_assoc($r)) {
    echo "<tr>
        <td>{$row['tanggal']}</td>
        <td>{$row['pelanggan']}</td>
        <td>{$row['total']}</td>
    </tr>";

    $totalPendapatan += $row['total'];
    $pelanggan[] = $row['pelanggan'];
}
?>

</table>

<hr>
<h3>Total</h3>
<p>Jumlah Pelanggan: <?= count(array_unique($pelanggan)); ?> Orang</p>
<p>Total Pendapatan: Rp <?= number_format($totalPendapatan); ?></p>

<?php } ?>

</body>
</html>
