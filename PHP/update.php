<?php 
    $conn = require "../config/config.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM mahasiswa WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_object($result);

    
    if (isset($_POST["update"])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
    
        $query_u = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin', created_at=NOW() WHERE id='$id'";
        if (mysqli_query($conn, $query_u)) {
            echo "
            <script>
                alert('Data berhasil disimpan!');
                window.location.href = './index.php';
            </script>
            ";
            exit;
        } else {
            echo "
            <script>
                alert('Gagal menyimpan data!');
                window.location.href = './tambah.php';
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speda</title>
    <link rel="stylesheet" href="../CSS/style2.css">
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
        <h1>Tambah Mahasiswa</h1>
        <div class="isian">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $data->id ?>">
                <div class="masuk">
                    <p>NIM</p>
                    <input type="number" name="nim" id="I-nim" value="<?= $data->nim ?>">
                    <p>Nama</p>
                    <input type="text" name="nama" id="I-nama" value="<?= $data->nama ?>">
                </div>
                <div class="kelamin">
                    <p>Jenis Kelamin</p>
                    <label>
                        <input type="radio" name="jenis_kelamin" id="I-laki" value="Laki-laki" <?= $data->jenis_kelamin == "Laki-laki" ? "checked" : "" ?>> Laki Laki
                    </label>
                    <label>
                        <input type="radio" name="jenis_kelamin" id="I-perempuan" value="Perempuan" <?= $data->jenis_kelamin == "Perempuan" ? "checked" : "" ?>> Perempuan
                    </label>
                </div>
                <button type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</body>
</html>