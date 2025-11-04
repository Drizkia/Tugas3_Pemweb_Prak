<?php 

    $conn = mysqli_connect('localhost', 'root', '', 'tugas3_pemweb_prak');
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    return $conn;
?>