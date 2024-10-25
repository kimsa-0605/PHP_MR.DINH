<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .tbl {
            width: 800px;
            margin-top: 10px;
            border: 1px solid black;
            border-collapse:collapse;
        }

        .tbl tr th {
            border-left: 1px solid black;
            border-bottom:  1px solid black;
        }

        .tbl tr td {
            text-align: center;
            border: 1px solid black;
            border-collapse:collapse;
        }

        .themmoi {
            margin: 10px;
        }

        .find {
            display: flex;
            gap: 5px;
            justify-content: center;
        }

        .title {
            text-align: center;
        }

        .themsp {
            width: 400px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .save {
            width: 60px;
        }
    </style>
</head>
<body>
    <?php
        function generateStudentId() {
            $prefix = 'SV'; // Tiền tố cho mã sinh viên
            $randomNumber = rand(1000, 9999); // Tạo số ngẫu nhiên từ 1000 đến 9999
            return $prefix . $randomNumber; // Kết hợp tiền tố và số ngẫu nhiên
        }

         $Students = array(
            generateStudentId() => array(
                "name" => "Hồ Ly Kim Sa",
                "birth" => "06/05/2005",
                "gender" => "Nữ",
                "quequan" => "Quảng Trị",
                "nganhhoc" => "Công nghệ thông tin"

            ),
            generateStudentId() => array(
                "name" => "Hồ Ly Kim Sa",
                "birth" => "06/05/2005",
                "gender" => "Nữ",
                "quequan" => "Quảng Trị",
                "nganhhoc" => "Công nghệ thông tin"

            ),
            generateStudentId() => array(
                "name" => "Hồ Ly Kim Sa",
                "birth" => "06/05/2005",
                "gender" => "Nữ",
                "quequan" => "Quảng Trị",
                "nganhhoc" => "Công nghệ thông tin"

            )
        );

    ?>
    <div class="container">
        <h3 class="title">Danh sách sinh viên</h3>
        <form class="find" action="themHocSinh.php" method="post">
            <input type="text" placeholder="Nhập từ kháo cần tìm"> 
            <button type="submit" name="action" value="find">Tìm</button>
            <button type="submit" name="action" value="findAll">Tất cả</button>
        </form>
        <div class="table-show">
            <table class="tbl">
                <thead>
                    <tr>
                        <th>Mã sinh viên</th>
                        <th>Họ và tên</th>
                        <th>Giới tính</th>
                        <th>Quê quán</th>
                        <th>Ngày sinh</th>
                        <th>Ngành học</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Students as $studentId => $student): ?>
                        <tr>
                            <td><?php echo $studentId; ?></td>
                            <td><?php echo $student['name']; ?></td>
                            <td><?php echo $student['birth']; ?></td>
                            <td><?php echo $student['gender']; ?></td>
                            <td><?php echo $student['quequan']; ?></td>
                            <td><?php echo $student['nganhhoc']; ?></td>
                            <td>
                                <a href="#">Sửa</a>  <a href="#">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <form action="themHocSinh.php" method="post">
                                <button type="submit" class="themmoi" name="action" value="them">Thêm mới</button>
                            </form>
                            
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>
</html>

<?php 
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    }

    if ($action == "them") {
        echo '
            <form class="themsp" action="themHocSinh.php" method="post">
                <h3>Thêm sinh viên</h3>
                Họ và tên: <input type="text" name="fullname" placeholder="Họ và tên">
                Giới tính: <input type="text" name="gender" placeholder="Giới tính">
                Ngày sinh: <input type="text" name="birth" placeholder="Ngày sinh">
                Quê quán:  <input type="text" name="address" placeholder="Quê quán">
                Ngành học: <input type="text" name="nganh" placeholder="Ngành học">
                <button type="submit" class="save" name="action" value="save">Save</button>
            </form>


        ';
        if(isset($_POST['action']) == "save") {
            $fullname = $_POST['fullname'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $birth = $_POST['birth'];
            $nganh = $_POST['nganh'];

            $thongtin = [
                generateStudentId() => array(
                    "name" => $fullname,
                    "birth" => $birth,
                    "gender" => $gender,
                    "quequan" => $address,
                    "nganhhoc" => $nganh,
                ),
            ];

            array_push($Students, $thongtin);
        }
        
    }
?>