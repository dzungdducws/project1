<?php
$product_id = $_GET["prd_id"];
if(isset($_SESSION["cart"][$product_id])){
    $_SESSION["cart"][$product_id]++;
}
else{
    $_SESSION["cart"][$product_id] = 1;
}

header("location: index.php?page_layout=product_detail&&prd_id=$product_id");
?>