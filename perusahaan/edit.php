<?php
    session_start();
    include "config/config.php";
    $alert="";
    $query_r = mysqli_query($con, "SELECT * FROM posisi WHERE id='$_GET[id]'");
    $data_r = mysqli_fetch_array($query_r);

    if (!isset($_SESSION['username'])) {
        header("location:login.php");
    }
    if (isset($_POST['submit_edit'])) {
        $posisi = $_POST['posisi'];
        $bidang = $_POST['bidang'];
        $highlight = $_POST['highlight'];
        $requirement = $_POST['requirement'];
        $status = $_POST['status'];

        $query_edit = mysqli_query($con, "UPDATE posisi SET nama_posisi='$posisi', highlight_posisi='$highlight', desc_posisi='$requirement', nama_bidang='$bidang', status='$status' WHERE id='$_GET[id]'");
        if ($query_edit==true) {
            header("location:all_vacan.php");
        } else {
            $alert = "<div class='alert alert-danger'>
                        Gagal mengubah informasi lowongan pekerjaan.
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
    <script src="ckeditor/ckeditor.js"></script>
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
						Tambahkan Lowongan Pekerjaan
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel panel-default">
						<div class="panel-body">
                            <?php echo $alert; ?>
                            <form method="post" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi" value="<?php echo $data_r['nama_posisi'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <select class="form-control" name="bidang" required>
                                            <!-- <option>- Pilih Bidang -</option> -->
                                            <?php
                                                $query = mysqli_query($con, "SELECT * FROM bidang");
                                                while ($data=mysqli_fetch_array($query)) {
                                                    if ($data_r['nama_bidang'] == $data['nama_bidang']) {
                                                        $selected = "selected";
                                                    } else {
                                                        $selected = "";
                                                    }
                                                    echo "<option $selected>$data[nama_bidang]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <select class="form-control" name="status" required>
                                            <option>- Pilih Status -</option>
                                            <option>Tersedia</option>
                                            <option>Tidak Tersedia</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label for="">Masukan deskripsi singkat pekerjaan.(140 karakter)</label>
                                        <textarea name="highlight" class="form-control" rows="5" maxlength="140"><?php echo $data_r['highlight_posisi'] ?></textarea>
                                    </div>
                                </div>

                                <!-- <div class="form-group"> -->
                                    <label for="">Masukan persyaratan</label>
                                    <textarea name="requirement" id="text-ckeditor" required><?php echo $data_r['desc_posisi'] ?></textarea>
                                    <script type="text/javascript">
                                    CKEDITOR.replace('text-ckeditor');
                                    </script>
                                <!-- </div> -->

                                <div class="form-group">
                                    <div class="col-sm-9">
                                        <input type="submit" name="submit_edit" class="btn btn-primary" value="Submit" style="margin-top:10px;">
                                    </div>
                                </div>
                            </form>

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
