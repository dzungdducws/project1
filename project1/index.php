<?php
include_once("admin/connect.php");
session_start();

if (isset($_GET["page_layout"])) {
    switch ($_GET["page_layout"]){
        case "product_detail":
            $title = "Chi tiết sản phẩm";
            break;
        case "product_list":
            $type_id = $_GET["type_id"];
            $sql = "SELECT * FROM `category_type` WHERE `type_id` = '$type_id'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            $title = "Danh sách sản phẩm ".$row["type"];
            break;
        case "search":
            $title = "Tìm kiếm '".$_GET['Search']."'";
            break;
        case "cart":
            $title = "Giỏ hàng";
            break;
        }
    }
    else
    $title = "Trang chủ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?php  echo $title; ?></title>
</head>

<body>
    <?php
    include_once("header.php");
    include_once("menu.php");  

	if (isset($_GET["page_layout"])) {
        switch ($_GET["page_layout"]){
            case "product_detail":
                $title = "Chi tiết";
                include_once("product_detail.php");
                break;
            case "product_list":
                include_once("product_list.php");
                break;
            case "search":
                include_once("search.php");
                break;
            case "cart":
                include_once("cart.php");
                break;
            case "cart_add":
                include_once("cart_add.php");
                break; 
             case "cart_del":
                include_once("cart_del.php");
                break; 
        }
	}
    else
    include_once("product_featured.php");  
    include_once("footer.php");  
	?>
</body>

</html>