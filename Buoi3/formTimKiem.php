<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formTimKiem.php" method="POST">
        Search <input type="text" name="search" placeholder="Search" class="input">
        <button type="submit">OK</button>
    </form>
    <?php 
        error_reporting(0);
        function Search ($search, $array) {
            return (array_search($search, $array));
        }
        $array = array("sa","thien","on","dieu","binh","hien","thanh");
        $search = $_POST["search"];
        echo "$search ở vị trí số ". Search($search, $array) ." trong mảng";
    ?>

</body>
</html>