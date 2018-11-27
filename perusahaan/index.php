<?php
    session_start();
    include "config/config.php";

    if (!isset($_SESSION['username'])) {
        header("location:login.php");
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
				<li class="active">Applicants</li>
			</ol>
		</div><!--/.row-->


		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Grafik Pelamar
						<?php
							// $query_count = mysqli_query($con,"SELECT id FROM applicants");
							// $count_all = mysqli_num_rows($query_count);

							$query_count_prod = mysqli_query($con,"SELECT id,bidang FROM applicants WHERE bidang='Produk'");
							$count_prod = mysqli_num_rows($query_count_prod);

							$query_count_op = mysqli_query($con,"SELECT id,bidang FROM applicants WHERE bidang='Operasional'");
							$count_op = mysqli_num_rows($query_count_op);

							$query_count_tech = mysqli_query($con,"SELECT id,bidang FROM applicants WHERE bidang='Teknologi'");
							$count_tech = mysqli_num_rows($query_count_tech);

							$count_all = $count_prod+$count_op+$count_tech;

                            if ($count_all == 0) {
                                $prod = 0;
                                $op =0;
                                $tech = 0;
                            } else {
                                $prod = ($count_prod / $count_all)*100;
    							$op = ($count_op / $count_all)*100;
    							$tech = ($count_tech / $count_all)*100;
                            }

						?>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="col-xs-6 col-md-4" style="margin-top:10px;">
							<div class="panel panel-default">
								<div class="panel-body easypiechart-panel">
									<h4>Produk</h4>
									<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo number_format($prod,2) ?>" ><span class="percent"><?php echo number_format($prod,2) ?>%</span></div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-4" style="margin-top:10px;">
							<div class="panel panel-default">
								<div class="panel-body easypiechart-panel">
									<h4>Operasional</h4>
									<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo number_format($op,2) ?>" ><span class="percent"><?php echo number_format($op,2) ?>%</span></div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-4" style="margin-top:10px;">
							<div class="panel panel-default">
								<div class="panel-body easypiechart-panel">
									<h4>Teknologi</h4>
									<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo number_format($tech,2) ?>" ><span class="percent"><?php echo number_format($tech,2) ?>%</span></div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Tabel Pelamar
					    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel panel-default">
						<div class="panel-body">
							<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						        <thead>
						            <tr>
										<th>No.</th>
						                <th>Nama</th>
						                <th>Email</th>
						                <th>No. Handphone</th>
						                <th>Posisi</th>
										<th>Bidang</th>
										<th>Tanggal</th>
						                <th>Aksi</th>
						            </tr>
						        </thead>
						        <tbody>
									<?php
										$query = mysqli_query($con, "SELECT * FROM applicants");
										$i = 0;
										while ($data = mysqli_fetch_array($query)) {
										$i++;
									?>
						            <tr>
										<td><?php echo $i; ?></td>
						                <td><?php echo $data['nama_lengkap']; ?></td>
						                <td><?php echo $data['email']; ?></td>
						                <td><?php echo $data['no_hp']; ?></td>
						                <td><?php echo $data['posisi']; ?></td>
										<td><?php echo $data['bidang']; ?></td>
						                <td><?php echo $data['created_at']; ?></td>
										<td>
                                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" title="Lihat" data-target="#lookApplyModal<?php echo $data['id'] ?>">
                                                <i class="fa fa-eye"></i>
                                            </button>
											<a href="del.php?a_id=<?php echo  $data['id'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus pelamar ini?');"><i class="fa fa-trash"></i></a>

										</td>
						            </tr>
									<?php
                                    include "layouts/modal.php";
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
