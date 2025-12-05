<?php
    include "connect.php";

     if(isset($_POST["tenTheLoai"])){
        $tenTheLoai = $_POST["tenTheLoai"];
        $sql = "insert into the_loai (ten_the_loai) values ('$tenTheLoai')";
        mysqli_query($conn , $sql);
        header("Location: admin.php?chuyen_trang=theloai");
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
    <h1>Thêm Thể loại</h1>
    <div>
        <form action="" method="post">
            <p>tên thể loại</p>
            <input type="text" name="tenTheLoai" id="">
            <button type="submit">Thêm </button>
        </form>
        
    </div>
</body>
</html>