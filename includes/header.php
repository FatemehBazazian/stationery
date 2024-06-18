<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>فروشگاه لوازم تحریر</title>
    <link rel="stylesheet" href="style.css">
</head>
<body dir="rtl">
    <div class="container">
        <header>
            <h1> فروشگاه لوازم تحریر </h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">صفحه اصلی</a></li>
                <li><a href="register.php">عضویت در سایت</a></li>
                <?php if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] == true): ?>
                    <li><a href="logout.php">خروج از سایت (<?php echo $_SESSION["realname"]; ?>)</a></li>
                <?php else: ?>
                    <li><a href="login.php">ورود به سایت</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin"): ?>
                    <li><a href="admin_products.php">مدیریت محصولات</a></li>
                    <li><a href="admin_manage_order.php">مدیریت سفارشات</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    </body>
</html>
