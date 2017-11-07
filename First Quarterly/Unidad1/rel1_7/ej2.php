<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 07/11/2017
 * Time: 09:00
 */
if (isset($_POST['remember']) && $_POST['remember'] == 'yes') {
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        setcookie("user", $_POST['user'], time() + 60 * 60 * 24 * 100, "/");
        setcookie("pass", $_POST['pass'], time() + 60 * 60 * 24 * 100, "/");
    }
}
?>
    <html>
    <body>
    <form action="" method="post">
        User: <input type="text" name="user"><br/>
        Pass: <input type="password" name="pass"><br/>
        <input type="checkbox" name="remember" value="yes" checked="checked"> Recordar<br>
        <input type="submit" value="Enviar">
    </form>
    </body>
    </html>
<?php print_r($_COOKIE); ?>