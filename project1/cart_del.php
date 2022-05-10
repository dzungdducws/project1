<?php
$product_id = $_GET["prd_id"];
$_SESSION["cart"][$product_id] = 0;

header("location: index.php?page_layout=cart");

?>
