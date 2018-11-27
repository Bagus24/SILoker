<?php
    session_start();
    include "config/config.php";

    if (!isset($_SESSION['username'])) {
        header("location:login.php");
    }

    $alert = "";

    if (isset($_POST['submit_add'])) {
        $password = sha1($_POST['username'].$_POST['password']);
        $query_add = mysqli_query($con, "INSERT INTO tb_admin VALUES ('','$_POST[username]','$password','$_POST[nama_lengkap]')");
        if ($query_add == true) {
            $alert = "<div class='alert alert-success'>
                        Berhasil menambahkan admin.
                    </div>";
        } else {
            $alert = "<div class='alert alert-danger'>
                        Gagal menambahkan admin.
                    </div>";
        }
    }

    if (isset($_POST['submit_edit'])) {
        $query_add = mysqli_query($con, "UPDATE tb_admin SET nama_lengkap = '$_POST[nama_lengkap]' WHERE username='$_POST[username]'");
        if ($query_add == true) {
            $alert = "<div class='alert alert-success'>
                        Berhasil mengedit informasi.
                    </div>";
        } else {
            $alert = "<div class='alert alert-danger'>
                        Gagal mengedit informasi.
                    </div>";
        }
    }

    if (isset($_POST['submit_reset'])) {
        $password = sha1($_POST['username'].$_POST['password']);
        $query_add = mysqli_query($con, "UPDATE tb_admin SET password='$password' WHERE username='$_POST[username]'");
        if ($query_add == true) {
            $alert = "<div class='alert alert-success'>
                        Berhasil mereset password.
                    </div>";
        } else {
            $alert = "<div class='alert alert-danger'>
                        Gagal mereset password.
                    </div>";
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | Loker</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">


	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php include "layouts/navbar-admin.php" ?>

	<?php
		include "layouts/sidebar.php";
	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Lowongan Pekerjaan</li>
			</ol>
		</div><!--/.row-->


		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Admin
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
                            <i class="fa fa-plus"></i> Tambah admin
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah admin</h5>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <h5>Username</h5>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <h5>Nama Lengkap</h5>
                                                <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="form-group">
                                                <h5>Password</h5>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                             <button type="submit" class="btn btn-primary" name="submit_add">Simpan</button>
                                        </div>
                                    </form>
                                 </div>
                             </div>
                        </div>

						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel panel-default">
						<div class="panel-body">
                            <?php echo $alert ?>
							<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						        <thead>
						            <tr>
										<th>No.</th>
                                        <th>Nama Lengkap</th>
						                <th>Username</th>
						                <th>Aksi</th>
						            </tr>
						        </thead>
						        <tbody>
									<?php
										$query = mysqli_query($con, "SELECT * FROM tb_admin");
										$i = 0;
										while ($data = mysqli_fetch_array($query)) {
										$i++;
									?>
						            <tr>
										<td><?php echo $i; ?></td>
                                        <td><?php echo $data['nama_lengkap']; ?></td>
                                        <td><?php echo $data['username']; ?></td>
										<td>
											<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" title="Edit" data-target="#editModal<?php echo $data['id'] ?>">
                                                <i class="fa fa-pencil"></i>
                                            </button>

                                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" title="Reset" data-target="#resetModal<?php echo $data['id'] ?>">
                                                <i class="fa fa-eraser"></i>
                                            </button>

                                            <button type="button" name="submit_del" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </button>

										</td>
						            </tr>

                                    <?php include "layouts/modal.php" ?>

                                    <?php
										}
									?>
						        </tbody>
						    </table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/js/chart.min.js"></script>
	<script src="assets/js/chart-data.js"></script>
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	<script src="assets/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/custom.js"></script>
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
		} );
	</script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>

</body>
</html>
