<?php 
    require_once('connect.php');
    error_reporting(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="wow.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php 
        require_once('connect.php');
        $sql = "SELECT image, price, name FROM products WHERE quantity = 10";
        $result = mysqli_query($conn, $sql);

        if ($result == true) {
            $i = 0;
            while ($kq = mysqli_fetch_assoc($result)) {
                $i++;
    ?>
        <div class="card" style="width: 18rem;">
            <!-- <img src="" alt="Slideshow" style="width:100%; height: 100%;"> -->
            <img src="<?php echo $kq['image']; ?>" class="card-img-top">
            <div class="card-body">
                <p class="card-text"><?php echo $kq['name']; ?></p>
                <p class="card-text"><?php echo $kq['price']; ?></p>
            </div>
        </div>
       <?php }} ?>
</body>
</html>