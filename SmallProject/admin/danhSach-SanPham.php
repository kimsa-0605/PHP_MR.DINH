<?php 
    include "header.php"; 
    // ảnh hưởng css từ file này
	require_once("../model/connect.php");
	error_reporting(2);


    // Thêm sản phẩm
    if (isset($_GET['addps']))
    {
        echo "<script type=\"text/javascript\">alert(\"Bạn đã thêm sản phẩm thành công!\");</script>";  
    }
    if (isset($_GET['addpf']))
    {
        echo "<script type=\"text/javascript\">alert(\"Thêm sản phẩm thất bại!\");</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- page content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="page-header"> Danh sách sản phẩm </h1>
			</div><!-- /.col -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th> STT </th>
						<th> Tên sản phẩm </th>
						<th> Mã danh mục </th>
						<th> Hình ảnh </th>
						<th> Giá </th>
						<th> Giảm giá </th>
						<th> Chỉnh sửa </th>
						<th> Xóa </th>
					</tr>
				</thead>
				<tbody>
					<?php
                        require_once('../model/connect.php');
						$sql = "SELECT * FROM products";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while($kq = mysqli_fetch_assoc($result)){
                                if ($kq['image'] == null || $kq['image'] == ''){
                                    $image = "";
                                }else {
                                    $image = "../" . $kq['image'];
                                }
                    ?>
                                <tr>
                                    <td><?php echo $kq["id"]?></td>
                                    <td><?php echo $kq["name"]?></td>
                                    <td><?php echo $kq["category_id"]?></td>
                                    <td>
                                        <img src="<?php echo $image?>" width="100px"; height="100px";>
                                    </td>
                                    <td><?php echo $kq["price"]?></td>
                                    <td><?php echo $kq["saleprice"]?></td>
                                    <td><a href="product-edit?idProduct=<?php echo $kq["id"]?>"><i class="fa fa-pencil fa-lg" title="Chỉnh sửa"></i></a></td>
                                    <td><a href="product-delete?idProduct=<?php echo $kq["id"]?>"><i class="fa fa-trash-o fa-lg" title="Xóa"></i></a></td>
                                </tr>
                        <?php }} ?>
				</tbody>
			</table>
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
</body>
</html>