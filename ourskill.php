<?php 
    include("dbconfig.php");
?>
<?php
  session_start();

  if($_SESSION['name']=='')
  {
     header('location:reg.php');
  }

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
     	echo '<script>alert("Berhasil post !");</script>';
     }
  }

if(isset($_POST["update"])) {
	# code...

$skill=$_POST["skill"];
$experience=$_POST["experience"];
$last_education=$_POST["last_education"];

mysqli_query($con,"UPDATE REGISTRATION SET skill='".$skill."',experience='".$experience."',last_education='".$last_education."' where name='".$_SESSION['name']."'");



}

?>
<?php
function timeAgo($time_ago){

			$time_ago = strtotime($time_ago);
			$cur_time   = time();
			$time_elapsed   = $cur_time - $time_ago;
			$seconds    = $time_elapsed ;
			$minutes    = round($time_elapsed / 60 );
			$hours      = round($time_elapsed / 3600);
			$days       = round($time_elapsed / 86400 );
			$weeks      = round($time_elapsed / 604800);
			$months     = round($time_elapsed / 2600640 );
			$years      = round($time_elapsed / 31207680 );
			// Seconds
			if($seconds <= 60){
			    return "baru saja";
			}
			//Minutes
			else if($minutes <=60){
			    if($minutes==1){
			        return "1 menit yang lalu";
			    }
			    else{
			        return "$minutes menit yang lalu";
			    }
			}
			//Hours
			else if($hours <=24){
			    if($hours==1){
			        return "1 jam yang lalu";
			    }else{
			        return "$hours jam yang lalu";
			    }
			}
			//Days
			else if($days <= 7){
			    if($days==1){
			        return "kemarin";
			    }else{
			        return "$days hari yang lalu";
			    }
			}
			//Weeks
			else if($weeks <= 4.3){
			    if($weeks==1){
			        return "1 minggu yang lalu";
			    }else{
			        return "$weeks minggu yang lalu";
			    }
			}
			//Months
			else if($months <=12){
			    if($months==1){
			        return "1 bulan yang lalu";
			    }else{
			        return "$months bulan yang lalu";
			    }
			}
			//Years
			else{
			    if($years==1){
			        return "1 tahun yang lalu";
			    }else{
			        return "$years tahun yang lalu";
			    }
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

 


<!-- line modal -->

 
 
 
 
 
 
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


           <div class="panel panel-default">
           <div class="panel-heading">Profil Saya</div>

<?php

	$sql="SELECT * FROM `registration` WHERE `name`='".$_SESSION['name']."'";
	
	$result = $con->query($sql);
	

			if ($result->num_rows>0)
				 {
			    

			    while($row = $result->fetch_assoc()) 
			    {
			   
			    
           echo "<div class='col-md-4 panel panel-default'>";
           	echo"<img src='perusahaan/user_images/".$row['image']."' style='width:400;height:250px'class='img img-thumbnail'></div>";
           

           echo "<div class='col-md-8 panel panel-default' style='width:300;height:250px'><br/>";

           echo "<label> Nama </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :   ";
		   echo "<label>".$row['name']."</label><br/>";
		   
           echo "<label> Email </label>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :   ";
		   echo "<label>".$row['email']."</label><br/>"; 

		   echo "<label> Tanggal lahir </label>	 :   ";
           echo "<label>".$row['date']."</label><br/>"; 
		   
		   echo "<label> No_Telp </label>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :   ";
		   echo "<label>".$row['no_hp']."</label><br/>"; 
		   
		   echo "<label> Alamat </label>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :   ";
           echo "<label>".$row['address']."</label><br/>"; 


}
}

?>
           </div>




           </div>

					
 	     </div>
     
</div>

<div class="row" style="clear:both">
<div class="col-lg-12">

<div class="col-lg-4">
	</div>


<div class="col-lg-8">
	<div class="panel panel-default">
<?php		
$sql=mysqli_query($con,"select * from registration where name='".$_SESSION['name']."'");

$res=mysqli_fetch_array($sql);



?>		

<form method="post">
<div class="col-lg-10">


           <div class="panel panel-default">
				<div class="panel-heading">Keahlian</div>
			</div>
	<textarea  name="skill" rows='5' cols="99" placeholder="Masukan keahlianmu" ><?php echo $res['skill']; ?></textarea>
<BR/><BR>
<div class="panel panel-default">
				<div class="panel-heading">Pengalaman kerja</div>
			</div>
	<textarea  name="experience" rows='5' cols="99" placeholder="Masukan pengalaman kerja mu" ><?php echo $res['experience']; ?></textarea>
<BR/><BR>

<div class="panel panel-default">
				<div class="panel-heading">Pendidikan terakhir</div>
			</div>
	<textarea  name="last_education" rows='5' cols="99" placeholder="Masukan pendidikan terakhir" ><?php echo $res['last_education']; ?></textarea>
<BR/><BR>


<input type="submit" name="update" class="btn btn-default" value="Simpan">
</div>
</div>
</div>
</div>
</form>


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