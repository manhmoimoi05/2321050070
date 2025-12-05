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
            width: 100%;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>Danh sách phim</h1>
    <a href="admin.php?chuyen_trang=themPhim">Thêm Phim</a>
    <table border=1>
        <tr>
            <th>tên phim</th>
            <th>đạo diễn</th>
            <th>năm phát hành</th>
            <th>poster</th>
            <th>quốc gia</th>
            <th>số tập</th>
            <th>trailer</th>
            <th>mô tả</th>
            <th>chức năng</th>
        </tr>
        <?php
            include("connect.php");
                    $sql = "
                    SELECT 
                    p.id,
                    p.ten_phim,
                    nd.ho_ten AS ten_dao_dien,
                    p.nam_phat_hanh,
                    p.poster,
                    qg.ten_quoc_gia,
                    p.so_tap,
                    p.trailer,
                    p.mo_ta
                    FROM phim p
                    JOIN nguoi_dung nd ON p.dao_dien_id = nd.id
                    JOIN quoc_gia qg ON p.quoc_gia_id = qg.id
                ";
            $result = mysqli_query($conn , $sql);
            while($row = mysqli_fetch_assoc($result)){

            
        ?>
        <tr>
            <td><?php echo $row["ten_phim"]; ?></td>
            <td><?php echo $row["ten_dao_dien"]; ?></td>
            <td><?php echo $row["nam_phat_hanh"]; ?></td>
            <td><?php echo $row["poster"]; ?></td>
            <td><?php echo $row["ten_quoc_gia"]; ?></td>
            <td><?php echo $row["so_tap"]; ?></td>
            <td><?php echo $row["trailer"]; ?></td>
            <td><?php echo $row["mo_ta"]; ?></td>
            <td>
                <a href="admin.php?chuyen_trang=updatePhim&id=<?php echo $row["id"]; ?>">Cập nhật</a>
                <a href="deletePhim.php?id=<?php echo $row["id"] ?>" style="color:red;padding:10px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">xóa</a>
            </td>

        </tr>
        <?php } ?>
    </table>
</body>
</html>