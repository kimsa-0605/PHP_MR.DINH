<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        error_reporting(0);
        function chanLe($number) {
            $kq = '';
           if ($number % 2 == 0) {
                $kq = "so chan";
           }else {
                $kq = "so le";
           }
           return $kq;
        }

        $number = $_POST["number"];
        $result = "So la: ". chanLe($number);
    ?>

    <div class="container">
        <form action="chanle.php" method="POST">
            Number: <input type="number" name="number" placeholder="Number" class="input">
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