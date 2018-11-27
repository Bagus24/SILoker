<?php 
    include("dbconfig.php");
    session_start();
?>
<?php 
  if(isset($_POST["submit"]))
  {  
  	 $status_tit=$_POST["status_title"];
     $sta=$_POST["status"];
     $uid=$_SESSION["id"];
     $sql=mysqli_query($con,"insert into posts(usr_id_p,status_title,status,status_image,status_time) 
     	values('$uid','$status_tit','$sta','',now());");
     if($sql)
     {
     	echo '<script>alert("berhasil post");</script>';
     }
  }


?>
<?php
  session_start();
  if($_SESSION['name']=='')
  {
     header('location:reg.php');
  }

 ?>
  <?php
  extract($_POST);
 if(isset($updpass))
 {
 	$em=$_SESSION["email"];
 $pass=md5($op);
 
	$que=mysqli_query($con,"select * from registration where email='$em' and password='$op'");
	$row= mysqli_num_rows($que);

	 if($row)
	 {
		if($np==$cp)
		{
		$npass=md5($np);
		mysqli_query($con,"update registration set password='$np' where email='$em'");
		
		$err="<font color='green'>Password Berhasil diubah !</font>";
		}
		else
		{
		$err="<font color='red'>Password tidak sama</font>";
		}
	 }
	 else
	 {
	  $err="<font color='red'>Password lama tidak berlaku</font>";
	 }
 
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="icon" href="../../favicon.ico">
 
 <!-- http://draganzlatkovski.com/code-projects/toggle-jquery-side-bar-menu-in-bootstrap-free-template/ -->
 
 <title>SI Loker</title>
 
 <!-- jQuery -->
 
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="perusahaan/components/bootstrap/dist/js/jquery.js"></script>
 
  
 
 <!-- Bootstrap core CSS -->
 <link href="perusahaan/components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Custom styles for this template -->
 <link href="perusahaan/components/bootstrap/dist/css/simple-sidebar.css" rel="stylesheet">
  <link href="perusahaan/components/bootstrap/dist/css/postmodal.css" rel="stylesheet">
  <link href="perusahaan/components/bootstrap/dist/css/fbbox.css" rel="stylesheet">

 

 

 
 
</head>

<body>
 
 
 


 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 <div class="container-fluid">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 
 </div>
 <div id="navbar" class="navbar-collapse collapse">
  
  
    <label class="navbar-text text-center text-primary" style="vertical-align:10px;font-size:medium ">SI Loker </label>
    <label class="navbar-text text-center text-primary" style="vertical-align:10px;font-size:medium ">Hallo! <font style="font-size:13px"> <?php echo $_SESSION["name"]; ?></font> </label>


   <?php  include("header1.php"); ?>

    


 
 </div>
 </nav>
 
 
 
 <!--
<div class="center"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">Post Task</button></div>
-->

 


 
 
 
 
 
 
 
 <div id="wrapper" class="toggled">
 <div class="container-fluid">
 <!-- Sidebar -->
 <div id="sidebar-wrapper">
 <ul class="sidebar-nav">
 <li class="sidebar-brand">
 <br>
 </li>
 <li class="sidebar-brand">
 <a href="#" class="navbar-brand">
  
  
               
 <span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $userRow['name']; ?>
 
 </a>
 </li>
 <li>
 <a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <font style="color:white"> Home </font></a>
 </li>
 <!--
 <li>
 <a href="#"><span  class="glyphicon glyphicon-comment"  aria-hidden="true"></span> Notification</a>
 </li> 
 
 -->
 <li>
  <a href="mytask.php"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> My Task</a>
 </li>
 
 <li>
 
 <li>
 
 </ul>
 </div>
 <!-- /#sidebar-wrapper -->
 

 
 
 
 <!-- /#page-content-wrapper -->
 </div>
 </div>
 <!-- /#wrapper -->

  
  <!-- Page Content -->
 <div id="page-content-wrapper">
 <div class="container-fluid">
 <div class="row">
 <div class="col-lg-12">
 <br>

 </div>
 </div>
 <div class="row">
 <div class="col-lg-12">

     <div>
</div>
 </div>
 </div>
 </div>
 </div>
  
  
  <!-- this is div for user post -->
  <?php  include("user_post.php"); ?>
 	     <div class="col-lg-8">

            <!--left-content-->
			<div class="center">
				<div class="posts">
					<div class="create-posts">
						<div class="col-sm-10 well">
            <div class = "modal-header">
            <h4 class = "modal-title" >
               Ubah Password Anda
            </h4>
         </div>
 <form method="post">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  </div> 

  
	 
	 
 
  <div class="form-group">
    <label for="exampleInputPassword1">Password lama</label>
    <input type="password" class="form-control" value="<?php echo @$op; ?>" name="op" id="exampleInputPassword1" placeholder="Masukan password lama" required>
  </div>
  
   <div class="form-group">
    <label for="exampleInputPassword1">Password Baru</label>
    <input type="password" value="<?php echo @$np; ?>" class="form-control" name="np" id="exampleInputPassword1" placeholder="Masukan password baru" required>
  </div>
  
   <div class="form-group">
    <label for="exampleInputPassword1">Konfirmasi Password</label>
    <input type="password" value="<?php echo @$cp; ?>" class="form-control" name="cp" id="exampleInputPassword1" placeholder="Masukan konfirmasi password" required>
  </div>
  
  

<br/>
<div class="form-group">
    <button name="updpass" class="btn  btn-success" type="submit">Simpan</button>
</div>
	</form>	
		</div>

 	     </div>
     <div>
</div>
</div>

		<!--content -->
			
						




</div>

</div>

</div>



 
<!-- Bootstrap Core JavaScript -->
<script src="components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
 $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>


	<script type="text/javascript">
		$(document).ready(function(){
			$('.status').click(function() { $('.arrow').css("left", 0);});
			$('.photos').click(function() { $('.arrow').css("left", 146);});
		});
	</script>
	

</body>
</html>