<?php
include ("includes/header.php");

if (isset($_POST['realname'])  && !empty($_POST['realname']) && 
	isset($_POST['username']) && !empty($_POST['username']) && 
	isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['repassword']) && !empty($_POST['repassword']) &&
	isset($_POST['email']) && !empty($_POST['email'])) {

    $realname = $_POST['realname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
} else
    exit("برخی از فیلد ها مقدار دهی نشده است");


if ($password != $repassword)
    exit("كلمه عبور و تكرار آن مشابه نيست");


if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
    exit("پست اكترونيك وارد شده صحيح نیست");

$link = mysqli_connect("localhost", "root", "", "shop_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "INSERT INTO users (realname,username,password,email,type) VALUES ('$realname','$username','$password','$email','0')";

if (mysqli_query($link, $query) == true)
   { echo ("<p class='green'><b>" . $realname .
        " گرامي عضويت شما با نام كاربري " . $username .
        " در فروشگاه با موفقيت انجام شد " . "</b></p>");
    }
else
    echo ("<p class='red'><b>عضويت شما در فروشگاه انجام نشد</b></p>");

mysqli_close($link);
include ("includes/footer.php");
?>
