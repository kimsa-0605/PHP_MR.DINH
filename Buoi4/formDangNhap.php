<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
    <style>
        .container {
            margin: 0px;
            padding: 0px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .title{
            background-color: palevioletred;
            width: 300px;
            height: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0px;
        }

        .formfake {
            width: 100%;
            padding: 0px 20px 0px 20px;
        }
        form{
            width: 300px;
            height: 240px;
            background-color: pink;
        }

        .button-DN {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .show {
            color: white;
            padding: 10px;
            margin-top: 50px;
            width: 290px;
            height: 100px;
            background-color: pink;
            text-align: center;
        }
    </style>
</head>
<body>

    <?php 
        session_start();
        error_reporting(0);
        $trong = "true";
        if (!empty($_POST["hoten"]) && !empty($_POST["email"]) && !empty($_POST["tenDN"]) && !empty($_POST["mk"])) {
        $_SESSION["hoten"] = $_POST["hoten"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["tenDN"] = $_POST["tenDN"];
        $_SESSION["mk"] = $_POST["mk"];
        $trong = "false";
        }
    ?>

    <div class="container">
        <form action="formDangNhap.php" method="post">
            <p class="title">Thông tin đăng nhập</p>
            <div class="formfake">
                <p>Họ và tên <input type="text" name="hoten" value="<?php echo $_POST["hoten"];?>"></p>
                <p>Email <input type="text" name="email" value="<?php echo $_POST["email"];?>"></p>
                <p>Tên đăng nhập <input type="text" name="tenDN" value="<?php echo $_POST["tenDN"];?>"></p>
                <p>Mật khẩu <input type="text" name="mk" value="<?php echo $_POST["mk"];?>"></p>
                <div class="button-DN">
                    <input type="submit" name="button" id="button" value="Đăng Nhập">
                </div>
            </div>
            
        </form>

        <div class="show">
            <?php
                if ($trong == "false") {
                    echo "Xin chào ".$_SESSION["hoten"]."<br>";
                    echo "Email: ".$_SESSION["email"]."<br>";
                    echo "Tên đăng nhập: ".$_SESSION["tenDN"]."<br>";
                    echo "Mật khẩu: ".$_SESSION["mk"]."<br>";
                    echo "<b><a href='trangHienThi.php'>Click here</a></b>";
                }
             ?>
        </div>
    </div>
</body>
</html>