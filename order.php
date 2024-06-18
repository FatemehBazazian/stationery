<?php
include("includes/header.php");

$link = mysqli_connect("localhost", "root", "", "shop_db");

if (mysqli_connect_errno()) {
    exit("خطای زیر رخ داده است: " . mysqli_connect_error());
}

$pro_code = 0;
if (isset($_GET['id'])) {
    $pro_code = $_GET['id'];
}

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
?>
    <div class="container">
        <br />
        <span>! برای خرید پستی محصول انتخاب شده باید وارد سایت شوید !</span>
        <br/>

         در صورتی که عضو فروشگاه هستید برای تکمیل خرید خود روی 
         <a href='login.php' style='text-decoration: none;' ><span class='blue'><b>ورود به سایت</b></span></a>
        کلیک کنید
        <br/>

        در صورتی که عضو فروشگاه هستید برای تکمیل خرید خود روی 
         <a href='register.php' style='text-decoration: none;' ><span class='blue'><b>عضویت در سایت</b></span></a>
        کلیک کنید
        <br />
    </div>

<?php
    exit();
}

$query = "SELECT * FROM products WHERE pro_code='$pro_code'";
$result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);
?>

<div class="container">
    <form name="order" action="action_order.php" method="POST">
        <table class="form-table">
            <?php
            if ($row) {
            ?>
                <tr>
                    <td>کد کالا <span class="red">*</span></td>
                    <td><input type="text" id="pro_code" name="pro_code" value="<?php echo ($pro_code); ?>" class="input-style" readonly /></td>
                </tr>

                <tr>
                    <td>نام کالا <span class="red">*</span></td>
                    <td><input type="text" id="pro_name" name="pro_name" value="<?php echo ($row['pro_name']); ?>" class="input-style" readonly /></td>
                </tr>

                <tr>
                    <td>تعداد درخواستی <span class="red">*</span></td>
                    <td><input type="text" id="pro_qty" name="pro_qty" onchange="calc_price();" /></td>
                </tr>

                <tr>
                    <td>قیمت واحد کالا<span class="red">*</span></td>
                    <td><input type="text" id="pro_price" name="pro_price" value="<?php echo ($row['pro_price']); ?>" class="input-style" readonly />تومان</td>
                </tr>

                <tr>
                    <td>مبلغ قابل پرداخت<span class="red">*</span></td>
                    <td><input type="text" id="total_price" name="total_price" value="0" class="input-style" readonly />تومان</td>
                </tr>


                <?php
                $user_query = "SELECT * FROM users WHERE username='{$_SESSION['username']}'";
                $user_result = mysqli_query($link, $user_query);
                $user_row = mysqli_fetch_array($user_result);
                ?>

                <tr>
                    <td>نام خریدار <span class="red">*</span></td>
                    <td><input type="text" id="realname" name="realname" value="<?php echo ($user_row['realname']); ?>" class="input-style" readonly /></td>
                </tr>

                <tr>
                    <td>پست الکترونیکی <span class="red">*</span></td>
                    <td><input type="text" id="email" name="email" value="<?php echo ($user_row['email']); ?>" class="input-style" readonly /></td>
                </tr>

                <tr>
                    <td>شماره همراه <span class="red">*</span></td>
                    <td><input type="text" id="mobile" name="mobile" value="09" /></td>
                </tr>

                <tr>
                    <td>آدرس پستی <span class="red">*</span></td>
                    <td><textarea id="address" name="address" cols="30" rows="3"></textarea></td>
                </tr>

                <tr>
                    <td><br /><br /></td>
                    <td><input type="button" value="خرید محصول" onclick="check_input();" /></td>
                </tr>
            <?php
            } 
            ?>
        </table>
    </form>

</div>

<script type="text/javascript">
    function calc_price() {
        var pro_qty = <?php echo ($row['pro_qty']); ?>;
        var price = document.getElementById('pro_price').value;
        var count = document.getElementById('pro_qty').value;
        var total_price;

        if (count > pro_qty) {
            alert('تعداد موجودی انبار کمتر از درخواست شما است!!');
            document.getElementById('pro_qty').value = 0;
            count = 0;
        }

        if (count == 0 || count == '') {
            total_price = 0;
        } else {
            total_price = count * price;
        }

        document.getElementById('total_price').value = total_price;

    }

    function check_input() {
        var r = confirm("از صحت اطلاعات وارد شده اطمینان دارید؟");
        if (r == true) {
            var validation = true;
            var count = document.getElementById('pro_qty').value;
            var mobile = document.getElementById('mobile').value;
            var address = document.getElementById('address').value;

            if (count == 0 || count == '') {
                validation = false;
            }

            if (mobile.length < 11) {
                validation = false;
            }

            if (validation) {
                document.order.submit();
               } else {
                alert('برخی از ورودی های فرم سفارش محصول به درستی پر نشده‌اند');
            }
        }
    }
</script>

<?php
include ("includes/footer.php");
?>
