<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $productName = $_POST["tensp"];
                $productPrice = $_POST["giasp"];

                if (!isset($_SESSION["products"])) {
                    $_SERVER["products"] = [];
                }

                $_SESSION["products"] [] = ['tensp' => $productName, 'giasp' => $productPrice];
            };
    ?>
    <form action="themSanpham.php" method="POST">
        <h1>Thêm sản phẩm mới</h1>
        Tên sản phẩm: <input type="text" name="tensp">
        <span>Giá sản phẩm <input type="text" name="giasp"></span>
        <button type="submit">Thêm sản phẩm</button>
    </form>
    
    <div id="productList">
        <h2>Danh sách sản phẩm</h2>
        <ul>
            <?php
                if (isset($_SESSION['products']) && count($_SESSION['products']) > 0) {
                    foreach ($_SESSION['products'] as $product) {
                        echo "<li>{$product['name']} - {$product['price']} VND</li>";
                    }
                } 
                else {
                    echo "<li>Chưa có sản phẩm nào.</li>";
                }
            ?>
        </ul>
    </div>

</body>
</html>