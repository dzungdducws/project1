<div class="">
    <h3>Sản phẩm có chứa "<?php $search = $_GET['Search']; echo $search; ?>"</h3>
    <div class="product-list">
        <?php
            $search = '%'.$search.'%';
            $sql = "SELECT * FROM `product` WHERE `name` LIKE '$search'";
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
</div>