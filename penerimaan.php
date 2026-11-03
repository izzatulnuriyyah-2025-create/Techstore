
<?php
include 'config/database.php';

$query = "SELECT * FROM view_penerimaan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penerimaan - TechStore</title>
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
    <h1>Data Penerimaan</h1>

    <div class="card">
        <h2>Daftar Penerimaan</h2>
        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Penerimaan</th>
                        <th>Tanggal Dibuat</th>
                        <th>Status</th>
                        <th>ID Pengadaan</th>
                        <th>ID User</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars((string)$row['idpenerimaan']) ?></td>
                        <td><?= htmlspecialchars((string)$row['created_at']) ?></td>
                        <td><?= htmlspecialchars((string)$row['status']) ?></td>
                        <td><?= htmlspecialchars((string)$row['idpengadaan']) ?></td>
                        <td><?= htmlspecialchars((string)$row['iduser']) ?></td>
                    </tr>
                <?php } ?>

                <?php if (mysqli_num_rows($result) == 0) { ?>
                    <tr>
                        <td colspan="6">Belum ada data penerimaan.</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
