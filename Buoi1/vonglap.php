<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            width: 300px;
        }
        .ovuong {
            float: left;
            margin-left: 20px;
            width: 40px;
            height: 40px;
            background-color: #FF6699;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
    // Vòng lặp for
        for ($i=1; $i<=5; $i++ ) {
            for ($j=1; $j<=6; $j++ ){
                echo "<div class='ovuong'></div>";
            }
            
        }

    // Vòng lặp While
        $a = 1;
        while ( $a <= 5) {
            echo $a . "<br>";
            $a++;
        }
        
        $sum = 0;
        $sumC = 0;
        $sumL = 0;
        $b = 0;
        while ($b <= 5) {
            $sum += $b;
            if ($b % 2 == 0) {
                $sumC += $b;
            }
            else {
                $sumL += $b;
            }
            $b++;
        }
        echo "Kết quả là";
        echo "<br>";
        echo "Tổng: $sum";
        echo "<br>";
        echo "Tổng chẵn: $sumC";
        echo "<br>";
        echo "Tổng lẻ: $sumL";
        echo "<br>";

    // Vòng lặp do while
    
    // Vòng lặp For each
        $animal = array('Sa', 'Đức Thiện', 'Nga', 'Ơn');
        foreach ($animal as $key => $array_value) {
            echo "$array_value ";
            echo "$key ";
        }
    
    ?>
</body>
</html>