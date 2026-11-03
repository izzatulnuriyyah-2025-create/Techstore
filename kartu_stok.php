
<?php
include 'config/database.php';

$query = "SELECT * FROM view_kartu_stok";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Stok - TechStore</title>
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
    <a href="penerimaan.php">Penerimaan</a>
    <a href="penjualan.php">Penjualan</a>
    <a href="retur.php">Retur</a>
</div>

<div class="main-content">
    <h1>Kartu Stok</h1>

    <div class="card">
        <h2>Daftar Kartu Stok</h2>

        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Kartu Stok</th>
                        <th>Jenis Transaksi</th>
                        <th>Stok Masuk</th>
                        <th>Stok Keluar</th>
                        <th>Stok</th>
                        <th>Tanggal Dibuat</th>
                        <th>ID Transaksi</th>
                        <th>ID Barang</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars((string)$row['idkartu_stok']) ?></td>
                        <td><?= htmlspecialchars((string)$row['jenis_transaksi']) ?></td>
                        <td><?= htmlspecialchars((string)$row['masuk']) ?></td>
                        <td><?= htmlspecialchars((string)$row['keluar']) ?></td>
                        <td><?= htmlspecialchars((string)$row['stock']) ?></td>
                        <td><?= htmlspecialchars((string)$row['created_at']) ?></td>
                        <td><?= htmlspecialchars((string)$row['idtransaksi']) ?></td>
                        <td><?= htmlspecialchars((string)$row['idbarang']) ?></td>
                    </tr>
                <?php } ?>

                <?php if (mysqli_num_rows($result) == 0) { ?>
                    <tr>
                        <td colspan="9">Belum ada data kartu stok.</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
