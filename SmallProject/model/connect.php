<?php
    $host = "localhost";
    $username = "root";
    $database = "sanpham";

    $conn = mysqli_connect($host, $username, "", $database);
    mysqli_set_charset($conn, 'UTF8');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        // echo "Kết nối thành công";
    }
?>