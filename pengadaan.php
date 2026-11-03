
<?php
include 'config/database.php';

$query = "SELECT * FROM view_pengadaan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengadaan - TechStore</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="sidebar">
    <h2>TECHSTORE</h2>

    <p>MENU UTAMA</p>
    <a href="index.php">Dashboard</a>

    <p>DATA MASTER</p>
    <a href="role.php">Role</a>
    <a href="user.php">User</a>
    <a href="margin.php">Margin Penjualan</a>
    <a href="satuan.php">Satuan</a>
    <a href="vendor.php">Vendor</a>
    <a href="barang.php">Barang</a>

    <p>TRANSAKSI</p>
    <a href="kartu_stok.php">Kartu Stok</a>
    <a href="pengadaan.php">Pengadaan</a>
    <a href="detail_pengadaan.php">Detail Pengadaan</a>
    <a href="penerimaan.php">Penerimaan</a>
    <a href="detail_penerimaan.php">Detail Penerimaan</a>
    <a href="penjualan.php">Penjualan</a>
    <a href="detail_penjualan.php">Detail Penjualan</a>
    <a href="retur.php">Retur</a>
    <a href="detail_retur.php">Detail Retur</a>
</div>

<div class="main-content">
    <h1>Data Pengadaan</h1>

    <div class="card">
        <h2>Daftar Pengadaan</h2>

        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pengadaan</th>
                        <th>Tanggal</th>
                        <th>ID User</th>
                        <th>Status</th>
                        <th>ID Vendor</th>
                        <th>Subtotal</th>
                        <th>PPN</th>
                        <th>Total Nilai</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars((string)$row['idpengadaan']) ?></td>
                        <td><?= htmlspecialchars((string)$row['timestamp']) ?></td>
                        <td><?= htmlspecialchars((string)$row['user_iduser']) ?></td>
                        <td><?= htmlspecialchars((string)$row['status']) ?></td>
                        <td><?= htmlspecialchars((string)$row['vendor_idvendor']) ?></td>
                        <td>Rp <?= number_format((float)$row['subtotal_nilai'], 0, ',', '.') ?></td>
                        <td>Rp <?= number_format((float)$row['ppn'], 0, ',', '.') ?></td>
                        <td>Rp <?= number_format((float)$row['total_nilai'], 0, ',', '.') ?></td>
                    </tr>
                <?php
                }

                if (mysqli_num_rows($result) == 0) {
                ?>
                    <tr>
                        <td colspan="9">Belum ada data pengadaan.</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
