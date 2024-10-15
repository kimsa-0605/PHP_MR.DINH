<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $diem = 8;
        switch ($diem) {
            case 9: 
                echo "Xuất sắc";
                break;
            case 8:
                echo "Giỏi";
                break;
            default:
                echo "Ngu";
        }

        // Lưu ý 
        /**
         * Phải dùng giá trị chính xác không dùng giá trị so sánh 
         * Cho phép kiểu số thực trong switch --> nên chọn kiểu số nguyên với gtri chính xác
         */
    ?>
</body>
</html>