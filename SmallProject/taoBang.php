<?php 
    $mysqli = new mysqli("localhost", "root", "", "sanpham");

    if ($mysqli === false) {
        die ("LỖI".$mysqli->connect_error);
    }

    // Tạo bảng
    $sql = "CREATE TABLE THOITRANG(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        img VARCHAR(100) NOT NULL,
        names VARCHAR(50) NOT NULL,
        price VARCHAR(30) NOT NULL
    )";

    if ($mysqli->query($sql) === true) {
        echo "Table created successfully.";
    } else {
        echo "ERROR: Could not execute $sql. " . $mysqli->error;
    }

    // Đóng kết nối
    $mysqli->close();
?>