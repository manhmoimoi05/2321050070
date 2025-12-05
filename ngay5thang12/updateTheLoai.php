<?php
    include "connect.php";
    
    if(isset($_GET["id"])){
            $id_tl = $_GET["id"]; 
            $lay_tl = "select * from the_loai where id = '$id_tl'";
            $lenh_tl = mysqli_query($conn , $lay_tl);
            $row_tl = mysqli_fetch_assoc($lenh_tl);

        }

    if(isset($_POST["tenTheLoai"])){
        $tenTheLoai = $_POST["tenTheLoai"];
        $sql = "update the_loai set ten_the_loai = '$tenTheLoai' where id = '$id_tl'";
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
    <h1>cập nhật thể loại</h1>
    <div>
        <form action="" method="post">
            <p>tên thể loại</p>
            <input type="text" name="tenTheLoai" id="" value ="<?php  echo $row_tl["ten_the_loai"]; ?>">
            <button type="submit">cập nhật </button>
        </form>
        
    </div>
</body>
</html>