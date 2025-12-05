<?php
    //chạy file connect.php tạo kết nối database
    include("connect.php");
    // khởi tạo biến $id gán bằng giá trị đã được truyền vào thông qua url rồi chạy file này
    $id = $_GET["id"];
    // khởi tạo câu lệnh truy vấn sql -> xóa bản ghi từ bảng nguoi_dung với giá trị id được truyền vào
    $delete = "delete from nguoi_dung where id = '$id' ";
    // thực hiện câu lệnh truy vấn đó
    mysqli_query($conn , $delete);
    // sau khi xóa thành công chạy lại file nguoidung.php trong file admin.php
    header("Location: admin.php?chuyen_trang=nguoidung");


?>