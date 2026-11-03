<?php
include 'config/database.php';

$query = "SELECT u.iduser, u.username, r.nama_role
          FROM `user` u
          JOIN role r ON u.idrole = r.idrole";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User - TechStore</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <div class="sidebar">
        <h2>TECHSTORE</h2>

        <p class="menu-title">MENU UTAMA</p>
        <a href="index.php">Dashboard</a>

        <p class="menu-title">DATA MASTER</p>
        <a href="role.php">Role</a>
        <a href="user.php" class="active">User</a>
        <a href="margin.php">Margin Penjualan</a>
        <a href="satuan.php">Satuan</a>
        <a href="vendor.php">Vendor</a>
        <a href="barang.php">Barang</a>
    </div>

    <div class="main-content">
        <h1>Data User</h1>

        <div class="content-box">
            <div class="header-table">
                <h2>Daftar User</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Role</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['iduser']); ?></td>
                        <td><?= htmlspecialchars($row['username']); ?></td>
                        <td><?= htmlspecialchars($row['nama_role']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
