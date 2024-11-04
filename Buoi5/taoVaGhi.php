<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            width: 300px;
            height: auto;
            background-color: palevioletred;
            margin: 0 auto;
            padding: 20px;
        }
        .p {
            margin: 0px;
            padding-bottom: 10px;
        }
        .title {
            height: 40px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            background-color: rgb(226, 19, 88);
            color: azure;
            margin-bottom: 15px;
        }
        button {
            margin-bottom: 10px;
        }

        .hienthi {
            width: 300px;
            margin-top: 20px;
            padding: 20px;
            background-color: palevioletred;
        }
    </style>
</head>
<body>
    <?php
        error_reporting(0);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['ten']) && !empty($_POST['noiDung'])) {
            $ten = $_POST["ten"];
            $ND = $_POST["noiDung"];

            $file = fopen($ten, 'w+');
            fwrite($file, $ND);
            fclose($file);
        }
    ?>
    
    <form action="taoVaGhi.php" method="post">
        <p class="title">TẠO - GHI VÀ ĐỌC FILE VỪA TẠO</p>
        <p class="p">Tên file: <input type="text" name="ten" value="<?php echo  $ten ?>"></p>
        <p class="p">Nội dung: <textarea name="noiDung"><?php echo  $ND ?></textarea></p>
        <button name="action" value="docfile" type="submit">Ghi và đọc file</button>
    </form>
    
    
        <?php
            error_reporting(0);
            if (isset($_POST['action'])) {
                echo '<div class="hienthi">';
                $file = fopen($ten, 'r');
                if ($file) {
                    while (!feof($file)) {
                        $line = fgets($file);
                        echo htmlspecialchars($line) . "<br>";
                    }
                    fclose($file);
                } else {
                    echo "Không thể đọc file.";
                }
                echo '</div>';
            }
        ?>
</body>
</html>
