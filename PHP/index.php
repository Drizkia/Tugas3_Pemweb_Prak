<?php 
    $conn = require '../config/config.php';

    if (isset($_GET['cari'])) {
        $cari = trim($_GET['cari']);
    } else {
        $cari = '';
    }

    if ($cari == "") {
        $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    } else {
        $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim LIKE '$cari' OR nama LIKE '$cari' OR jenis_kelamin LIKE '$cari'");
    }


    if (!$result) {
        echo (mysqli_error($conn));
    }

    $nomor = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speda</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="navbar">
        <div class="Logo">
            <a href="./index.php"><img src="../img/Logo.png" alt="Logo">Speda</a>
        </div>
        <a href="./index.php">Home</a>
        <a href="./tambah.php">Tambah Mahasiswa</a>
    </div>

    <div class="container">
        <div class="home">
            <h1>Daftar Mahasiswa</h1>
            <div class="search-box">
                <form action="./index.php" method="get">
                    <input type="text" name="cari" id="search" placeholder="Cari Mahasiswa" value="<?= $cari ?>">
                    <button type="submit">Cari</button>
                </form>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) == 0): ?>
                <tr>
                    <td colspan="5" style="text-align:center; padding:10;">Tidak Ada Data</td>
                </tr>
            <?php else : ?>
            <?php while ($x = mysqli_fetch_object($result)) :?>
                <tr>
                    <td> <?= $nomor += 1 ?> </td>
                    <td> <?= $x->nim ?> </td>
                    <td> <?= $x->nama ?> </td>
                    <td> <?= $x->jenis_kelamin ?> </td>
                    <td>
                        <div class="tombol">
                            <a href="./update.php?id=<?= $x->id ?>" class="update">Update</a>
                            <a href="./delete.php?id=<?= $x->id ?>" class="delete" onclick="return confirm('Apakah anda yakin menghapus data dengan nama <?= $x->nama ?> ?')">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile;
            endif;?>
        </tbody>
    </table>
</body>
</html>