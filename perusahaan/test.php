<?php
    if (isset($_POST['submit'])) {
        echo sha1($_POST['uname'].$_POST['pass']);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form method="post">
            <input type="text" name="uname" value="">
            <input type="text" name="pass" value="">
            <input type="submit" name="submit" value="">
        </form>
    </body>
</html>
