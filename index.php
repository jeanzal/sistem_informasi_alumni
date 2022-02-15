<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Alumni UKRIM | 2020</title>
	<link rel="icon" href="img/logo_ukrim.png">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>

	<div class="halaman">
		<div class="header">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
				<div class="navbar-brand">
					<img src="img/logo_ukrim.png" width="60px">
				</div>
				<div class="navbar-brand">
					<div class="teks">
						SISTEM INFORMASI ALUMNI<br>
						<small><a href="http://ukrim.ac.id" target="_blank">Universitas Kristen Immanuel Yogyakarta</a></small>
					</div>
				</div>
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto menu">
						<?php
							if(isset($_SESSION['id_alumni'])){
								if($_SESSION['level'] == 1){ ?>
									<li class="nav-item "><a class="nav-link" href="?a=beranda"><span data-feather="home"></span> Beranda</a></li>
									<li class="nav-item"><a class="nav-link" href="?a=data_alumni"><span data-feather="users"></span> Data Alumni</a></li>
									<li class="nav-item"><a class="nav-link" href="?a=tentang"><span data-feather="help-circle"></span> Tentang</a></li>
									<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#logout"><span data-feather="log-out" ></span> Logout</a></li>
						<?php }
								if($_SESSION['level'] == 2){ ?>
									<li class="nav-item "><a class="nav-link" href="?a=beranda"><span data-feather="home"></span> Beranda</a></li>
									<li class="nav-item"><a class="nav-link" href="?a=data_alumni"><span data-feather="users"></span> Data Alumni</a></li>
									<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#logout"><span data-feather="log-out" ></span> Logout</a></li>
						<?php }}else{ ?>
									<li class="nav-item "><a class="nav-link" href="?a=beranda"><span data-feather="home"></span> Beranda</a></li>
									<li class="nav-item"><a class="nav-link" href="?a=data_alumni"><span data-feather="users"></span> Data Alumni</a></li>
									<li class="nav-item"><a class="nav-link" href="?a=tentang"><span data-feather="help-circle"></span> Tentang</a></li>
									<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal"><span data-feather="log-in" ></span> Login</a></li>
						<?php } ?>
					</ul>
				</div>
			</nav>
		</div>
		<div class="isi">
			<?php require_once "isi/page.php"; ?>
		</div>
	</div>


	<!-- Modal Login -->

	<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form action="proses/proses_login.php" method="post">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Login</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Username" required autocomplete="off">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="lihat">
							<label class="form-check-label">Lihat Password</label>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
						<button type="submit" name="login" class="btn btn-success"><span data-feather="log-in"></span> Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- End Modal Login -->

	<!-- Modal Logout -->

	<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Apakah yakin keluar ?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<div class="modal-body text-center">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
					<a href="?a=logout" class="btn btn-danger"><span data-feather="log-out"></span> Keluar</a>
				</div>
			</div>
		</div>
	</div>

	<!-- End Modal Logout -->

	<script src="js/jquery.js"></script> 
	<script src="js/function.js"></script> 
	<script src="js/popper.js"></script> 
	<script src="js/bootstrap.js"></script>
	<script src="js/feather.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap4.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#lihat').click(function(){
    			if($(this).is(':checked')){
    				$('#password').attr('type', 'text');
    			}else{
    				$('#password').attr('type', 'password');
    			}
    		});
    	});
    </script>
    <script type="text/javascript">
    	Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
		Chart.defaults.global.defaultFontColor = '#292b2c';
		var ctx = document.getElementById("jenkel");
		var myPieChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Laki laki","Perempuan"],
				datasets: [{
					label: '',
					data: [
						<?php 
							include 'conf/koneksi.php';
							$query ="SELECT SUM(IF(jenkel='Laki-laki',1,0)) AS jumlah_pria, SUM(IF(jenkel='Perempuan',1,0)) AS jumlah_perempuan FROM tb_alumni";
							$tampil = mysqli_query($koneksi, $query);
							$tampilkan=mysqli_fetch_array($tampil);
							echo $tampilkan['jumlah_pria']; 
						?>, 
							<?php echo $tampilkan['jumlah_perempuan']; 
						?>
					],
					backgroundColor: ['#007bff', '#dc3545', 'green'],
				}],
			},
		});
		Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
		Chart.defaults.global.defaultFontColor = '#292b2c';
		var ctx = document.getElementById("jurusan");
		var myPieChart = new Chart(ctx, {
			type: 'pie',
			data: {
				datasets: [{
					label: '',
					data: [
						<?php 
							include 'conf/koneksi.php';
							$query ="SELECT SUM(IF(jurusan='Teknik Sipil',1,0)) AS jumlah_ts, 
											SUM(IF(jurusan='Informatika',1,0)) AS jumlah_in,
											SUM(IF(jurusan='Ekonomi Manajemen',1,0)) AS jumlah_ek,
											SUM(IF(jurusan='Fisika',1,0)) AS jumlah_fis,
											SUM(IF(jurusan='Akutansi',1,0)) AS jumlah_akn,
											SUM(IF(jurusan='Farmasi',1,0)) AS jumlah_far,
											SUM(IF(jurusan='Musik Gereja',1,0)) AS jumlah_mg,
											SUM(IF(jurusan='PAK',1,0)) AS jumlah_pak
											FROM tb_alumni JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_alumni.id_jurusan";
							$tampil = mysqli_query($koneksi, $query);
							$tampilkan=mysqli_fetch_array($tampil);
							$orang = "Orang";
							echo $tampilkan['jumlah_ts']; 
						?>, 
							<?php echo $tampilkan['jumlah_in']; 
						?>,
							<?php echo $tampilkan['jumlah_ek']; 
						?>,
							<?php echo $tampilkan['jumlah_fis']; 
						?>,
							<?php echo $tampilkan['jumlah_akn']; 
						?>, 
							<?php echo $tampilkan['jumlah_far']; 
						?>, 
							<?php echo $tampilkan['jumlah_mg']; 
						?>,
							<?php echo $tampilkan['jumlah_pak']; 
						?>
					],
					backgroundColor: ['#DAA520', 'red', 'green', '#00FFFF', '#FFE4C4', '#0000FF', '#5F9EA0', '#4B0082'],
				}],
				labels: ["Teknik Sipil","Informatika", "Ekonomi Manajemen", "Fisika","Akutansi", "Farmasi", "Musik Gereja", "PAK"],
			},
		});
    </script>
    <script>
	    $(document).ready(function(){
	        $('#tabel-data').DataTable({
	        	"lengthMenu": [[6, 20, 50, -1], [6, 20, 50, "All"]]
	        });
	    });
	</script>
</body>
</html>