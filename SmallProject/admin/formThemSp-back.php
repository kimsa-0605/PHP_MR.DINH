<?php 
    // Bắt đầu đệm đầu ra
    ob_start();
    
    include('header.php');
    require_once('../model/connect.php');

    // Đường dẫn tệp tải lên
    $target_file = "../" . basename($_FILES["FileImage"]["name"]);
    $uploadOk = 1;

    if (isset($_POST["addProduct"])) {
        // Khởi tạo các giá trị mặc định
        $keywordPr = '';
        $descriptPr = '';
        $status = 0;
        
        $image = basename($_FILES["FileImage"]["name"]);

        // Kiểm tra nếu không có ảnh thì lấy ảnh mặc định từ input ẩn
        if (empty($image)) {
            $image = $_POST['image'];
            $uploadOk = 0;
        } else {
            // Kiểm tra xem tệp có phải là ảnh hay không
            $tmp_file = getimagesize($_FILES["FileImage"]["tmp_name"]);
            if ($tmp_file !== false) {
                $uploadOk = 1;
            } else {
                $image = '';
                ?>
                    <script type="text/javascript">
                        window.location = 'formThemSp.php?notimage=notimage';
                    </script>
                <?php
                $uploadOk = 0;
            }
        }

        // Kiểm tra xem tệp đã tồn tại chưa
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Nếu tệp hợp lệ, tiến hành tải lên
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["FileImage"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["FileImage"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        // Lấy các giá trị từ form
        $namePr = isset($_POST['txtName']) ? $_POST['txtName'] : '';
        $categoryPr = isset($_POST['category']) ? $_POST['category'] : '';
        $pricePr = isset($_POST['txtPrice']) ? $_POST['txtPrice'] : '';
        $salePricePr = isset($_POST['txtSalePrice']) ? $_POST['txtSalePrice'] : '';
        $quantityPr = isset($_POST['txtNumber']) ? $_POST['txtNumber'] : '';
        $keywordPr = isset($_POST['txtKeyword']) ? $_POST['txtKeyword'] : '';
        $descriptPr = isset($_POST['txtDescript']) ? $_POST['txtDescript'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : 0;

        // Thực hiện truy vấn SQL
        $sql = "INSERT INTO products(name, category_id, image, description, price, saleprice, created, quantity, keyword, status) 
                VALUES('$namePr', '$categoryPr', '$image', '$descriptPr', '$pricePr', '$salePricePr', now(), '$quantityPr', '$keywordPr', '$status');";
        
        $result = mysqli_query($conn, $sql);
        
        // Kiểm tra kết quả truy vấn và chuyển hướng
        if ($result) {
            header("Location: danhSach-SanPham.php?addps=success");
            exit();  // Dừng chương trình sau khi chuyển hướng
        } else {
            echo "Error: " . mysqli_error($conn); // In ra lỗi nếu có
            header("Location: danhSach-SanPham.php?addpf=fail");
            exit();
        }
    }

    // Kết thúc đệm đầu ra và gửi tất cả các dữ liệu
    ob_end_flush();
?>
