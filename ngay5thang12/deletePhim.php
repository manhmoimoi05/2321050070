<?php
    include "connect.php";
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql = "delete from phim where id = '$id'";
        mysqli_query($conn , $sql );
        header("Location: admin.php?chuyen_trang=phim");
    }

?>