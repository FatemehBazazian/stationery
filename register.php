<?php
include("includes/header.php");
if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
?>
<script type="text/javascript">

location.replace("index.php");

</script>
<?php
} 
?>
<br />
<form name="register" action="action_register.php" method="POST">
    <table >
        <tr>
            <td style="width: 40%;">نام واقعی <span class="red">*</span></td>
            <td style="width: 60%;"><input type="text" id="realname" name="realname" /></td>
        </tr>

        <tr>
            <td>نام کاربری <span class="red">*</span></td>
            <td><input type="text" id="username" name="username" /></td>
        </tr>

        <tr>
            <td>کلمه عبور <span class="red">*</span></td>
            <td><input type="password" id="password" name="password" /></td>
        </tr>

        <tr>
            <td>تکرار کلمه عبور <span class="red">*</span></td>
            <td><input type="password" id="repassword" name="repassword" /></td>
        </tr>

        <tr>
            <td>پست الکترونیکی <span class="red">*</span></td>
            <td><input type="text" id="email" name="email" /></td>
        </tr>

        <tr>
            <td><br /><br /></td>
            <td>
                <input type="submit" value="ثبت نام" />
                
            </td>
        </tr>

    </table>
</form>

<?php
include("includes/footer.php");
?>
