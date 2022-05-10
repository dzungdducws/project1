<?php
$sql = "SELECT * FROM `product`";
$query = mysqli_query($conn, $sql);

if(isset($_POST["sbm1"])){

    $person_name = $_POST["name"];
    $person_phonenb = $_POST["phone"];
    $person_address = $_POST["address"];

    $sql1 = "INSERT INTO `order`(
        `person_name`,
         `person_phonenb`,
          `person_address`
          ) 
    VALUES (
        '$person_name',
        '$person_phonenb',
        '$person_address'
    )";

    mysqli_query($conn, $sql1);
    
    $sql2 = "SELECT * FROM `order` ORDER BY `order_id` DESC LIMIT 1";
    
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($query2);

    $id = $row2['order_id'];


    $query3 = mysqli_query($conn, $sql);
    while ($row3 = mysqli_fetch_array($query3)){
    if(isset($_SESSION["cart"][$row3["product_id"]])&&$_SESSION["cart"][$row3["product_id"]]!=0){
        $name = $row3["name"];
        $amount = $_SESSION["cart"][$row3["product_id"]];
        $price = $_SESSION["cart"][$row3["product_id"]]*$row3["price"];

        $sql3 = "INSERT INTO `order_detail`(
            `product_name`, 
            `amount`, 
            `price`, 
            `order_id`
            ) 
        VALUES (
            '$name',
            '$amount',
            '$price',
            '$id'
        )";
    
        mysqli_query($conn, $sql3);

        }
    }

    // header("location: index.php");
}

?>

<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>


<div class="">
    <h2>Giỏ hàng</h2>
    <table class="sortable">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total_amount = 0;
            $total_price = 0;
            while ($row = mysqli_fetch_array($query)){
            if(isset($_SESSION["cart"][$row["product_id"]])&&$_SESSION["cart"][$row["product_id"]]!=0){ ?>
            <tr>
                <td><?php echo $row["name"] ?></td>
                <td><?php $total_amount+=$_SESSION["cart"][$row["product_id"]]; echo $_SESSION["cart"][$row["product_id"]] ?></td>
                <td><?php $total_price+=$_SESSION["cart"][$row["product_id"]]*$row["price"]; echo $_SESSION["cart"][$row["product_id"]]*$row["price"] ?></td>
                <td><a href="index.php?page_layout=cart_del&&prd_id=<?php echo $row["product_id"] ?>">Xóa</a></td>
            </tr>
            <?php }}?>
        </tbody>
        <tfoot>
            <tr>
                <td>Tổng cộng</td>
                <td><?php echo $total_amount ?></td>
                <td><?php echo $total_price ?></td>
            </tr>
        </tfoot>
    </table>

    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên</label>
            <input required name="name" class="form-control" placeholder="">
        </div>

        <div class="form-group">
            <label>Số điện thoại</label>
            <input required name="phone" type="number" min="0" class="form-control">
        </div>

        <div class="form-group">
            <label>Địa chỉ</label>
            <input required name="address" type="text" class="form-control">
        </div>

        <button name="sbm1" type="submit" class="btn">Mua hàng</button>

    </form>

</div>