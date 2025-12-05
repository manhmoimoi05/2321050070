  <?php 
        include "connect.php";
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $sql = "SELECT pt.phim_id,
                         p.ten_phim,
                        pt.the_loai_id,
                        tl.ten_the_loai
                        FROM phim_the_loai pt
                        JOIN phim p ON pt.phim_id = p.id
                        JOIN the_loai tl ON pt.the_loai_id = tl.id 
                        where pt.id = '$id'";
                $result = mysqli_query($conn , $sql);
                $row = mysqli_fetch_assoc($result);
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
    <h1>cập nhật phim thể loại</h1>
    <form action="" method="post">
        <p>Tên phim</p>
        <input type="text" name="tenPhim" id="" value="<?php echo $row["ten_phim"] ;?>">
        <p>tên thể loại</p>
        <select name="tenTheLoai" id="">
            <?php 
                $sql2 ="SELECT * FROM `quoc_gia`
                            ";
                $result2 = mysqli_query($conn , $sql2);
                if(mysqli_num_rows($result2) > 0){
                while($row2 = mysqli_fetch_assoc($result2)){
                      
                ?>
                <option value="<?php echo $row2["id"]; ?>"><?php echo $row2["ten_quoc_gia"]; ?></option>
                <?php 
                      }
                    }
                ?>
          
            <option value=""></option>
        </select>
    </form>
</body>
</html>