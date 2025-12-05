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
    <h1>Danh sách phim thể Loại</h1>
    <a href="admin.php?chuyen_trang=themTheLoai">thêm thể loại</a>
    <table border=1>
        <tr> 
            <th>tên phim</th>
             <th>Tên thể loại</th>
             <th>Chức năng</th>
        </tr>
        <?php
            include("connect.php");
            $sql = "SELECT pt.id,
             pt.phim_id,
             p.ten_phim,
             pt.the_loai_id,
            tl.ten_the_loai
            FROM phim_the_loai pt
            JOIN phim p ON pt.phim_id = p.id
            JOIN the_loai tl ON pt.the_loai_id = tl.id;
            ";
            $result = mysqli_query($conn , $sql);
            while($row = mysqli_fetch_assoc($result)){

        ?>
        <tr>
            <td><?php echo $row["ten_phim"]; ?></td>
            <td><?php echo $row["ten_the_loai"]; ?></td>
            <td>
                <a href="admin.php?chuyen_trang=updatePhimTheLoai&id=<?php echo $row["id"]; ?>">sửa</a>
            </td>
           
        </tr>
       <?php } ?>
    </table>
    
    
</body>
</html>