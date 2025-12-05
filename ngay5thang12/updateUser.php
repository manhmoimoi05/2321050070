 <?php 
//  chạy file connect.php trong file admin.php để tạo kết nối với database
  include "connect.php" ;
    //kiểm tra giá trị biến id trong get vừa nhận được thông qua url   
    if(!empty($_GET["id"])){
        // nếu đã tồn tại 
        $id = $_GET["id"];
        // khởi tạo câu lệnh truy vấn sql -> lấy ra bản ghi trong bảng người dùng với id =  giá trị id vừa được truyền vào 
        $update = "select * from nguoi_dung where id = '$id'";
        // thực hiện câu lệnh truy vấn trên
        $ketQua = mysqli_query($conn , $update);
        // kiểm tra bản ghi trả về có > )
        if(mysqli_num_rows($ketQua) > 0){
            // nếu có bản ghi trả về gán các giá trị bản ghi đó bằng hàm mysqli_fetch_array()
            $row = mysqli_fetch_array($ketQua);
        }

    }
        // sau khi cập nhật đầy đủ thông tin từ form gửi về
        if(!empty($_POST)){
            // kiểm tra rỗng của các biến trong $_POST
            if(isset($_POST["username"] )){
                // khởi tạo biến gán bằng giá trị tương ứng
                $username = $_POST["username"];
                $password = $_POST["password"];
                $hoTen = $_POST["hoTen"];
                $email = $_POST["email"];
                $sdt = $_POST["sdt"];
                $ngaySinh = $_POST["ngaySinh"];
                $vaiTro = $_POST["vaiTro"];
                // khởi tạo câu lệnh truy vấn trong sql -> cập nhập giá trị của từng cột của 1 bản ghi với id được truyền vào ban đầu nằm trong bảng người dùng 
                $sql = "update nguoi_dung set ten_dang_nhap = '$username' , mat_khau = '$password' , ho_ten = '$hoTen'  ,email ='$email'  ,so_dien_thoai = '$sdt', vai_tro_id ='$vaiTro' , ngay_sinh ='$ngaySinh' where id ='$id'";
                // thực hiện câu lệnh truy vấn đó bằng hàm mysqli_query()
                mysqli_query($conn , $sql);
                // chuyển hướng về trang admin và chạy file người dùng và hiện thị lớp layout đó
                header("Location: admin.php?chuyen_trang=nguoidung");
                exit;
            }else{
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
    <h1>Cập nhật người dùng</h1>
    <form id="form__register" method="POST" action="">
        <div class="form">
            <label for="username">Tên đăng nhập </label>
            <!--các giá trị được lưu trong bản ghi vừa được in ra sẽ được hiện thị tương ứng theo form cập nhật này 
             các giá trị value = giá trị trong cột của bản ghi đó-->
            <input type="text" name="username" id="username" value="<?php echo $row["ten_dang_nhap"]; ?>">
        </div>
        <div class="form">
            <label for="password">Mật khẩu</label>
            <input type="text" name="password" id="password" value="<?php echo $row["mat_khau"]; ?>">
        </div>
        <div class="form">
            <label for="hoTen">Họ tên</label>
            <input type="text" name="hoTen"  value="<?php echo $row["ho_ten"]; ?>">
        </div>
        <div class="form">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $row["email"]; ?>">
        </div>
        <div class="form">
            <label for="sdt">Số điện thoại</label>
            <input type="number" name="sdt"  value="<?php echo $row["so_dien_thoai"]; ?>">
        </div>
         <div class="form">
            <label for="ngaySinh">Ngày sinh</label>
            <input type="datetime" name="ngaySinh"  value="<?php echo $row["ngay_sinh"]; ?>">
        </div>
        <select name="vaiTro" id="">
            <option value=1>quản lý</option>
            <option value=2>người dùng</option>
            <option value=3>người dùng cao cấp</option>
            <option value=4>diễn viên</option>
            <option value=5>đạo diễn</option>
        </select>
        <button type="submit" >Cập nhật </button>   
    </form>  
   
</body>
</html>