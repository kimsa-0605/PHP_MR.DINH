<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .input {
            width: 50px;
            height: 20px;
        }

        .submit {
            margin-top: 10px;
        }

        .kq {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
        error_reporting(0);
        function tinhTong() {
            $a = $_POST["hsa"];
            $b = $_POST["hsb"];
            return  $a + $b;
        }
        $result = "Tong la: ". tinhTong();
    ?>
    <div class="container">
        <form action="function.php" method="POST">
            So a: <input type="text" name="hsa" placeholder="Nhap so a" class="input">
            So b: <input type="text" name="hsb" placeholder="Nhap so b" class="input">
            <br>
            <input type="submit" Value="Submit" class="submit">
            <p class="kq">
                <?php 
                    echo $result; 
                ?>
            </p>
        </form>
    </div>
</body>
</html>