
<?php
include 'config/database.php';

$query = "SELECT idmargin_penjualan, created_at, persen, status, iduser
          FROM margin_penjualan";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Margin Penjualan - TechStore</title>
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
        <a href="margin.php" class="active">Margin Penjualan</a>
        <a href="satuan.php">Satuan</a>
        <a href="vendor.php">Vendor</a>
        <a href="barang.php">Barang</a>
    </div>

    <div class="main-content">
        <h1>Data Margin Penjualan</h1>

        <div class="content-box">
            <div class="header-table">
                <h2>Daftar Margin Penjualan</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Margin</th>
                        <th>Persen</th>
                        <th>Status</th>
                        <th>ID User</th>
                        <th>Tanggal Dibuat</th>
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
                        <td><?= htmlspecialchars($row['idmargin_penjualan']); ?></td>
                        <td><?= htmlspecialchars($row['persen']); ?>%</td>
                        <td>
                            <?= $row['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?>
                        </td>
                        <td><?= htmlspecialchars($row['iduser']); ?></td>
                        <td><?= htmlspecialchars($row['created_at']); ?></td>
                    </tr>
                    <?php
                        }
                    } else {
                    ?>
                    <tr>
                        <td colspan="6">Belum ada data margin penjualan.</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
