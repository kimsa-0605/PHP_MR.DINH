<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 200px;
            height: 100px;
        }
    </style>
</head>
<body>
    <?php 
        session_start();
        error_reporting(0);
        echo "Kết quả sau khi nhấn Click here"."<br>";
        echo "<img src='https://images2.thanhnien.vn/528068263637045248/2024/1/25/e093e9cfc9027d6a142358d24d2ee350-65a11ac2af785880-17061562929701875684912.jpg'>"."<br>";
        echo "Xin chào ".$_SESSION["hoten"]."<br>";
        echo "<b><a href='formDangNhap.php'>Click here</a></b>";  
    ?>
</body>
</html>