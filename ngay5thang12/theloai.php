<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
         h1{
            text-align:center;
        }
         a{
         text-decoration:none ;
         color:black;

        }
        a:hover{
            color:pink;
        }
        table{
            width: 50%;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>Danh sách thể Loại</h1>
    <a href="admin.php?chuyen_trang=themTheLoai">thêm thể loại</a>
    <table border=1>
        <tr> 
            <th>id</th>
             <th>Tên thể loại</th>
             <th>Chức năng</th>
        </tr>
        <?php
            include("connect.php");
            $sql = "select * from the_loai where 1";
            $result = mysqli_query($conn , $sql);
            while($row = mysqli_fetch_assoc($result)){

        ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["ten_the_loai"]; ?></td>
            <td>
                <a href="deleteTheLoai.php?id=<?php echo $row["id"]; ?>">Xóa</a>
                <a href="admin.php?chuyen_trang=updateTheLoai&id=<?php echo $row["id"]; ?>">Cập nhật</a>
            </td>
        </tr>
       <?php } ?>
    </table>
    
    
</body>
</html>