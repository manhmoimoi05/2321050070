<?php
    include "connect.php";

     if(isset($_POST["tenQuocGia"])){
        $tenQuocGia = $_POST["tenQuocGia"];
        $sql = "insert into quoc_gia (ten_quoc_gia) values ('$tenQuocGia')";
        mysqli_query($conn , $sql);
        header("Location: admin.php?chuyen_trang=quocgia");
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
    <h1>Thêm quốc gia</h1>
    <div>
        <form action="" method="post">
            <p>tên quốc gia</p>
            <input type="text" name="tenQuocGia" id="">
            <button type="submit">Thêm </button>
        </form>
        
    </div>
</body>
</html>