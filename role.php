<?php
include 'config/database.php';

$query = "SELECT idrole, nama_role FROM role";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Role - TechStore</title>

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="sidebar">
        <h2>TECHSTORE</h2>

        <p class="menu-title">MENU UTAMA</p>
        <a href="index.php">Dashboard</a>

        <p class="menu-title">DATA MASTER</p>
        <a href="role.php" class="active">Role</a>
        <a href="user.php">User</a>
        <a href="margin.php">Margin Penjualan</a>
        <a href="satuan.php">Satuan</a>
        <a href="vendor.php">Vendor</a>
        <a href="barang.php">Barang</a>
    </div>

    <div class="main-content">

        <h1>Data Role</h1>

        <div class="content-box">

            <div class="header-table">
                <h2>Daftar Role</h2>

                <button class="btn-tambah">
                    + Tambah Role
                </button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Role</th>
                        <th>Nama Role</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['idrole']; ?></td>
                        <td><?= $row['nama_role']; ?></td>
                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</body>
</html>