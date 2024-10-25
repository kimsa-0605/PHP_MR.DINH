<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $school = array(
            "Students" => array(
                "SV01" => array(
                    "name" => "Hồ Ly Kim Sa",
                    "birth" => "06/05/2005",
                    "gender" => "Nữ"

                ),
                "SV02" => array(
                    "name" => "Hồ Ly Kim Sa",
                    "birth" => "06/05/2005",
                    "gender" => "Nữ"

                ),
                "SV03" => array(
                    "name" => "Hồ Ly Kim Sa",
                    "birth" => "06/05/2005",
                    "gender" => "Nữ"

                )
            ),

            "Teachers" => array(
                "GV01" => array(
                    "name" => "Hồ Ly Kim Sa",
                    "birth" => "06/05/2005",
                    "gender" => "Nữ"

                ),
                "GV02" => array(
                    "name" => "Hồ Ly Kim Sa",
                    "birth" => "06/05/2005",
                    "gender" => "Nữ"

                ),
                "GV03" => array(
                    "name" => "Hồ Ly Kim Sa",
                    "birth" => "06/05/2005",
                    "gender" => "Nữ"

                )
            )
        );

        foreach ($school as $key => $value ) {
            echo "<h2>$key</h2>" . "<br>";
            foreach ($value as $key2 => $value2 ) {
                echo "MaSV: " . $key2 . "<br>";
                echo "Tên: " . $value2['name'] . "<br>";
                echo "Ngày sinh: " . $value2['birth'] . "<br>";
                echo "Giới tính: " . $value2['gender'] . "<br>";
        }
    }


    // sắp xếp
    //    chỉ số
       sort ($school); // => sắp xếp tăng dần mảng chỉ số
       rsort ($school); // => sắp xếp giảm dần mảng chỉ số

    // mảng kết hợp
    asort( $school); // => sắp xếp tăng dần mảng

    // tìm kiếm một phần tử trong mảng 
    in_array("", $school); // mảng chỉ số
    array_search("", $school); // mảng kết hợp
    ?>
</body>
</html>