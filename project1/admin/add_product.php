<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}

if(isset($_POST["sbm"])){

    $name = $_POST["name"];
    $price = $_POST["price"];
    $promotions = $_POST["promotions"];

    $img = $_FILES["img"]["name"];
    $tmp_name = $_FILES["img"]["tmp_name"];
    move_uploaded_file($tmp_name, "images/".$img);

    $type_id = $_POST["type_id"];
    $status = $_POST["status"];


    $sql = "INSERT INTO `product`(
        `type_id`, 
        `img`, 
        `status`, 
        `price`, 
        `promotions`, 
        `name`
        ) 
    VALUES (
        '$type_id',
        '$img',
        '$status',
        '$price',
        '$promotions',
        '$name'
    )";
    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=product_list");
}
?>
<div class="main">
    <h2>Thêm sản phẩm</h2>

    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input required name="name" class="form-control" placeholder="">
        </div>

        <div class="form-group">
            <label>Giá sản phẩm</label>
            <input required name="price" type="number" min="0" class="form-control">
        </div>

        <div class="form-group">
            <label>Khuyến mãi</label>
            <input required name="promotions" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>Ảnh sản phẩm</label>

            <input required name="img" type="file">
            <br>
            <div>
                <img src="images/product-1.jpg">
            </div>
        </div>

        <div class="form-group">
            <label>Danh mục</label>
            <?php
                $sql = "SELECT * FROM `category_type` ORDER BY `type_id` ASC";
                $query = mysqli_query($conn, $sql);
            ?>
            <select name="type_id" class="form-control">
                <?php 
                $row = mysqli_fetch_array($query);
                while($row){?>
                <option value=<?php echo $row["type_id"] ?> ><?php echo $row["type"] ?></option>
                <?php $row = mysqli_fetch_array($query);} ?> 
            </select>
        </div>

        <div class="form-group">
            <label>Trạng thái</label>
            <select name="status" class="form-control">
                <option value=1 selected>Còn hàng</option>
                <option value=0>Hết hàng</option>
            </select>
        </div>


        <button name="sbm" type="submit" class="btn">Thêm mới</button>

    </form>
</div>