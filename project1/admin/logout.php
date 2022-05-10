<?php
session_start();
if(isset($_SESSION["user"]) && isset($_SESSION["pass"])){
    unset($_SESSION["user"]);
    unset($_SESSION["pass"]);
}
else{
    die("Bạn không có quyền truy cập vào file này !");
}
header("location: index.php");
?>