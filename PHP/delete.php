<?php 
    $conn = require "../config/config.php";

    $id = $_GET['id'];

    $query_del = "DELETE FROM mahasiswa WHERE id='$id'";
    
    if (mysqli_query($conn, $query_del)) {
        echo "
        <script>
                alert('Data berhasil dihapus');
                window.location.href = './index.php';
        </script>
        ";
    } else {
        echo "
        <script>
                alert('Data gagal dihapus');
                window.location.href = './index.php';
        </script>
        ";
    }
?>