<?php
session_start();
include_once("connect.php");
if(isset($_SESSION["user"]) && isset($_SESSION["pass"])){
    $prd_id = $_GET["product_id"];
    
    $sql = "DELETE FROM `product`
            WHERE `product_id` = $prd_id";
    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=product_list");
}
else{
    die("Bạn không có quyền truy cập vào file này !");
}
?>