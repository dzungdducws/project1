<div class="header">
    <div class="header-left">
        <a href="index.php">
            <h3>Web bán điện thoại</h3>
        </a>
    </div>
    <div class="header-mid">
        <?php 
            if(isset($_POST["sbm"])){

                $search = $_POST["search"];

                header("location: index.php?page_layout=search&&Search=$search");
            }
        ?>
        <form role="form" method="post" enctype="multipart/form-data">
            <input type="search" placeholder="Tìm kiếm" aria-label="Search" name="search">
            <button class="btn" type="submit" name="sbm">Tìm kiếm</button>
        </form>
    </div>
    <div class="header-right">
        <a href="index.php?page_layout=cart">Giỏ hàng</a>
        <div>
            <?php 
                $sql = "SELECT * FROM `product`";
                $query = mysqli_query($conn, $sql);
                $count = 0;
                while ($row = mysqli_fetch_array($query)){
                    if(isset($_SESSION["cart"][$row["product_id"]])&&$_SESSION["cart"][$row["product_id"]]!=0){
                        $count++;
                    }
                }
                echo $count;
            ?>
        </div>
    </div>
</div>