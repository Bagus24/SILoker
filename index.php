<?php  

		session_start();

		include_once 'dbconfig.php';

		if (isset($_SESSION['user']) != "") {
		header("Location: user.php");
		}
		if (isset($_POST['login_btn'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$row = $crud->getUser($email);

		if ($row['password'] == $password) {
		$_SESSION['user'] = $row['name'];
		header("Location: user.php");
		} else {
		echo("Terjadi kesalahan");
		}

		}


  ?> 



<?php
include_once 'dbconfig.php';
if(isset($_POST['save']))
{
	 $name = $_POST['name'];
	 $email = $_POST['email'];
	 $date = $_POST['date'];
     $no_hp = $_POST['no_hp'];
	 $password = $_POST['password'];
	 $address = $_POST['address'];
     $image=$_FILES["image"]["name"];
    $tmp=$_FILES["image"]["tmp_name"];
    $type=$_FILES["image"]["type"]; 
	$path="user_images/".$image;
	
     if($crud->insertPDO($name,$email,$date,$no_hp,$image, $password,$address))
     {
		move_uploaded_file($tmp,$path);
      echo "<script>alert('Pendaftaran sukses. silahkan login')</script>";
     }
     else
     {
     echo "<script>alert('Gagal mendaftar')</script>";
     }
}
?>



<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<!-- Mirrored from www.vasterad.com/themes/workscout/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Jun 2017 06:31:38 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>SI Loker</title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css1/style.css">
<link rel="stylesheet" href="css1/colors/green.css" id="colors">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" id="colors">


<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>
<div id="wrapper">


<!-- Header
================================================== -->
<header class="transparent sticky-header full-width">
<div class="container">
	<div class="sixteen columns">
	
		<!-- Logo -->
		<div id="logo" style="margin-top:15px">
			<h1><a href="index.php"><font style="font-size:25px; color:white">SI Loker</font></a></h1>
		</div>

		<!-- Menu -->
		<nav action="search.php" method="post" id="navigation" class="menu">
			<ul id="responsive">

				<li class="form-inline" id="homesearch">
					<input type="text" class="form-control" size="50" placeholder="Cari pekerjaan anda" id="query" name="search" value="">
					
				</li>
				
				
				 <li><button type="submit" class="btn btn-success" id="search"><i class="fa fa-search" ></i> Cari</button>
					
				</li> 
			</ul>

			

			<ul class="float-right">
				
				<li><a data-toggle = "modal" data-target = "#signupModal"><i class="fa fa-user" ></i> Daftar</a></li>
				<li><a data-toggle = "modal" data-target = "#myModal"><i class="fa fa-lock"></i> Masuk</a></li>
				<li><a data-toggle = "modal" href = "perusahaan/index.php"><i class="fa fa-briefcase"></i> Perusahaan</a></li>
				
			</ul>

		</nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>


<!-- Banner
================================================== -->
<div id="banner" class="with-transparent-header parallax background" style="background-image: url(images/banner-home-02.jpg)" data-img-width="2000" data-img-height="1330" data-diff="300">
	<div class="container">
		<div class="sixteen columns">
			
			<div class="search-container">

				
				
				<!-- Announce -->
				<div class="announce">
					<strong>Jadilah orang sukses!</strong> 
				</div>

			</div>

		</div>
	</div>
</div>


<!-- Content
================================================== -->


<!-- Modal for login -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Silahkan Login
            </h4>
         </div>
         <form class="form-signin" method="POST" >
         
         <div class = "modal-body">
            <input type="email" name="email" placeholder="Masukan email anda" />
         </div>
         <div class = "modal-body">
            <input type="password" name="password" placeholder="Masukan password anda" />
         </div>
         
         <div class = "modal-footer">
            
            <input type = "submit" class = "btn btn-primary" name="login_btn" value="Masuk">
               
            </input>
			<button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Batal
            </button>
            
        </form>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->

<!-- Modal for sign up -->
<div class = "modal fade" id = "signupModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Isi Data Akun
            </h4>
            <form method="POST" class="form-signin" enctype="multipart/form-data">
         </div>
         <div class = "modal-body">
            <input type="text" name="name" placeholder="Masukan nama anda" required/>
         </div>
         
         <div class = "modal-body">
		 <input type="email" name="email" placeholder="Masukan email anda" required/>
         </div>
         <div class = "modal-body">
		 <input type="password" name="password" placeholder="Masukan password anda" required/>
         </div>
		 <div class = "modal-body">
        Tanggal lahir Anda &nbsp;  <input type="date" name="date"  required/>
         </div>
		 <div class = "modal-body">
            <input type="number" name="no_hp" placeholder="Masukan nomor telepon anda" required/>
         </div>
		 <div class = "modal-body">
          Alamat  <textarea name="address" placeholder="Masukan alamat anda" required>  </textarea>
         </div>
         <div class = "modal-body">
		 Pilih Foto Anda  &nbsp; <input type="file" name="image" required/>
         </div>
         
         <div class = "modal-footer">
            
            <input type = "submit" class = "btn btn-primary" value="Daftar" name="save">
			 <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Batal
            </button>
           
		   
            </input>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->

<!-- Content
================================================== -->
<div class="container">
	
	<h1 class="text-center">Daftar Lowongan</h1>
	<div class="eleven columns">
	<div class="padding-right">
		
		

		<ul class="job-list full">
			<?php 
        
           ?>
			
		</ul>
		<div class="clearfix"></div>

		<div class="pagination-container">
			
			
		</div>

	</div>
	</div>


	<!-- Widgets -->
	<div class="five columns">
          
		<!-- Sort by -->
		<div class="widget">
            
			<img src="images/post_a_job.jpg" height="100px" width="100px"/>


		</div>

		<!-- Location -->
		<div class="widget">
			
			
		</div>

		<!-- Job Type -->
		<div class="widget">
			<h2>Temukan Perkerjaan Anda</h2>

			<ul class="checkboxes">
				<li>
					<img src="images/fb-jobs.png" height="100px" width="100px"/>
					
				</li>
				
			</ul>

		</div>

		


	</div>
	<!-- Widgets / End -->


</div>






<!-- Footer
================================================== -->
<div class="margin-top-15"></div>

<div id="footer">
	

	<!-- Bottom -->
	<div class="container">
		<div class="footer-bottom">
			<div class="sixteen columns">
				<h4>Follow Us</h4>
				<ul class="social-icons">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
				<div class="copyrights">©  Copyright 2017 by <a href="">Mas Hisyam</a>. All Rights Reserved.</div>
			</div>
		</div>
	</div>

</div>

<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="scripts/jquery-2.1.3.min.js"></script>
<script src="scripts/custom.js"></script>
<script src="scripts/jquery.superfish.js"></script>
<script src="scripts/jquery.themepunch.tools.min.js"></script>
<script src="scripts/jquery.themepunch.revolution.min.js"></script>
<script src="scripts/jquery.themepunch.showbizpro.min.js"></script>
<script src="scripts/jquery.flexslider-min.js"></script>
<script src="scripts/chosen.jquery.min.js"></script>
<script src="scripts/jquery.magnific-popup.min.js"></script>
<script src="scripts/waypoints.min.js"></script>
<script src="scripts/jquery.counterup.min.js"></script>
<script src="scripts/jquery.jpanelmenu.js"></script>
<script src="scripts/stacktable.js"></script>
<script src="scripts/headroom.min.js"></script>
<script src="bootstrap/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>





		
		
			
		
	
		
		
	
	
		
</div>


</body>

<!-- Mirrored from www.vasterad.com/themes/workscout/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Jun 2017 06:32:06 GMT -->
</html>