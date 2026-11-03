
<?php
include 'config/database.php';

$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iddetail_pengadaan = (int) $_POST['iddetail_pengadaan'];
    $harga_satuan = (float) $_POST['harga_satuan'];
    $jumlah = (int) $_POST['jumlah'];
    $idbarang = (int) $_POST['idbarang'];
    $idpengadaan = (int) $_POST['idpengadaan'];

    $query_insert = "INSERT INTO detail_pengadaan
        (iddetail_pengadaan, harga_satuan, jumlah, sub_total, idbarang, idpengadaan)
        VALUES (?, ?, ?, 0, ?, ?)";

    $stmt = mysqli_prepare($conn, $query_insert);

    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            "idiii",
            $iddetail_pengadaan,
            $harga_satuan,
            $jumlah,
            $idbarang,
            $idpengadaan
        );

        if (mysqli_stmt_execute($stmt)) {
            $pesan = "Detail pengadaan berhasil ditambahkan!";
        } else {
            $pesan = "Gagal menambahkan data: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        $pesan = "Gagal menyiapkan query: " . mysqli_error($conn);
    }
}

$query = "SELECT * FROM view_detail_pengadaan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengadaan - TechStore</title>
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
    <h1>Detail Pengadaan</h1>

    <div class="card">
        <h2>Tambah Detail Pengadaan</h2>

        <?php if ($pesan != '') { ?>
            <p><?= htmlspecialchars($pesan) ?></p>
        <?php } ?>

        <form method="POST">
            <label>ID Detail Pengadaan</label>
            <input type="number" name="iddetail_pengadaan" required>

            <label>Harga Satuan</label>
            <input type="number" name="harga_satuan" min="0" required>

            <label>Jumlah</label>
            <input type="number" name="jumlah" min="1" required>

            <label>ID Barang</label>
            <input type="number" name="idbarang" min="1" required>

            <label>ID Pengadaan</label>
            <input type="number" name="idpengadaan" min="1" required>

            <button type="submit">Simpan</button>
        </form>
    </div>

    <div class="card">
        <h2>Daftar Detail Pengadaan</h2>

        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Detail Pengadaan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>ID Barang</th>
                        <th>ID Pengadaan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars((string)$row['iddetail_pengadaan']) ?></td>
                        <td>Rp <?= number_format((float)$row['harga_satuan'], 0, ',', '.') ?></td>
                        <td><?= htmlspecialchars((string)$row['jumlah']) ?></td>
                        <td>Rp <?= number_format((float)$row['sub_total'], 0, ',', '.') ?></td>
                        <td><?= htmlspecialchars((string)$row['idbarang']) ?></td>
                        <td><?= htmlspecialchars((string)$row['idpengadaan']) ?></td>
                    </tr>
                <?php } ?>

                <?php if (mysqli_num_rows($result) == 0) { ?>
                    <tr>
                        <td colspan="7">Belum ada detail pengadaan.</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
