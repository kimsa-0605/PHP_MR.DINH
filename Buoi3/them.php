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
            if (!isset($_SESSION["SV"])) {
                $_SESSION["SV"] = [];

            }

            if (isset($_POST['action'])){
                $action = $_POST['action'];
            }

            if ($action == 'them') {
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

            if ($action == 'save') {
                $masv = $_POST['masv'];
                $name = $_POST['fullname'];
                $gender = $_POST['gender'];
                $birth = $_POST['birth'];
                $quequan = $_POST['address'];
                $nganh = $_POST['nganh'];

                $thongtin = [
                    'masv' => $_POST['masv'],
                    'name' => $_POST['fullname'],
                    'gender' => $_POST['gender'],
                    'birth' => $_POST['birth'],
                    'quequan' => $_POST['address'],
                    'nganh' => $_POST['nganh']
                ];
            }

            array_push($_SESSION['SV'], $thongtin);
            
        ?>
        <h3 class="title">Danh sách sinh viên</h3>
        <form class="find" action="them.php" method="post">
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
                    <?
                        
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <form action="them.php" method="post">
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


