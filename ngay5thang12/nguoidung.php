<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
         h1{
            text-align:start;
        }
        a{
         text-decoration:none ;
         color:black;

        }
        a:hover{
            color:pink;
        }
        table{
            width: 100%;
        }
        
    </style>
    <title>Document</title>
</head>
<body>
    <div style="display:flex; justify-content:space-around ; align-items:center;">
        <h1>Danh sách người dùng</h1>
         <div> <a href="admin.php?chuyen_trang=themNguoiDung" style="color:red; padding:10px 20px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; ">Thêm</a></div>
    </div>
   
    <table border=1>
        <tr>
            <th>Tên đăng nhập</th>
            <th>Họ tên</th>
            <th>email</th>
            <th>số điện thoại</th>
            <th>vai trò</th>
            <th>ngày sinh</th>
            <th>Chức năng</th>
        </tr>
        <?php
            // chạy file connect.php giúp tạo kết nối với database
            include("connect.php");
            // khởi tạo câu truy vấn trong sql -> lấy tất cả bản ghi có trong bảng nguoi_dung dùng join kết hợp 1 số bảng khác
            $sql = "select nd.* , vt.ten_vai_tro from nguoi_dung nd join vai_tro vt on nd.vai_tro_id = vt.id";
            // để chạy câu truy vấn trên dùng hàm sau
            $result = mysqli_query($conn , $sql);
            // dùng vòng lặp while duyệt qua toàn bộ số bản ghi được in ra
            while($row= mysqli_fetch_assoc($result)){

        ?>
        <tr>
            <!-- in ra giá trị của từng cột thông qua hàm mysqli_fetch_assoc() -> lấy giá trị thông qua tên của cột -->
            <td><?php echo $row["ten_dang_nhap"]; ?></td>
            <td><?php echo $row["ho_ten"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["so_dien_thoai"]; ?></td>
            <td><?php echo $row["ten_vai_tro"]; ?></td>
            <td><?php echo $row["ngay_sinh"]; ?></td>
            <td >
                <!-- khởi tạo đường dẫn url truyền vào giá trị updateUser của tham số chuyen_trang -> sẽ được so sánh giá trị này
                 thông qua switch case chạy và in ra file tương ứng bằng include
                 - tham số thứ 2 là id với giá trị gán bằng giá trị id của cột id trong bảng người dùng  -->
                <a href="admin.php?chuyen_trang=updateUser&id=<?php echo $row["id"]; ?>">cập nhật</a>
                <!-- tương tự như cập nhật và xóa đều truyền vào 2 tham số
                 - chuyen_trang giúp chạy file ngay trong chính trang gốc 
                 - id giúp xác định bản ghi nào được thay đổi hay xóa đi -->
                <a href="admin.php?chuyen_trang=deleteId&id=<?php echo $row["id"] ?>" style="color:red; padding:10px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; ">Xóa</a>
            </td>
        </tr>
        <?php } ?>
       
    </table>

</body>
</html>