<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}

$prd_id = $_GET["product_id"];

$sql_prd = "SELECT * FROM `product`
            WHERE `product_id` = $prd_id";

$query_prd = mysqli_query($conn, $sql_prd);
$row_prd = mysqli_fetch_array($query_prd);

if(isset($_POST["sbm"])){

    $name = $_POST["name"];
    $price = $_POST["price"];
    $promotions = $_POST["promotions"];

    if($_FILES["img"]["name"] != ""){
        $img = $_FILES["img"]["name"];
        $tmp_name = $_FILES["img"]["tmp_name"];
        move_uploaded_file($tmp_name, "images/".$img);
    }
    else{
        $img = $row_prd["img"];
    }

    $type_id = $_POST["type_id"];
    $status = $_POST["status"];


    $sql = "UPDATE `product` 
        SET 
        `type_id` = '$type_id', 
        `img` = '$img', 
        `status` = '$status', 
        `price` = '$price', 
        `promotions` = '$promotions', 
        `name` = '$name' 
        WHERE 
        `product_id` = '$prd_id'
        ";

    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=product_list");
}
?>
<div class="main">
    <h2>Thêm sản phẩm</h2>

    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input required name="name" class="form-control" value="<?php echo $row_prd["name"] ?>">
        </div>

        <div class="form-group">
            <label>Giá sản phẩm</label>
            <input required name="price" type="number" min="0" class="form-control"
                value="<?php echo $row_prd["price"] ?>">
        </div>

        <div class="form-group">
            <label>Khuyến mãi</label>
            <input required name="promotions" type="text" class="form-control"
                value="<?php echo $row_prd["promotions"] ?>">
        </div>

        <div class="form-group">
            <label>Ảnh sản phẩm</label>

            <input name="img" type="file">
            <br>
            <div>
                <img src="images/<?php echo $row_prd["img"] ?>">
            </div>
        </div>

        <div class="form-group">
            <label>Danh mục</label>
            <?php
                $sql_cat = "SELECT * FROM `category_type` ORDER BY `type_id` ASC";
                $query = mysqli_query($conn, $sql_cat);
            ?>
            <select name="type_id" class="form-control">
                <?php 
                $row_cat = mysqli_fetch_array($query);
                while($row_cat){?>
                <option value=<?php echo $row_cat["type_id"] ?>
                    <?php if($row_prd["type_id"]==$row_cat["type_id"]){echo "selected";}?>>
                    <?php echo $row_cat["type"] ?></option>
                <?php $row_cat = mysqli_fetch_array($query);} ?>
            </select>
        </div>

        <div class="form-group">
            <label>Trạng thái</label>
            <select name="status" class="form-control">
                <option value=1 <?php if($row_prd["status"]==1){echo "selected";}?>>Còn hàng</option>
                <option value=0 <?php if($row_prd["status"]==0){echo "selected";}?>>Hết hàng</option>
            </select>
        </div>


        <button name="sbm" type="submit" class="btn">Sửa mới</button>

    </form>
</div>