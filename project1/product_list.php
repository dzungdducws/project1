<?php
    $type_id = $_GET["type_id"];
    $sql = "SELECT * FROM `product` WHERE `type_id` = '$type_id'";
    $query = mysqli_query($conn, $sql);
    
    $sql_cat = "SELECT * FROM `category_type` WHERE `type_id` = '$type_id'";
    $query_cat = mysqli_query($conn, $sql_cat);
    $row_cat = mysqli_fetch_array($query_cat);
?>

<div class="">
    <h3>Danh mục <?php echo $row_cat['type'] ?> </h3>
    <div class="product-list">
    
        <?php while($row = mysqli_fetch_array($query)){ ?>
    
        <a href="index.php?page_layout=product_detail&&prd_id=<?php echo $row["product_id"] ?>" class="product-item">
            <img src="admin/images/<?php echo $row['img']; ?>">
            <h4><?php echo $row['name']; ?></h4>
            <p>Giá Bán: <span><?php echo $row['price']; ?></span></p>
        </a>
    
        <?php } ?>
    </div>
</div>