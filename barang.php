
<?php
include 'config/database.php';

$query = "SELECT b.idbarang, b.jenis, b.nama, s.nama_satuan,
                 b.status, b.harga
          FROM barang b
          LEFT JOIN satuan s ON b.idsatuan = s.idsatuan";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang - TechStore</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="sidebar">
        <h2>TECHSTORE</h2>
        <p class="menu-title">MENU UTAMA</p>
        <a href="index.php">Dashboard</a>

        <p class="menu-title">DATA MASTER</p>
        <a href="role.php">Role</a>
        <a href="user.php">User</a>
        <a href="margin.php">Margin Penjualan</a>
        <a href="satuan.php">Satuan</a>
        <a href="vendor.php">Vendor</a>
        <a href="barang.php" class="active">Barang</a>
    </div>

    <div class="main-content">
        <h1>Data Barang</h1>

        <div class="content-box">
            <div class="header-table">
                <h2>Daftar Barang</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Barang</th>
                        <th>Jenis</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Status</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['idbarang']); ?></td>
                        <td><?= htmlspecialchars($row['jenis']); ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['nama_satuan'] ?? '-'); ?></td>
                        <td><?= $row['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                        <td>Rp <?= number_format((float)$row['harga'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php
                        }
                    } else {
                    ?>
                    <tr>
                        <td colspan="7">Belum ada data barang.</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
