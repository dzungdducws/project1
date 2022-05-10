<?php
    $product_id = $_GET["prd_id"];
    $sql = "SELECT * FROM `product` WHERE `product_id` = '$product_id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
?>

<div class="product-detail">
    <img src="admin/images/<?php echo $row['img']; ?>">
    <div>
        <h1><?php echo $row['name']; ?></h1>
        <ul>
            <li><span>Khuyến Mại:</span><?php echo $row['promotions']; ?></li>
            <li class="price">Giá Bán (chưa bao gồm VAT)</li>
            <li class="price-number"><?php echo $row['price']; ?></li>
            <li class="status"><?php echo $row["status"]?'Còn hàng':'Hết hàng';?></li>
        </ul>
        <a href="index.php?page_layout=cart_add&&prd_id=<?php echo $product_id ?>"><button class="btn" <?php if(!$row["status"]) echo "disabled";?> >Thêm vào giỏ hàng</button></a> 
    </div>
</div>

<div class="product-list">
    <?php
        $sql = "SELECT * FROM `product` ORDER BY RAND () LIMIT 3";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($query)){
    ?>

    <a href="index.php?page_layout=product_detail&&prd_id=<?php echo $row["product_id"] ?>" class="product-item">
        <img src="admin/images/<?php echo $row['img']; ?>">
        <h4><?php echo $row['name']; ?></h4>
        <p>Giá Bán: <span><?php echo $row['price']; ?></span></p>
    </a>

    <?php } ?>
</div>