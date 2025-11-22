<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 1 php</title>
</head>
<body>
 <?php 
    // 1.in ra màn hình
     echo "hello world <br>";
     echo "hi <br>";

    // 2.biến
    // cú pháp gọi biến $ + tên biến = giá trị của biến
    $ten = "Phan Mạnh";
    $tuoi = 18;

    echo $ten;
    // dùng dấu chấm để nối chuỗi
    echo $ten ." " . $tuoi ."<br>";

    // 3.hằng số
    define("soPi" , "3.14");
    echo soPi . "<br>";

    // 4.phân biệt ' ' và " "
    echo '$ten' ."<br>";
    echo "$ten" ."<br>";

    // 5.chuỗi
    // 5.1 kiểm tra độ dài chuỗi
     echo strlen($ten) . "<br>";
    // 5.2 đếm số từ 
     echo str_word_count($ten) . "<br>";
    // 5.3 tìm kiếm ký tự trong chuỗi
     echo strpos($ten , "a") . "<br>";
    // 5.4 thay thế kí tự trong chuỗi
     echo str_replace("Mạnh" , "Moi" , $ten) . "<br>";

    //  6.toán tử
    $soThuNhat = 100;
    $soThuHai = 2;
    // toán tử tính toán + - * / %
    // toán tử gán += -= *= /= %=
    // toán tử so sánh == != 
    $tong = $soThuNhat + $soThuHai ;

    // 7.câu điều kiện : giống với các ngôn ngữ khác chỉ khác ở điểm elseif viết liền
    if($tong < 15){
        echo $tong . "nhỏ hơn 15";
    }elseif($tong == 15){
        echo $tong . "bằng 15";
    }else{
        echo $tong . "lớn hơn 15";
    }

    // 8.switch case
    $month = "bảy";
    switch($month){
        case "tám":
            echo "tháng 8 <br>";
            break;
        case "bảy":
            echo "tháng 7 <br>";
            break;
        default:
            echo "khum có";
            break;
        
    }

    // 9.for
    for($i = 0 ; $i <= 5 ; $i++){
        echo $i . "<br>"; 
    } 

    // 10.mảng

    $arr = ["cờ" , "liên" , "minh"]


   
    // đếm phần tử
    echo count($arr);
    // không thể dùng echo để in giá trị của phần tử trong mảng dùng print_r
    print_r($arr)



  ?>
</body>
</html>