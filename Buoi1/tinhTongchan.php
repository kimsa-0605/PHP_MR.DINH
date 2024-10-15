<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sum = 0;
        $sumC = 0;
        $sumL = 0;
        for ($i=0; $i<=5; $i++) {
            $sum += $i;
            if ($i % 2 == 0) {
                $sumC += $i;
            }
            else {
                $sumL += $i;
            }
        }

        // kết quả
        echo $sum ;
        echo "<br>";
        echo $sumC;
        echo "<br>";
        echo $sumL;
        ?>
</body>
</html>