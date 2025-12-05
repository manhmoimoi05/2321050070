
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            padding:0;
            margin:0;
        }
        nav{
            display:flex;
            justify-content:space-around;
            background:gray;
        }
        ul{
            display:flex;
            list-style-type: none;
        }
        li{
            padding:10px;
        }
        a{
         text-decoration:none ;
         color:white;

        }
        a:hover{
            color:pink;
        }
    </style>
    <title>admin</title>
</head>

<body>
    <!-- khởi tạo trang chính chứa phần header các nội dung khác sẽ chia ra thành các file php nhỏ
       - mỗi file có một giao diện cũng như mức độ hiện thị khác nhau
       - khi cần đến file nào hiển thị ta sẽ dùng cách điều hướng nội dung bằng cách truyền tham số trong URL để chuyển qua lại giữa các file 
       - dùng cấu trúc switch case so sánh giá trị tham số truyền vào đó 
       - so sánh nếu giá trị bằng với trường hợp trong case sẽ nạp file đó vào file index.php này thông qua include
       - include không phải là 1 hàm , trong php nó là 1 ngôn ngữ cấu trúc giúp nạp file khác vào 1 file cố định
       
       - thông qua file này bắt đầu từ việc kiểm tra giá trị của tham số chuyen_trang được truyền vào thông qua url
       - sau đó so sánh giá trị đó bằng switch case -> so sánh xong trả lại file tương ứng vào file gốc thông qua include -> nạp toàn bộ dữ liệu 1 file khác -->
    <header>
        <!-- xây dựng header bao gồm thanh điều hướng nav -->
        <nav>
            
            <ul>
                <li>
                    <!-- đối với mỗi file khác nhau sẽ truyền vào giá trị cho tham số tương ứng -->
                     <!-- file trang chủ key = chuyen_trang và value = trangchu -->
                    <a href="admin.php?chuyen_trang=trangchu">Trang Chủ</a>
                </li>
                <li>
                    <!--đặt đường link trong thẻ a khi được click để nhận tín hiệu chuyển trang dùng đường link url này -->
                    <a href="admin.php?chuyen_trang=phim">Phim</a>
                </li>
                <li>
                    <a href="admin.php?chuyen_trang=theloai">Thể Loại</a>
                </li>
                <li>
                    <a href="admin.php?chuyen_trang=quocgia">Quốc gia</a>
                </li>
                <li>
                    <a href="admin.php?chuyen_trang=nguoidung">Người dùng</a>
                </li>
                <li>
                    <a href="admin.php?chuyen_trang=phimTheLoai">Phim thể loại</a>
                </li>
            </ul>
            
            <ul>
                <li>
                    <?php 
                    // bắt đầu sử dụng session
                    session_start();
                    // kiểm tra biến username trong session đã tồn tại chưa
                    if(!isset($_SESSION["username"])){
                        // nếu chưa tồn tại quay về trang login.php
                        header("Location: login.php");
                    }
                    // nếu đã tồn tại in ra giá trị của biến đó
                     echo $_SESSION["username"];?>
                </li>
                <li><a href="admin.php?chuyen_trang=logout">Đăng Xuất</a></li>
            </ul>
            
        </nav>
    </header>
      <?php 
        
         //xây dựng sơ đồ để in ra file cần thiết dựa vào giá trị được thêm thông qua đường link url 
        //  lấy các giá trị đó thông qua biến chuyen_trang nằm trong $_GET
        // kiểm tra biến chuyen_trang đã được khởi tạo chưa
         if(isset($_GET['chuyen_trang'])){
            // đã khởi tạo dùng switch case để so sánh giá trị hiện tại của biến chuyen_trang
            switch($_GET['chuyen_trang']){
                // chia ra làm nhiều case khác nhau
                // mỗi case sẽ in ra 1 file khác nhau và hiện thị nó vào file gốc index.php này
               case 'trangchu':
                // dùng include để in ra những file này
                  include "trangchu.php";
                  break;
                //   khi value trong biến chuyen_trang = phim 
               case 'phim':
                //   in ra toàn bộ file phim.php vào trong file index.php này và hiện thị nó
                  include "phim.php";
                  break;
               case 'theloai':
                  include "theloai.php";
                  break;
               case 'quocgia':
                  include "quocgia.php";
                  break;
               case 'nguoidung':
                  include "nguoidung.php";
                  break;
               case 'themNguoiDung':
                  include "themNguoiDung.php";
                  break;
               case 'deleteId':
                  include "deleteId.php";
                  break;   
               case 'updateUser':
                   include "updateUser.php";
                   break; 
               case 'themTheLoai':
                    include "themTheLoai.php";
                    break;    
               case 'updateTheLoai':
                    include "updateTheLoai.php";
                    break;
               case 'themQuocGia':
                    include "themQuocGia.php";
                    break;      
               case 'updateQuocGia':
                    include "updateQuocGia.php";
                    break;
               case 'themPhim':
                    include "themPhim.php";
                    break;      
               case 'updatePhim':
                    include "updatePhim.php";
                    break;  
               case 'deletePhim':
                    include "deletePhim.php";
                    break; 
               case 'phimTheLoai':
                    include "phimTheLoai.php";
                    break; 
               case 'updatePhimTheLoai':
                    include "updatePhimTheLoai.php";
                    break;       
               case 'logout': 
                  include "logout.php" ;     
                  break;
            }
         }
        //  tương tự như vậy mỗi giá trị value tương ứng 1 file được in ra hoặc được chạy 

        

    ?>
  
</body>
</html>