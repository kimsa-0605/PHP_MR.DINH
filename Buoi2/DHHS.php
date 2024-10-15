<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            html {
                font-family: Helvetica, Arial, sans-serif;
            }

            body {
                padding-top: 100px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 400px;
                height: auto;
                background-color: white;
                box-shadow: 0px 2px 5px black;
            }

            form {
                padding: 20px;
            }

            h2{
                text-align: center;
            }



            #kq {
                display: inline;
                text-align: center;
                padding: 5px 30px;
                margin-left: 4px;
                border-radius: 3px;
                background-color: white;
                border: 1px solid rgb(106, 105, 105);
            }

            #year {
                margin-left: 40px;
            }

            #danhHieu{
                font-size: 20px;
                text-align: center;
            }

            .nut {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 30px;
                margin-top: 50px;
            }

            .nut > .submit {
                width: 50px;
                height: 30px;
                border-radius: 5px;
                border: none;
                background-color: #205AA7;
            }
        </style>
</head>
<body>
    <?php
        error_reporting(0);
        function tinhDiemHS($s1, $s2, $year) {
            $diem = 0;
            if ($year == 1) {
                $diem = ($s1 + $s2) /2;
            }
            else{
                $diem = ($s1 + ($s2*2)) /3;
            }
            return $diem;
        }
        $s1 = $_POST["ky1"];
        $s2 = $_POST["ky2"];
        $year = $_POST["year"];
        $result = tinhDiemHS($s1, $s2, $year);

        function danhHieu($diemHS){
            $danhHieu = '';
            if ($diemHS >=9 && $diemHS <= 10) {
                $danhHieu = "Học sinh Xuất Sắc";
            }
            else if ($diemHS >= 8 && $diemHS < 9) {
                $danhHieu = "Học sinh Giỏi";
            }
            else {
                $danhHieu = "Học sinh Ngu";
            }
            return $danhHieu;
        }

        $kq = danhHieu($result);
    ?>
    <div class="container">
        <form action="DHHS.php" method="POST">
            <p class="title"><h2>BANG DIEM CUA EM</h2></p>
            <p>Semester 1 <input type="number" name="ky1" value="<?php echo $s1 ?>" id="semester1"></p>
            <p>Semester 2 <input type="number" name="ky2" value="<?php echo $s2 ?>" id="semester2"></p>
            <p>Year:
                <select name="year" value="<?php echo $year ?>">
                    <?php 
                        if ($_POST["year"] == 1) {
                            echo '<option value="1">1</option>
                            <option value="2">2</option>';
                        }else {
                            echo '<option value="2">2</option>
                            <option value="1">1</option>';
                        }
                    ?>
                </select>
            </p>

            <span>Sumaries:</span>
            <input type="text" id="kq" placeholder="Result" value=" <?php echo $result ?>">
            <div class="hiendanhhieu">
                <p class="danhHieu">
                    <?php 
                        echo $kq; 
                    ?>
                </p>
            </div>
            <div class="nut">
            <input type="submit" Value="Ok" class="submit">
            </div>
        </form>
    </div>
</body>
</html>