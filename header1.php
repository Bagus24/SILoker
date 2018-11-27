<?php 
//session_start();
    // $uid=$_SESSION["id"];
    // $sql1="select * from notification where post_usr='$uid'";
    // $re=mysqli_query($con,$sql1);
    // $count=mysqli_num_rows($re);
?>
<ul class="nav navbar-nav navbar-right">
  
<li><a href="notification.php"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Notifikasi </a></li>
 

 <li><a href="logout1.php?logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Keluar</a></li>
 </ul>
 <form class="navbar-form navbar-right" action="search.php" method="post">

                <li class="form-inline" id="homesearch">
					<input type="text" class="form-control" placeholder="Cari pekerjaan anda" id="query" name="search" value="">
					<a type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span><i class="fa fa-search" ></i> Cari</a>
				</li>
				
				
				

 <!-- <div class="input-group" style="margin-right:200px">
 <input type="text" class="form-control" placeholder="Cari pekerjaan anda" id="query" name="search" value="">
 <div class="input-group-btn">
 <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
 </div>
 </div> -->
 </form>
 </div>