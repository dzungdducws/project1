<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}
?>

<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

<div class="main">
    <h2>Danh sách đơn hàng</h2>
    <table class="sortable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Sđt</th>
                <th>Địa chỉ</th>
                <th>Chi tiết đơn</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $sql = "SELECT * FROM `order`";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($query)){
            ?>

            <tr>
                <td><?php echo $row["order_id"] ?></td>
                <td><?php echo $row["person_name"] ?></td>
                <td><?php echo $row["person_phonenb"] ?></td>
                <td><?php echo $row["person_address"] ?></td>
                <td>
                    <table class="sortable">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $total_amount = 0;
                                $total_price = 0;
                                $id = $row["order_id"];
                                $sql1 = "SELECT * FROM `order_detail` WHERE `order_id` = $id";
                                $query1 = mysqli_query($conn, $sql1);
                                while($row1 = mysqli_fetch_array($query1)){
                            ?>

                            <tr>
                                <td><?php echo $row1["product_name"] ?></td>
                                <td><?php $total_amount+=$row1["amount"]; echo $row1["amount"] ?></td>
                                <td><?php $total_price+=$row1["price"]; echo $row1["price"] ?></td>
                            </tr>

                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Tổng cộng</td>
                                <td><?php echo $total_amount ?></td>
                                <td><?php echo $total_price ?></td>                            
                            </tr>
                        </tfoot>
                    </table>

                </td>

            </tr>

            <?php } ?>
        </tbody>
    </table>
</div>