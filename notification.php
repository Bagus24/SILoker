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
<!-- <script>
	function delete_student(id)
	{
		if(confirm("You want to delete comment ?"))
		{
		window.location.href='execution.php?yesdelete='+id;
		}
	}
</script> -->


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
 	     <div class="col-lg-8" >
            <div class="table-responsive" >
  <table class="table table-bordered table-hover table-striped" style="background-color:#FFF">
	<!-- <tr class="active">
	  <th style="text-align:center">No</th>
	  <th style="text-align:center">Sender</th>
	  <th style="text-align:center">Comment</th>
	  <th style="text-align:center">Date</th>
	  <th style="text-align:center">Reply</th>
	  <th style="text-align:center">Delete</th>
	</tr> -->
<?php 


    $uid=$_SESSION["id"];
    $sql1="select * from notification where post_usr='$uid'";
    $re=mysqli_query($con,$sql1);
    $count=mysqli_num_rows($re);
    $i=1;
    while($row=mysqli_fetch_array($re))
    {
        $no_id=$row["noti_id"];
        $po_id=$row["pos_id"];
        $post_user_id=$row["post_usr"];
        $comment_user_id=$row["comm_user"];
        $co=$row["comment"];
        $ti=$row["time"];
        $post_id=$_SESSION["id"];
        echo '<tr class="default">';
           echo '<td style="text-align:center">'.$i.'</td>';
           
		
    $user=mysqli_query($con,"select * from registration where usr_id='".$comment_user_id."'");
		$userRes=mysqli_fetch_array($user);
		
		   echo '<td>'.$userRes['name'].'</td>';
           echo '<td>'.$co.'</td>';
           echo '<td>'.$ti.'</td>';
           echo '<td><form method="post" action="reply.php">
           <input type="hidden" name="comment" value="'.$co.'" />
           <input type="hidden" name="po_id" value="'.$post_id.'" />
           <input type="hidden" name="commenter_id" value="'.$comment_user_id.'" />
           <input type="submit" name="reply" class="btn btn-success" value="Reply"/>
           </form></td>';
           echo '<td><a href="javascript:delete_student('.$no_id.')" class="btn btn-danger">delete</a></td>';
        echo '</tr>'; 
        $i++;  
        
    }
?>

	
  </table>
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