
<?php
include 'config/database.php';

$query = "SELECT idsatuan, nama_satuan, status FROM satuan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Satuan - TechStore</title>
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
        <a href="satuan.php" class="active">Satuan</a>
        <a href="vendor.php">Vendor</a>
        <a href="barang.php">Barang</a>
    </div>

    <div class="main-content">
        <h1>Data Satuan</h1>

        <div class="content-box">
            <div class="header-table">
                <h2>Daftar Satuan</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Satuan</th>
                        <th>Nama Satuan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['idsatuan']); ?></td>
                        <td><?= htmlspecialchars($row['nama_satuan']); ?></td>
                        <td><?= $row['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                    </tr>
                    <?php }
                    } else { ?>
                    <tr>
                        <td colspan="4">Belum ada data satuan.</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
