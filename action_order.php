<?php
include ("includes/header.php");  
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
?>
<script type="text/javascript">
location.replace("index.php");	 
</script>
<?php
}
$pro_code = $_POST['pro_code'];
$pro_name = $_POST['pro_name'];
$pro_qty = $_POST['pro_qty'];
$pro_price = $_POST['pro_price'];
$total_price = $_POST['total_price'];

$realname = $_POST['realname'];

$email = $_POST['email'];

$mobile = $_POST['mobile'];
$address = $_POST['address'];

$username = $_SESSION['username'];

$link = mysqli_connect("localhost", "root", "", "shop_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());


$query = "INSERT INTO orders 
    (id,
     username,
     orderdate,
     pro_code,
     pro_qty,
     pro_price,
     mobile,
     address
     ) VALUES
      ('0',
       '$username',
       '".date('y-m-d')."',
       '$pro_code',
       '$pro_qty',
       '$pro_price',
       '$mobile',
       '$address'
       )";



if (mysqli_query($link, $query) === true) {
    echo ("<p><br/><b>سفارش شما با موفقیت ثبت شد</b></p>");

    echo ("<p><br/><b>کاربر گرامی  $realname</b></p>");
    echo ("<p><br/><b>محصول $pro_name با کد $pro_code به تعداد $pro_qty با قیمت پایه $pro_price تومان را سفارش داده‌اید</b></p>");
    echo ("<p><br/><b>مبلغ قابل پرداخت  $total_price تومان است</b></p>");
 
    echo ("<p><b>پس از بررسی سفارش و تایید آن با شما تماس گرفته خواهد شد</b></p>");
    echo ("<p><b>محصول خریداری شده از طریق پست به آدرس درج شده ارسال خواهد شد</b></p>");
    echo ("<p><b>در هنگام تحویل محصول آن را بررسی و از سالم بودن آن اطمینان حاصل کنید سپس مبلغ کالا به مامور پست تحویل دهید</b><br/><br/></p>");
    
    $query = "UPDATE products SET pro_qty=pro_qty-$pro_qty WHERE pro_code='$pro_code'";
    mysqli_query($link, $query);

} else
    echo ("<p><b>خطا در ثبت سفارش</b></p>");


mysqli_close($link);

include ("includes/footer.php");
?>