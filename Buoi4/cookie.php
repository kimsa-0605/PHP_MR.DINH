



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
        error_reporting(0);
        // $fullname = $_POST["name"];
        // $email = $_POST["email"];
        // $address = $_POST["address"];
        // $thong_tin = $fullname. " - " . $email. " - " .$address;
        $trong = "true";
        if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["address"])) {
            $mang = array(
                "name" => $_POST["name"] ?? '',
                "email" => $_POST["email"] ?? '',
                "address" => $_POST["address"] ?? ''
            );
            setcookie("khachHang", serialize($mang), time() +(86400*30));
            $trong = "false";
        }

       


    ?>


    <div class="container">
        <form action="cookie.php" method="post">
            <p class="title">INFORMATION LOGIN</p>
            <div class="formfake">
                <p>Full name <input type="text" name="name" value="<?php echo $_POST["name"];?>"></p>
                <p>Email <input type="text" name="email" value="<?php echo $_POST["email"];?>"></p>
                <p>Address <input type="text" name="address" value="<?php echo $_POST["address"];?>"></p>
                <div class="button-DN">
                    <input type="submit" name="button" id="button" value="Gửi">
                </div>
            </div>
            
        </form>

        
            <?php
                if ($trong == "false") {
                    echo '<div class="show">';
                    echo "Thông tin khách hàng"."<br>";
                    $val = unserialize($_COOKIE['khachHang']);
                    echo 'Tên khách hàng: '.htmlspecialchars($val['name'])."<br>";
                    echo 'Email: '.htmlspecialchars($val['email'])."<br>";
                    echo 'Địa chỉ: '.htmlspecialchars($val['address'])."<br>";
                    echo '</div>';
                }
             ?>
        
    </div>
</body>
</html>

<!-- 
value:
+ giá trị: "saaaa"
+ biến: $guru = $Fullname. $email. $address
+ mảng: $mang = [$fullname, $email, $address]
+ session: $session[]
-->