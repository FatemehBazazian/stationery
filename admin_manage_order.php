<?php
include("includes/header.php");

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] == true && $_SESSION["user_type"] == "admin")) {
    ?>
    <script type="text/javascript">
        location.replace("index.php"); 
    </script>
    <?php
    exit; 
}

$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno()) {
    exit("خطایی در اتصال به پایگاه داده رخ داده است: " . mysqli_connect_error());
}

$query = "SELECT * FROM orders";
$result = mysqli_query($link, $query);

?>

<link rel="stylesheet" type="text/css" href="styles.css"> 

<br />

<table class="table-order" >
    <tr>
        <th>کد سفارش</th>
        <th>نام خریدار</th>
        <th>نام محصول</th>
        <th>تاریخ سفارش</th>
        <th>تعداد سفارش</th>
        <th>قیمت کالا</th>
        <th>قیمت نهایی</th>
        <th>شماره تماس</th>
        <th>آدرس</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_array($result)) {
        $query_user = "SELECT * FROM users WHERE username='{$row['username']}'";
        $result_user = mysqli_query($link, $query_user);
        $row_user = mysqli_fetch_array($result_user);

        $query_product = "SELECT * FROM products WHERE pro_code='{$row['pro_code']}'";
        $result_product = mysqli_query($link, $query_product);
        $row_product = mysqli_fetch_array($result_product);
    ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row_user['realname']; ?></td>
        <td><?php echo $row_product['pro_name']; ?></td>
        <td><?php echo $row['orderdate']; ?></td>
        <td><?php echo $row['pro_qty']; ?></td>
        <td><?php echo $row['pro_price']; ?>&nbsp; تومان</td>
        <td><?php echo $row['pro_qty'] * $row['pro_price']; ?>&nbsp; تومان</td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['address']; ?></td>
    </tr>
    <tr class="footer-row">
        <td colspan="9"></td>
    </tr>
    <?php
    }
    ?>

</table>

<?php
include("includes/footer.php");
?>
