<?php
include ("includes/header.php");

$link = mysqli_connect("localhost", "root", "", "shop_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "SELECT * FROM products";             

$result = mysqli_query($link, $query);            
?>

<link rel="stylesheet" type="text/css" href="styles.css">

<div class="flex-container">
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
    <div class="product-container">
        <h4><?php echo ($row['pro_name']) ?></h4>
        <img src="img/<?php echo ($row['pro_image']) ?>" alt="<?php echo ($row['pro_name']) ?>" />
        <br/>
        <b>قیمت:</b> <span class="price"><?php echo ($row['pro_price']) ?> تومان</span>
        <br/>
        <b>تعداد موجودی:</b> <span class="quantity"><?php echo ($row['pro_qty']) ?></span>
        <br/>
        <b>توضیحات:</b> <span class="description"><?php echo (substr($row['pro_detail'],0,240)) ?></span>
        <br/>
        <a href="order.php?id=<?php echo ($row['pro_code']) ?>" class="order-button">سفارش و خرید پستی</a>
    </div>
    <?php
    }
    ?>
</div>

<?php
include ("includes/footer.php");
?>