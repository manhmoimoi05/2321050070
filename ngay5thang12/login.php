<?php
    include("connect.php");

    if(isset($_POST["username"] , $_POST["password"] )){
        $tdn = $_POST["username"];
        $mk = $_POST["password"];
        
        $sql = "select * from nguoi_dung where ten_dang_nhap = '$tdn' and mat_khau = '$mk'";

        $result = mysqli_query($conn , $sql);

        

        if(mysqli_num_rows($result )> 0){
            session_start();

            $_SESSION["username"] = $tdn;

            header("Location: admin.php");
            
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
            display:flex;
            justify-content:center;
            align-items:center;
            
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
    <h1>xin chào hãy đăng nhập</h1>
    <form id="form__register" method="POST" action="">
        <div class="form">
            <label for="username">Tài khoản </label>
            <!-- giá trị value được gán bằng biến php in ra màn hình , biến này được gửi đến từ file register nó sẽ hiện thị luôn giá trị này lúc vào form log -->
            <input type="text" name="username" id="username">
        </div>
        <div class="form">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" >
        </div>
        <button type="submit" >Login</button>   
    </form>   
</body>
</html>