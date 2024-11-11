<?php 
    $myspli = new mysqli("localhost", "root", "", "");

    if ($myspli === false) {
        die ("LỖI".$myspli->connect_error);
    }

    $sql = "CREATE DATABASE SANPHAM";
    
    if ($myspli->query($sql) === true) {
        echo "Kết nối thành công";
    }
    else {
        echo "Kết nói chưa thành công";
    }
?>;
