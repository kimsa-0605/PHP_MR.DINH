<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .mangmau{
            color: red;
            font-size: 30px;
        }

        .mangdo{
            color: red;
            font-size: 30px;
        }

        .mangxanh{
            color: green;
            font-size: 30px;
        }

        .mangblue{
            color: blue;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <!-- Các phần thao tác với mảng
        kbao
        gán giá trị
        truy cập
        crud
        sort
        Find
        Filter
    -->

    <?php 
        $color = array("red", "blue", "Green");
        for ($i = 0; $i < count($color); $i++) {
            echo "<div class='mangmau'>$color[$i]</div>" ."<br>";
        }

        foreach ($color as $k) {
            echo $k ."<br>";
        }

        for ($i = 0; $i < count($color); $i++) {
            if ($color[$i] == "red") {
                echo "<div class='mangdo'>$color[$i]</div>" ."<br>";
            }else if ($color[$i] == "Green") {
                echo "<div class='mangxanh'>$color[$i]</div>" ."<br>";
            }else {
                echo "<div class='mangblue'>$color[$i]</div>" ."<br>";
            }   
        }
        
        //Mảng kết hợp
        $course = array (
            'Frontend' => array(
                'title' => 'Khoá học về lập trình front end online',
                'fee' => 1200000
            ),
            'PHP-MYSQL' => array(
                'title' => 'Khoá học về lập trình web php-mySQL',
                'fee' => 1200000
            )
        );

        foreach ($course as $key => $value) {
            echo "{$key}<br/> ";
            echo "--{$value ['title']}<br/>";
            echo "--{$value ['fee']}<br/>";
        }

        
    ?>
</body>
</html>