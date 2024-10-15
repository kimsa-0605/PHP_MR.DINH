<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = 5;
        if ($a % 2 == 0) {
            echo "số chẵn";
        }
        else {
            echo "số lẻ";
        }

        // Ví dụ về điểm
        $diem = 8;
        if ($diem >= 9) {
            echo "Xuất sắc";
        }
        elseif ($diem >= 8) {
            echo "gioi";
        }
        else {
            echo "học lại nhé";
        }
    ?>
</body>
</html>