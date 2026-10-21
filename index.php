<?php
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="sidebar">
        <h2>TECHSTORE</h2>

        <p class="menu-title">MENU UTAMA</p>

        <a href="index.php" class="active">Dashboard</a>

        <p class="menu-title">DATA MASTER</p>

        <a href="role.php">Role</a>
        <a href="user.php">User</a>
        <a href="margin.php">Margin Penjualan</a>
        <a href="satuan.php">Satuan</a>
        <a href="vendor.php">Vendor</a>
        <a href="barang.php">Barang</a>
    </div>

    <div class="content">

        <div class="topbar">
            <h1>Dashboard</h1>
            <span>Database Sistem TechStore</span>
        </div>

        <div class="welcome">
            <h2>Selamat Datang di TechStore 👋</h2>
            <p>
                Sistem Inventaris dan Penjualan TechStore
            </p>
        </div>

        <div class="cards">

            <div class="card">
                <h3>Role</h3>
                <p>Data hak akses pengguna</p>
                <a href="role.php">Kelola Data →</a>
            </div>

            <div class="card">
                <h3>User</h3>
                <p>Data pengguna sistem</p>
                <a href="user.php">Kelola Data →</a>
            </div>

            <div class="card">
                <h3>Margin Penjualan</h3>
                <p>Data margin penjualan</p>
                <a href="margin.php">Kelola Data →</a>
            </div>

            <div class="card">
                <h3>Satuan</h3>
                <p>Data satuan barang</p>
                <a href="satuan.php">Kelola Data →</a>
            </div>

            <div class="card">
                <h3>Vendor</h3>
                <p>Data vendor</p>
                <a href="vendor.php">Kelola Data →</a>
            </div>

            <div class="card">
                <h3>Barang</h3>
                <p>Data barang</p>
                <a href="barang.php">Kelola Data →</a>
            </div>

        </div>

    </div>

</body>
</html>