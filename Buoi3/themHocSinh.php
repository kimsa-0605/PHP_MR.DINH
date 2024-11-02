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
            border-collapse: collapse;
        }
        .tbl th, .tbl td {
            text-align: center;
            border: 1px solid black;
            padding: 8px;
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
            width: 100px;
        }
    </style>
</head>
<body>
    
    <div class="container">
    <?php 
        session_start();
        error_reporting(0);
        if (!isset($_SESSION["Students"])) {
            $_SESSION["Students"] = [];
        }

        // Kiểm tra nếu có hành động gửi lên
        if (isset($_POST['action'])) {
            $action = $_POST['action'];

            // Thêm sinh viên
            if ($action == "save") {
                $masv = $_POST['masv'];
                $fullname = $_POST['fullname'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $birth = $_POST['birth'];
                $nganh = $_POST['nganh'];

                $thongtin = [
                    "masv" => $masv,
                    "name" => $fullname,
                    "birth" => $birth,
                    "gender" => $gender,
                    "quequan" => $address,
                    "nganhhoc" => $nganh,
                ];

                array_push($_SESSION["Students"], $thongtin);
            }

            // Hiển thị form thêm sinh viên khi có hành động "them"
            if ($action == "them") {
                echo '
                    <form class="themsp" action="themHocSinh.php" method="post">
                        <h3>Thêm sinh viên</h3>
                        Mã SV: <input type="text" name="masv" placeholder="Mã sinh viên">
                        Họ và tên: <input type="text" name="fullname" placeholder="Họ và tên">
                        Giới tính: <input type="text" name="gender" placeholder="Giới tính">
                        Ngày sinh: <input type="text" name="birth" placeholder="Ngày sinh">
                        Quê quán:  <input type="text" name="address" placeholder="Quê quán">
                        Ngành học: <input type="text" name="nganh" placeholder="Ngành học">
                        <button type="submit" class="save" name="action" value="save">Save</button>
                    </form>
                ';
            }

            if ($action == 'xoa') {
                $masvXoa = $_POST['masv'];
                foreach ($_SESSION['Students'] as $index => $student) {
                    if ($student['masv'] == $masvXoa) {
                        unset($_SESSION['Students'][$index]);
                        break;
                    }
                }
            }

            if ($action == 'sua') {
                $masvSua = $_POST['masv'];
                foreach ($_SESSION['Students'] as $index => $student) {
                    if ($student['masv'] == $masvSua) {
                        echo   '
                                <form class="themsp" action="themHocSinh.php" method="post">
                                    <h3>Thêm sinh viên</h3>
                                    Mã SV: <input type="text" name="masv" value="'.$student['masv'].'" readonly>
                                    Họ và tên: <input type="text" name="fullname" value="'.$student['name'].'">
                                    Giới tính: <input type="text" name="gender" value="'.$student['gender'].'">
                                    Ngày sinh: <input type="text" name="birth" value="'.$student['birth'].'">
                                    Quê quán:  <input type="text" name="address" value="'.$student['quequan'].'">
                                    Ngành học: <input type="text" name="nganh" value="'.$student['nganhhoc'].'">
                                    <button type="submit" class="save" name="action" value="update">Cập nhật</button>
                                </form>
                        ';
                        break;
                    }
                }
            }

            if ($action == "update") {
                $masv = $_POST['masv'];
                foreach ($_SESSION['Students'] as $index => $student) {
                    if ($student['masv'] == $masv) {
                        $_SESSION['Students'][$index] = [
                            "masv" => $masv,
                            "name" => $_POST['fullname'],
                            "birth" => $_POST['birth'],
                            "gender" => $_POST['gender'],
                            "quequan" => $_POST['address'],
                            "nganhhoc" => $_POST['nganh'],
                        ];
                        break;
                    }
                }
            }

        }
    ?>
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
                    <?php 
                         session_start();
                         error_reporting(0);
                         if (!isset( $_SESSION["Students"])) {
                            $_SESSION["Students"] = [];
                         }  
                         
                         if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST' ) {
                                if (isset($_SESSION["Students"])) {
                                    if (count( $_SESSION["Students"] ) > 0) {
                                        foreach ($_SESSION["Students"] as $student): 
                                            echo "<tr>
                                                <td>{$student['masv']}</td>
                                                <td>{$student['name']}</td>
                                                <td>{$student['birth']}</td>
                                                <td>{$student['gender']}</td>
                                                <td>{$student['quequan']}</td>
                                                <td>{$student['nganhhoc']}</td>
                                                <td>
                                                    <form action='themHocSinh.php' method='post' style='display:inline;'>
                                                        <input type='hidden' name='action' value='sua'>
                                                        <input type='hidden' name='masv' value='{$student['masv']}'>
                                                        <button type='submit'>Sửa</button>
                                                    </form>
                                                    <form action='themHocSinh.php' method='post' style='display:inline;'>
                                                        <input type='hidden' name='action' value='xoa'>
                                                        <input type='hidden' name='masv' value='{$student['masv']}'>
                                                        <button type='submit'>Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>";
                                        endforeach; 
                                } else {
                                    echo "<tr>
                                            <td colspan='7'>
                                                Chưa có sinh viên nào.
                                            </td>
                                        </tr>";
                                }
                            }
                        }
                        
                    ?>
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


