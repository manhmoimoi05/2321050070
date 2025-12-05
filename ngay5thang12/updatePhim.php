<?php 
        // chạy file connect.php để tạo kết nối tới database
        include("connect.php");
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $laySql = "SELECT p.*,
            nd.ten_dang_nhap AS ten_dao_dien,
            qg.ten_quoc_gia
            FROM phim p
            JOIN nguoi_dung nd ON p.dao_dien_id = nd.id
            JOIN quoc_gia qg ON p.quoc_gia_id = qg.id;";
            $resultSql = mysqli_query($conn , $laySql);
            $rowSql = mysqli_fetch_assoc($resultSql);
        }
        // kiểm tra các giá trị biến $_POST gửi về đã được tồn tại và đầy đủ chưa
        if(!empty($_POST)){
            if(isset($_POST["tenPhim"] )){
                // gán các biến bằng với các giá trị nằm trong biến $_POST 
                $tenPhim = $_POST["tenPhim"];
                $tenDaoDien = $_POST["tenDaoDien"];
                $namPhatHanh = $_POST["namPhatHanh"];
                $poster = $_POST["poster"];
                $quocGia = $_POST["quocGia"];
                $trailer = $_POST["trailer"];
                $soTap = $_POST["soTap"];
                $moTa = $_POST["moTa"];
               
                // khởi tạo câu lệnh truy vấn trong sql -> thêm 1 người dùng mới vào bảng nguoi_dung với các giá trị = các giá trị đã được nhập thông qua form input
                $sql = "UPDATE phim 
                SET ten_phim = '$tenPhim',
                dao_dien_id = '$tenDaoDien',
                nam_phat_hanh = '$namPhatHanh',
                poster = '$poster',
                quoc_gia_id = '$quocGia',
                so_tap = '$soTap',
                trailer = '$trailer',
                mo_ta = '$moTa'
                WHERE id = '$id'";

                //  để thực hiện câu truy vấn ta dùng hàm mysqli_query()
                echo $sql;
                mysqli_query($conn , $sql);
                // sau đó chuyển hướng về lại trang admin.php và dữ liệu của file người dùng sẽ được chạy thông qua giá trị truyền vào url
                header("Location: admin.php?chuyen_trang=phim");
            }else{
                // nếu không nhập đủ dữ liệu sẽ in ra dòng text này
                echo "<h2 style=color:red; >Điền đầy đủ thông tin đi ?</h2>";
            }
        }
    
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background:#f4f5fa;
            height:100vh;
            /* display:flex;
            justify-content:center;
            align-items:center; */
            
        }
        #form__register{
            margin-left:50px;
            padding: 20px;
            width: 300px;
            /* height: 350px; */
            background:white;
            box-shadow:1px 1px 5px black;
            border-radius:10px;
        }
        .form{
            display:flex;
            flex-direction:column;
            justify-content:center;

        }
        input{
            border:0;
            background:gray;
            padding: 10px;
            outline:none;
            border-radius:5px;
            margin-bottom:10px;
            color:white;
            font-size:18px;

        }
        button{
            padding:10px;
            background:pink;
            outline:none;
            border:0;
            border-radius:5px;
           margin:0 auto;
           cursor:pointer;

        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>Cập nhật phim</h1>
    <form id="form__register" method="POST" action="">
        <div class="form">
            <label for="tenPhim">Tên Phim</label>
            <!-- giá trị value được gán bằng biến php in ra màn hình , biến này được gửi đến từ file register nó sẽ hiện thị luôn giá trị này lúc vào form log -->
            <input type="text" name="tenPhim" id="username" value="<?php echo $rowSql["ten_phim"]; ?>">
        </div>
        <div class="form">

            <label for="tenDaoDien">đạo diễn</label>
            <select name="tenDaoDien" id="">
                <?php 
                    $sql1 = "SELECT nd.*, vt.ten_vai_tro FROM `nguoi_dung` nd JOIN vai_tro vt on nd.vai_tro_id = vt.id WHERE vt.id = 5;
                            ";
                    $result1 = mysqli_query($conn , $sql1 );
                    if(mysqli_num_rows($result1) > 0 ){
                        while($row = mysqli_fetch_assoc($result1)){
                           
                ?>
                <option value="<?php echo $row["id"]; ?>"><?php echo $row["ten_dang_nhap"]; ?></option>
                <?php
                        }
                    }    
                ?>
             </select>
        </div>
        <div class="form">
            <label for="namPhatHanh">Năm phát hành</label>
            <input type="number" name="namPhatHanh" value="<?php echo $rowSql["nam_phat_hanh"]; ?>" >
        </div>
        <div class="form">
            <label for="poster">Poster</label>
            <input type="text" name="poster" value="<?php echo $rowSql["poster"]; ?>">
        </div>
        <div class="form">
            <label for="quocGia">Quốc gia</label>
            <select name="quocGia" id="">
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
             </select>
           
        </div>
         <div class="form">
            <label for="soTap">Số tập</label>
            <input type="number" name="soTap"  value="<?php echo $rowSql["so_tap"]; ?>">
        </div>
        <div class="form">
            <label for="trailer">trailer</label>
            <input type="text" name="trailer"  value="<?php echo $rowSql["trailer"]; ?>">
        </div>
        <div class="form">
            <label for="moTa">Mô tả</label>
            <input type="text" name="moTa" id="" value="<?php echo $rowSql["mo_ta"]; ?>">
        </div>   
        <button type="submit" >cập nhật Phim</button>   
    </form>  
</body>
</html>