<?php 
        // chạy file connect.php để tạo kết nối tới database
        include("connect.php");
        // kiểm tra các giá trị biến $_POST gửi về đã được tồn tại và đầy đủ chưa
        if(!empty($_POST)){
            if(isset($_POST["username"] )){
                // gán các biến bằng với các giá trị nằm trong biến $_POST 
                $username = $_POST["username"];
                $password = $_POST["password"];
                $hoTen = $_POST["hoTen"];
                $email = $_POST["email"];
                $sdt = $_POST["sdt"];
                $ngaySinh = $_POST["ngaySinh"];
                $vaiTro = $_POST["vaiTro"];
                // khởi tạo câu lệnh truy vấn trong sql -> thêm 1 người dùng mới vào bảng nguoi_dung với các giá trị = các giá trị đã được nhập thông qua form input
                 $sql = "insert into nguoi_dung ( ten_dang_nhap , mat_khau , ho_ten ,email ,so_dien_thoai , vai_tro_id , ngay_sinh )
                 values ( '$username' ,'$password' ,'$hoTen' ,'$email' ,'$sdt' ,'$vaiTro' , '$ngaySinh') ";
                //  để thực hiện câu truy vấn ta dùng hàm mysqli_query()
                mysqli_query($conn , $sql);
                // sau đó chuyển hướng về lại trang admin.php và dữ liệu của file người dùng sẽ được chạy thông qua giá trị truyền vào url
                header("Location: admin.php?chuyen_trang=nguoidung");
            }else{
                // nếu không nhập đủ dữ liệu sẽ in ra dòng text này
                echo "<h2 style=color:red; >Điền đầy đủ thông tin đi ?</h2>";
            }
        }
    
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background:#f4f5fa;
            height:100vh;
            /* display:flex;
            justify-content:center;
            align-items:center; */
            
        }
        #form__register{
            margin-left:50px;
            padding: 20px;
            width: 300px;
            /* height: 350px; */
            background:white;
            box-shadow:1px 1px 5px black;
            border-radius:10px;
        }
        .form{
            display:flex;
            flex-direction:column;
            justify-content:center;

        }
        input{
            border:0;
            background:gray;
            padding: 10px;
            outline:none;
            border-radius:5px;
            margin-bottom:10px;
            color:white;
            font-size:18px;

        }
        button{
            padding:10px;
            background:pink;
            outline:none;
            border:0;
            border-radius:5px;
           margin:0 auto;
           cursor:pointer;

        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>Thêm người dùng</h1>
    <form id="form__register" method="POST" action="">
        <div class="form">
            <label for="username">Tên đăng nhập </label>
            <!-- giá trị value được gán bằng biến php in ra màn hình , biến này được gửi đến từ file register nó sẽ hiện thị luôn giá trị này lúc vào form log -->
            <input type="text" name="username" id="username">
        </div>
        <div class="form">
            <label for="password">Mật khẩu</label>
            <input type="text" name="password" id="password" >
        </div>
        <div class="form">
            <label for="hoTen">Họ tên</label>
            <input type="text" name="hoTen"  >
        </div>
        <div class="form">
            <label for="email">Email</label>
            <input type="email" name="email" >
        </div>
        <div class="form">
            <label for="sdt">Số điện thoại</label>
            <input type="number" name="sdt"  >
        </div>
         <div class="form">
            <label for="ngaySinh">Ngày sinh</label>
            <input type="date" name="ngaySinh"  >
        </div>
        <select name="vaiTro" id="">
            <option value=1>quản lý</option>
            <option value=2>người dùng</option>
            <option value=3>người dùng cao cấp</option>
            <option value=4>diễn viên</option>
            <option value=5>đạo diễn</option>
        </select>
        <button type="submit" >Thêm người dùng</button>   
    </form>  

</body>
</html>