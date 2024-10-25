<?php
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h3 {
            margin-bottom: 0px;
        }
    </style>
</head>
<body>
    <form action="themsanPham2.php" method="post">
        <h1>Thêm sản phẩm mới</h1>
        <p>Tên sản phẩm: <input type="text" name="name" value="<?php echo $_POST['name']?>"></p>
        <p>Giá sản phẩm: <input type="text" name="price" value="<?php echo $_POST['price']?>"></p>
        <input type="submit" name="button" value="Thêm sản phẩm">
    </form>
</body>
</html>

<?php
    session_start();
    error_reporting(0);

    if (!empty($_POST["name"]) && !empty($_POST["price"])) {
        $sanpham = [
            'name' => $_POST["name"],
            "price"=> $_POST["price"]
        ];
        if (!isset($_SESSION['sanpham'])) {
            $_SESSION['sanpham'] = [];
        }
        // $_SESSION['sanpham'][] = $sanpham;

        array_push($_SESSION["sanpham"], $sanpham );
        echo "<h3>Thông tin khách hàng </h3>"."<br>";      
        foreach ($_SESSION['sanpham'] as $sanpham) {
            echo "<li>".$sanpham['name']. " - ".$sanpham['price']." VNĐ <br>";
        }
    }
?>