<?php
include ("includes/header.php");
if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
?>
<script type="text/javascript">
location.replace("index.php"); 
</script>
<?php
   } 
?>

<br />
<form name="login" action="action_login.php" method="POST">
    <table>
        <tr>
            <td>نام کاربری <span class="red">*</span></td>
            <td><input type="text" id="username" name="username" /></td>
        </tr>

        <tr>
            <td>کلمه عبور <span class="red">*</span></td>
            <td><input type="password" id="password" name="password" /></td>
        </tr>

        <tr>
            <td><br /><br /></td>
            <td><input type="submit" value="ورود" /></td>
        </tr>
    </table>
</form>

<?php
include ("includes/footer.php");
?>
