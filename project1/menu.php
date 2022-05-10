<div class="menu">
    <ul>
        <?php
        $sql = "SELECT * FROM `category_type` ORDER BY `type_id` ASC";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($query)){
        ?>
        <li class="menu-item"><a href="index.php?page_layout=product_list&&type_id=<?php echo $row["type_id"] ?>"><?php echo $row["type"] ?></a></li>
        <?php }  ?>
    </ul>
</div>