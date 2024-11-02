<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .baitho {
            width: 350px;
            height: auto;
            text-align: center;
            padding: 10px;
            background-color: pink;
        }
    </style>
</head>
<body>
    <?php
        // if (file_exists("baitho.txt")) {
        //     echo "có";
        // } else {
        //     echo "không có";
        // }
        $fh = fopen('baitho.txt','r') or die ('Tạo file thất bại');
        
        echo "<div class='baitho'>";
        while (!feof($fh)) {
            $line = fgets($fh);
            echo $line . "<br>";
        }
        echo "</div>";
    ?>    
</body>
</html>