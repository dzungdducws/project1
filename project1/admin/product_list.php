<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}
?>

<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>


<div class="main">
    <h2>Danh sách sản phẩm</h2>
    <a href="index.php?page_layout=add_product"><button class="btn">Thêm sản phẩm</button></a>
    <table class="sortable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh minh họa</th>
                <th>Trạng thái</th>
                <th>Danh mục</th>
                <th>Hàng động</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM product
            INNER JOIN category_type
            ON product.type_id = category_type.type_id";
            $query = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($query)){
            ?>

            <tr>
                <td><?php echo $row["product_id"];?></td>
                <td><?php echo $row["name"];?></td>
                <td class="td-img"><img src="images/<?php echo $row["img"];?>" alt=""></td>
                <td><?php echo $row["status"]?'Còn hàng':'Hết hàng';?></td>
                <td><?php echo $row["type"];?></td>
                <td>
                    <a href="del_product.php?product_id=<?php echo $row["product_id"];?>">Xóa</a>
                    <a href="index.php?page_layout=edit_product&&product_id=<?php echo $row["product_id"];?>">Sửa</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>