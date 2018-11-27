<?php
    session_start();
    include "config/config.php";
    $alert = "";
    if (isset($_SESSION['username'])) {
        header("location:index.php");
    }

    if (isset($_POST['submit'])) {
        $password = sha1($_POST['username'].$_POST['password']);
        
        $query = mysqli_query($con, "SELECT * FROM tb_admin WHERE username='$_POST[username]' AND password='$password'");
        $count = mysqli_num_rows($query);
        if ($count > 0) {
            session_start();
            $_SESSION['username'] = $_POST['username'];
            header("Location: index.php");
        } else {
            $alert = "
            <div class='alert alert-danger'>
                <strong>Gagal!</strong> Kombinasi username dan password salah.
            </div>
            ";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Admin | Loker</title>

        <?php include "config/content.php" ?>

        <link rel="stylesheet" href="assets/css/login.css">
    </head>
    <body>
        <?php
        include "layouts/navbar.php";
        ?>

        <div class="container">

            <div class="row justify-content-center" style="margin-top:70px;margin-bottom:70px">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            		<form role="form" method="post">
            			<fieldset>
            				<h2>Please Sign In</h2>
            				<hr class="colorgraph">
                            <?php echo $alert; ?>
            				<div class="form-group">
                                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username">
            				</div>
            				<div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
            				</div>
            				<div class="row">
            					<div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" name="submit" class="btn btn-lg btn-info btn-block" value="Masuk">
            					</div>
            				</div>
            			</fieldset>
            		</form>
            	</div>
            </div>

            </div>

        <?php
        include "layouts/footer.php"
        ?>

        <script type="text/javascript" src="assets/js/particle-js"></script>
    </body>
</html>
