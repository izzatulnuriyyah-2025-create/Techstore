
<?php
include 'config/database.php';

$query = "SELECT idvendor, nama_vendor, badan_hukum, status
          FROM vendor";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Vendor - TechStore</title>
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
        <a href="vendor.php" class="active">Vendor</a>
        <a href="barang.php">Barang</a>
    </div>

    <div class="main-content">
        <h1>Data Vendor</h1>

        <div class="content-box">
            <div class="header-table">
                <h2>Daftar Vendor</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Vendor</th>
                        <th>Nama Vendor</th>
                        <th>Badan Hukum</th>
                        <th>Status</th>
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
                        <td><?= htmlspecialchars($row['idvendor']); ?></td>
                        <td><?= htmlspecialchars($row['nama_vendor']); ?></td>
                        <td><?= htmlspecialchars($row['badan_hukum']); ?></td>
                        <td><?= htmlspecialchars($row['status']); ?></td>
                    </tr>
                    <?php
                        }
                    } else {
                    ?>
                    <tr>
                        <td colspan="5">Belum ada data vendor.</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
