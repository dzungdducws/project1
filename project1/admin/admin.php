<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}
if (isset($_GET["page_layout"])) {
    switch ($_GET["page_layout"]){
        case "order_list":
            $title = "Quản lý đơn hàng";
            break;
          case "product_list":
            $title = "Quản lý sản phẩm";
            break;
        case "contact":
            $title = "Thông tin liên lạc";
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
    <title><?php echo $title?></title>
</head>

<body>
    <div class="header">
        <div class="header-left">
            <a href="../index.php">
                <h3>Web bán điện thoại</h3>
            </a>
        </div>

        <div class="header-right">
            <h4><?php echo $_SESSION["user"];?></h4>
            <a href="logout.php">Đăng xuất</a>
        </div>
    </div>

    <div class="sidenav">
        <a href="index.php?page_layout=product_list">Quản lý sản phẩm</a>
        <a href="index.php?page_layout=order_list">Quản lý đơn hàng</a>
        <a href="logout.php">Đăng xuất</a>
        <a href="index.php?page_layout=contact">Contact</a>
    </div>

    <?php
	if (isset($_GET["page_layout"])) {
        switch ($_GET["page_layout"]){
            case "order_list":
                include_once("order_list.php");
                break;
              case "product_list":
                include_once("product_list.php");
                break;
              case "add_product":
                include_once("add_product.php");
                break;
            case "edit_product":
                include_once("edit_product.php");
                break;
            case "contact":
                include_once("contact.php");
                break;
        }
	}
    else
    include_once("contact.php");
	?>
</body>

</html>