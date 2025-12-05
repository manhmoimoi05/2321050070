<?php
    include "connect.php";
    
    if(isset($_GET["id"])){
            $id_tl = $_GET["id"]; 
            $lay_tl = "select * from quoc_gia where id = '$id_tl'";
            $lenh_tl = mysqli_query($conn , $lay_tl);
            $row_tl = mysqli_fetch_assoc($lenh_tl);

        }

    if(isset($_POST["tenQuocGia"])){
        $tenQuocGia = $_POST["tenQuocGia"];
        $sql = "update quoc_gia set ten_quoc_gia = '$tenQuocGia' where id = '$id_tl'";
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
    <h1>cập nhật quốc gia</h1>
    <div>
        <form action="" method="post">
            <p>tên quốc gia</p>
            <input type="text" name="tenQuocGia" id="" value ="<?php  echo $row_tl["ten_quoc_gia"]; ?>">
            <button type="submit">cập nhật </button>
        </form>
        
    </div>
</body>
</html>