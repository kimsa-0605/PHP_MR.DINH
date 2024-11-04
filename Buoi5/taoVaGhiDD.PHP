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
            justify-content: center;
            align-items: center;
        }
        form, .hienthi {
            width: 300px;
            height: auto;
            background-color: palevioletred;
            padding: 10px;
        }
        form .p {
            margin: 0px;
            padding-top: 10px;
        }

        form .title {
            height: 40px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            background-color: rgb(226, 19, 88);
            color: azure;
            margin: 0px;
        }
        button {
            margin-top: 10px;
        }

        .hienthi {
            display: flex;
            margin-top: 20px;
            flex-direction: column;
            justify-content: center;
        }

        .hienthi .title {
            text-align: center;
            margin: 0px;
            padding: 10px 0px 10px 0px;
            font-size: 15px;
            font-weight: bold;
        }

        .hienthi table, tr, td, th {
            border-collapse: collapse;
            border: 1px solid lightgray;
            text-align: center;
        }



    </style>
</head>
<body>
    <?php
        error_reporting(0);
        if (isset($_POST["ten_file"]) && isset($_POST["ten_hang"]) && isset($_POST["sluong"]) && isset($_POST["dgia"])){
            $tenfile = $_POST["ten_file"];
            $tenhang = $_POST["ten_hang"];
            $sl = $_POST["sluong"];
            $dg = $_POST["dgia"];
            $thanhtien = $sl * $dg;
        }
    ?>
    <form action="taoVaGhiDD.php" method="post">
        <p class="title">TẠO - GHI VÀ ĐỌC FILE VỪA TẠO</p>
        <p class="p">Ten file: <input type="text" name="ten_file" value="<?php echo $tenfile ?>"></p> <br>
        <p class="p">Ten hang: <input type="text" name="ten_hang" value="<?php echo $tenhang ?>"></p> <br>
        <p class="p">So luong: <input type="number" name="sluong" value="<?php echo $sl ?>"></p> <br>
        <p class="p">Don gia: <input type="number" name="dgia" value="<?php echo $dg ?>"></p>

        <button name="action" value="docfile" type="submit">Ghi và đọc file</button>
    </form>

    <?php 
         error_reporting(0);
         if (isset($_POST["action"])) {
            $action = $_POST["action"];
         }
         if ($action == "docfile") {
            $file = fopen($tenfile,"a+");
            $sanpham = $tenhang."\t".$sl."\t".$dg."\t".$thanhtien."\n";
            fwrite($file, $sanpham);
            fclose($file);
            echo "Tao va ghi file thanh cong";
         }

         $file = fopen($tenfile,"r");
         echo "
            <div class='hienthi'>
                <p class='title'>Noi dung cua file: </p>
                <table>
                    <tr>
                        <th>Ten hang</th>
                        <th>So luong</th>
                        <th>Don gia</th>
                        <th>Thanh tien</th>
                    </tr>
         ";
         while (!feof($file)) {
            echo "<tr>";
            $line = fgets($file);
            $mang = explode("\t", $line);
            echo "<td>$mang[0]</td>
                  <td>$mang[1]</td>
                  <td>$mang[2]</td>
                  <td>$mang[3]</td>
            ";
            echo "</tr>";
         }
         echo "</table>";
         echo "<p class='title'>Doc file thanh cong!!</p>";
         echo "</div>";
    ?>
</body>
</html>