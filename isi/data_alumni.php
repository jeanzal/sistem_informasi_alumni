<div class="alumni">
	<div class="table-wrapper">
		<div class="table-title">
			<h4>
				<b>Data Alumni</b>
				<?php
					if(isset($_SESSION['id_alumni'])){
						if($_SESSION['level'] == 1){ ?>
							<button class="btn btn-danger btn-sm float-right" href="#" data-toggle="modal" data-target="#tambah_alumni"><span data-feather="plus-circle" ></span> Tambah</button>
				<?php }} ?>
			</h4><br>
		</div>

		<table class="table table-striped table-bordered table-responsive-sm" id="tabel-data">
			<thead style="text-align: center;">
				<tr>			
					<th>No</th>
					<th>Nama Alumni</th>
					<th>Jenis Kelamin</th>
					<th>Jurusan</th>
					<th>Angkatan</th>
					<th>Asal Daerah</th>
					<th><span data-feather="check-square"></span> Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require_once "conf/koneksi.php";
					if(isset($_SESSION['id_alumni'])){
						if($_SESSION['level'] == 1){ 
							$no = 1;
							$query = "SELECT * FROM tb_alumni 
										JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_alumni.id_jurusan 
										JOIN tb_angkatan ON tb_angkatan.id_angkatan = tb_alumni.id_angkatan ORDER BY id_alumni DESC";
							$hasil = mysqli_query($koneksi, $query);
							if(mysqli_num_rows($hasil) > 0){
								while($data = mysqli_fetch_assoc($hasil)){ ?>
									<tr>				
										<td><?= $no++ ?></td>
										<td><?= $data['nama_alumni']; ?></td>
										<td><?= $data['jenkel']; ?></td>
										<td><?= $data['jurusan']; ?></td>
										<td><?= $data['angkatan']; ?></td>
										<td><?= $data['asal']; ?></td>
										<td style="text-align: center;">
											<a href="#" data-toggle="modal" data-target="#detail<?= $data['id_alumni'] ?>"><span data-feather="help-circle" ></span></a>
											<a href="#" data-toggle="modal" data-target="#edit_alumni<?= $data['id_alumni'] ?>"><span data-feather="edit" ></span></a>
											<a href="#" data-toggle="modal" data-target="#hapus_alumni<?= $data['id_alumni'] ?>" ><span data-feather="trash-2" ></span></a>
										</td>
									</tr>
									<!-- Modal Detail  -->

									<div class="modal fade" id="detail<?= $data['id_alumni'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<?php
														$id 	= $data['id_alumni'];
														$link = "SELECT * FROM tb_alumni JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_alumni.id_jurusan JOIN tb_angkatan ON tb_angkatan.id_angkatan = tb_alumni.id_angkatan WHERE id_alumni='$id'";
														$det = mysqli_query($koneksi, $link);
														if(mysqli_num_rows($det) > 0){
															while($detail = mysqli_fetch_assoc($det)){ ?>
													
													<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="card mb-3" style="width: 100%;">
														<div class="row no-gutters">
															<div class="col-md-4">
																<img src="img/logo_ukrim.png" class="card-img detail-foto" alt="...">
															</div>
															<div class="col-md-8">
																<div class="card-body">
																	<h5 class="card-title"><?= $detail['nama_alumni'] ?></h5>
																	<p class="card-text">
																		<div class="kotak-detail">
																			<label>Nama</label>
																			<label>: <b> <?= $detail['nama_alumni'] ?> </b></label><br>
																			<label>Jenis Kelamin</label>
																			<label>: <?= $detail['jenkel'] ?></label><br>
																			<label>Jurusan</label>
																			<label>: <?= $detail['jurusan'] ?></label><br>
																			<label>Angkatan</label>
																			<label>: <?= $detail['angkatan'] ?></label><br>
																			<label>Asal Daerah</label>
																			<label>: <?= $detail['asal'] ?></label><br>
																			<label>Level</label>
																			<label>: <?= $detail['level'] ?></label><br>
																			<label>Username</label>
																			<label>: <?= $detail['username'] ?></label><br>
																			<label>Password</label>
																			<label>: <?= $detail['password'] ?></label><br>
																		</div>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php }} ?>
												<div class="modal-body text-right">
													<button type="button" class="btn btn-dark" data-dismiss="modal">Keluar</button>
												</div>
											</div>
										</div>
									</div>

									<!-- End Modal Detail  -->

									<!-- Modal Edit Alumni  -->

									<div class="modal fade" id="edit_alumni<?= $data['id_alumni'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<?php
												$id 	= $data['id_alumni'];
												$link = "SELECT * FROM tb_alumni JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_alumni.id_jurusan JOIN tb_angkatan ON tb_angkatan.id_angkatan = tb_alumni.id_angkatan WHERE id_alumni='$id'";
												$det = mysqli_query($koneksi, $link);
												if(mysqli_num_rows($det) > 0){
													while($d = mysqli_fetch_assoc($det)){ ?>
														<form action="proses/proses_edit_alumni.php" method="post">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Edit Data Alumni</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="form-group">
																    <input type="hidden" name="id_alumni" value="<?= $d['id_alumni'] ?>">
																    <input type="text" class="form-control" name="nama_alumni" placeholder="Nama Alumni" autocomplete="off" value="<?= $d['nama_alumni'] ?>">
															  	</div>
															  	<div class="form-group">
															  		<label>Jenis Kelamin</label>
															  		<?php $jk = $d['jenkel']; ?>
															  		<select class="form-control" name="jenkel">
															  			<option <?php echo ($jk == 'Laki-laki') ? "selected" : "" ?> >Laki-laki</option>
															  			<option <?php echo ($jk == 'Perempuan') ? "selected" : "" ?> >Perempuan</option>
															  		</select>
															  	</div>
															  	<div class="form-group">
																    <label>Jurusan</label>
																    <select class="form-control" name="id_jurusan">
																    	<option value="<?= $d['id_jurusan'] ?>"><?= $d['jurusan'] ?></option>
																    	<?php
																    		require_once "conf/koneksi.php";
																    		$quer1 = "SELECT * FROM tb_jurusan";
																			$hasi2 = mysqli_query($koneksi, $quer1);
																			if(mysqli_num_rows($hasi2) > 0){
																			while($dat1 = mysqli_fetch_assoc($hasi2)){ ?>
																    	?>
																    		<option value="<?= $dat1['id_jurusan'] ?>"><?= $dat1['jurusan'] ?></option>
																    	<?php }}?>
																    </select>
															  	</div>
															  	<div class="form-group">
																    <label>Angkatan</label>
																    <select class="form-control" name="id_angkatan">
																    	<option value="<?= $d['id_angkatan'] ?>"><?= $d['angkatan'] ?></option>
																    	<?php
																    		require_once "conf/koneksi.php";
																    		$quer2 = "SELECT * FROM tb_angkatan";
																			$hasi3 = mysqli_query($koneksi, $quer2);
																			if(mysqli_num_rows($hasi3) > 0){
																			while($dat2 = mysqli_fetch_assoc($hasi3)){ ?>
																    	?>
																    		<option value="<?= $dat2['id_angkatan'] ?>"><?= $dat2['angkatan'] ?></option>
																    	<?php }}?>
																    </select>
															  	</div>
															  	<div class="form-group">
																    <input type="text" class="form-control" name="asal" placeholder="Asal Daerah" autocomplete="off" value="<?= $d['asal'] ?>">
																    <input type="hidden" class="form-control" name="level" value="2">
															  	</div>
															  	<div class="form-group">
																    <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required value="<?= $d['username'] ?>">
															  	</div>
															  	<div class="form-group">
																    <input type="password" id="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required value="<?= $d['password'] ?>">
															  	</div>
															  	<div class="form-check">
																	<input type="checkbox" class="form-check-input" id="lihat">
																	<label class="form-check-label">Lihat Password</label>
																</div>
															</div>
															<div class="modal-body text-right">
																<button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Batal</button>
																<button type="submit" name="edit" class="btn btn-warning btn-sm" ><span data-feather="edit" ></span> Edit</button>
															</div>
														</form>
												<?php }} ?>
											</div>
										</div>
									</div>

									<!-- End Modal Edit Alumni -->

									<!-- Modal Hapus Alumni -->

									<div class="modal fade" id="hapus_alumni<?= $data['id_alumni'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Apakah yakin data dihapus ?</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
												<div class="modal-body text-center">
													<button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
													<a href="?a=hapus_alumni&id=<?= $data['id_alumni'] ?>" class="btn btn-warning"><span data-feather="trash-2"></span>Hapus</a>
												</div>
											</div>
										</div>
									</div>

									<!-- End Modal Hapus Alumni -->


				<?php }}} 
						if($_SESSION['level'] == 2){
							$id_alumni = $_SESSION['id_alumni'];
							$no = 1;
							$query = "SELECT * FROM tb_alumni 
										JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_alumni.id_jurusan 
										JOIN tb_angkatan ON tb_angkatan.id_angkatan = tb_alumni.id_angkatan 
										WHERE id_alumni='$id_alumni'";
							$hasil = mysqli_query($koneksi, $query);
							if(mysqli_num_rows($hasil) > 0){
								while($data = mysqli_fetch_assoc($hasil)){ ?>
									<tr>				
										<td><?= $no ?></td>
										<td><?= $data['nama_alumni']; ?></td>
										<td><?= $data['jenkel']; ?></td>
										<td><?= $data['jurusan']; ?></td>
										<td><?= $data['angkatan']; ?></td>
										<td><?= $data['asal']; ?></td>
										<td style="text-align: center;">
											<a href="#" data-toggle="modal" data-target="#detail<?= $data['id_alumni'] ?>"><span data-feather="help-circle" ></span></a>
											<a href="#" data-toggle="modal" data-target="#edit_alumni<?= $data['id_alumni'] ?>"><span data-feather="edit"></span></a>
										</td>
									</tr>

									<!-- Modal Detail  -->

									<div class="modal fade" id="detail<?= $data['id_alumni'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<?php
														$id 	= $data['id_alumni'];
														$link = "SELECT * FROM tb_alumni JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_alumni.id_jurusan JOIN tb_angkatan ON tb_angkatan.id_angkatan = tb_alumni.id_angkatan WHERE id_alumni='$id'";
														$det = mysqli_query($koneksi, $link);
														if(mysqli_num_rows($det) > 0){
															while($detail = mysqli_fetch_assoc($det)){ ?>
													
													<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="card mb-3" style="width: 100%;">
														<div class="row no-gutters">
															<div class="col-md-4">
																<img src="img/logo_ukrim.png" class="card-img detail-foto" alt="...">
															</div>
															<div class="col-md-8">
																<div class="card-body">
																	<h5 class="card-title"><?= $detail['nama_alumni'] ?></h5>
																	<p class="card-text">
																		<div class="kotak-detail">
																			<label>Nama</label>
																			<label>: <b> <?= $detail['nama_alumni'] ?> </b></label><br>
																			<label>Jenis Kelamin</label>
																			<label>: <?= $detail['jenkel'] ?></label><br>
																			<label>Jurusan</label>
																			<label>: <?= $detail['jurusan'] ?></label><br>
																			<label>Angkatan</label>
																			<label>: <?= $detail['angkatan'] ?></label><br>
																			<label>Asal Daerah</label>
																			<label>: <?= $detail['asal'] ?></label><br>
																			<label>Username</label>
																			<label>: <?= $detail['username'] ?></label><br>
																			<label>Password</label>
																			<label>: <?= $detail['password'] ?></label><br>
																		</div>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php }} ?>
												<div class="modal-body text-right">
													<button type="button" class="btn btn-dark" data-dismiss="modal">Keluar</button>
												</div>
											</div>
										</div>
									</div>

									<!-- End Modal Detail  -->

									<!-- Modal Edit Alumni  -->

									<div class="modal fade" id="edit_alumni<?= $data['id_alumni'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<?php
												$id 	= $data['id_alumni'];
												$link = "SELECT * FROM tb_alumni JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_alumni.id_jurusan JOIN tb_angkatan ON tb_angkatan.id_angkatan = tb_alumni.id_angkatan WHERE id_alumni='$id'";
												$det = mysqli_query($koneksi, $link);
												if(mysqli_num_rows($det) > 0){
													while($d = mysqli_fetch_assoc($det)){ ?>
														<form action="proses/proses_edit_alumni.php" method="post">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Edit Data Alumni</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="form-group">
																    <input type="hidden" name="id_alumni" value="<?= $d['id_alumni'] ?>">
																    <input type="text" class="form-control" name="nama_alumni" placeholder="Nama Alumni" autocomplete="off" value="<?= $d['nama_alumni'] ?>">
															  	</div>
															  	<div class="form-group">
															  		<label>Jenis Kelamin</label>
															  		<?php $jk = $d['jenkel']; ?>
															  		<select class="form-control" name="jenkel">
															  			<option <?php echo ($jk == 'Laki-laki') ? "selected" : "" ?> >Laki-laki</option>
															  			<option <?php echo ($jk == 'Perempuan') ? "selected" : "" ?> >Perempuan</option>
															  		</select>
															  	</div>
															  	<div class="form-group">
																    <label>Jurusan</label>
																    <select class="form-control" name="id_jurusan">
																    	<option value="<?= $d['id_jurusan'] ?>"><?= $d['jurusan'] ?></option>
																    	<?php
																    		require_once "conf/koneksi.php";
																    		$query1 = "SELECT * FROM tb_jurusan";
																			$hasil2 = mysqli_query($koneksi, $query1);
																			if(mysqli_num_rows($hasil2) > 0){
																			while($data1 = mysqli_fetch_assoc($hasil2)){ ?>
																    	?>
																    		<option value="<?= $data1['id_jurusan'] ?>"><?= $data1['jurusan'] ?></option>
																    	<?php }}?>
																    </select>
															  	</div>
															  	<div class="form-group">
																    <label>Angkatan</label>
																    <select class="form-control" name="id_angkatan">
																    	<option value="<?= $d['id_angkatan'] ?>"><?= $d['angkatan'] ?></option>
																    	<?php
																    		require_once "conf/koneksi.php";
																    		$query2 = "SELECT * FROM tb_angkatan";
																			$hasil3 = mysqli_query($koneksi, $query2);
																			if(mysqli_num_rows($hasil3) > 0){
																			while($data2 = mysqli_fetch_assoc($hasil3)){ ?>
																    	?>
																    		<option value="<?= $data2['id_angkatan'] ?>"><?= $data2['angkatan'] ?></option>
																    	<?php }}?>
																    </select>
															  	</div>
															  	<div class="form-group">
																    <input type="text" class="form-control" name="asal" placeholder="Asal Daerah" autocomplete="off" value="<?= $d['asal'] ?>">
																    <input type="hidden" class="form-control" name="level" value="2">
															  	</div>
															  	<div class="form-group">
																    <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required value="<?= $d['username'] ?>">
															  	</div>
															  	<div class="form-group">
																    <input type="password" id="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required value="<?= $d['password'] ?>">
															  	</div>
															  	<div class="form-check">
																	<input type="checkbox" class="form-check-input" id="lihat">
																	<label class="form-check-label">Lihat Password</label>
																</div>
															</div>
															<div class="modal-body text-right">
																<button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Batal</button>
																<button type="submit" name="edit" class="btn btn-warning btn-sm" ><span data-feather="edit" ></span> Edit</button>
															</div>
														</form>
												<?php }} ?>
											</div>
										</div>
									</div>

									<!-- End Modal Edit Alumni -->

				<?php }}}}else{ 
							$no = 1;
							$query = "SELECT * FROM tb_alumni JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_alumni.id_jurusan JOIN tb_angkatan ON tb_angkatan.id_angkatan = tb_alumni.id_angkatan ORDER BY id_alumni DESC";
							$hasil = mysqli_query($koneksi, $query);
							if(mysqli_num_rows($hasil) > 0){
								while($data = mysqli_fetch_assoc($hasil)){ ?>
									<tr>				
										<td><?= $no++ ?></td>
										<td><?= $data['nama_alumni']; ?></td>
										<td><?= $data['jenkel']; ?></td>
										<td><?= $data['jurusan']; ?></td>
										<td><?= $data['angkatan']; ?></td>
										<td><?= $data['asal']; ?></td>
										<td style="text-align: center;">
											<a href="#" data-toggle="modal" data-target="#detail<?= $data['id_alumni'] ?>"><span data-feather="help-circle" ></span></a>
										</td>
									</tr>

									<!-- Modal Detail  -->

									<div class="modal fade" id="detail<?= $data['id_alumni'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<?php
														$id 	= $data['id_alumni'];
														$link = "SELECT * FROM tb_alumni JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_alumni.id_jurusan JOIN tb_angkatan ON tb_angkatan.id_angkatan = tb_alumni.id_angkatan WHERE id_alumni='$id'";
														$det = mysqli_query($koneksi, $link);
														if(mysqli_num_rows($det) > 0){
															while($detail = mysqli_fetch_assoc($det)){ ?>
													
													<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="card mb-3" style="width: 100%;">
														<div class="row no-gutters">
															<div class="col-md-4">
																<img src="img/logo_ukrim.png" class="card-img detail-foto" alt="...">
															</div>
															<div class="col-md-8">
																<div class="card-body">
																	<h5 class="card-title"><?= $detail['nama_alumni'] ?></h5>
																	<p class="card-text">
																		<div class="kotak-detail">
																			<label>Nama</label>
																			<label>: <b> <?= $detail['nama_alumni'] ?> </b></label><br>
																			<label>Jenis Kelamin</label>
																			<label>: <?= $detail['jenkel'] ?></label><br>
																			<label>Jurusan</label>
																			<label>: <?= $detail['jurusan'] ?></label><br>
																			<label>Angkatan</label>
																			<label>: <?= $detail['angkatan'] ?></label><br>
																			<label>Asal Daerah</label>
																			<label>: <?= $detail['asal'] ?></label><br>
																		</div>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php }} ?>
												<div class="modal-body text-right">
													<button type="button" class="btn btn-dark" data-dismiss="modal">Keluar</button>
												</div>
											</div>
										</div>
									</div>

									<!-- End Modal Detail  -->
				<?php }}} ?>
			</tbody>
		</table>
	</div>
</div>



<!-- Modal Tambah Alumni -->

<div class="modal fade" id="tambah_alumni" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form action="proses/proses_tambah_alumni.php" method="post">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data Alumni</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
					    <input type="text" class="form-control" name="nama_alumni" placeholder="Nama Alumni" autocomplete="off">
				  	</div>
				  	<div class="form-group">
					    <label>Jenis Kelamin</label>
					    <select class="form-control" name="jenkel">
					    	<option>--Pilih--</option>
					    	<option>Laki-laki</option>
					    	<option>Perempuan</option>
					    </select>
				  	</div>
				  	<div class="form-group">
					    <label>Jurusan</label>
					    <select class="form-control" name="id_jurusan">
					    	<option>--Pilih--</option>
					    	<?php
					    		require_once "conf/koneksi.php";
					    		$query = "SELECT * FROM tb_jurusan";
								$hasil = mysqli_query($koneksi, $query);
								if(mysqli_num_rows($hasil) > 0){
								while($data = mysqli_fetch_assoc($hasil)){ ?>
					    	?>
					    		<option value="<?= $data['id_jurusan'] ?>"><?= $data['jurusan'] ?></option>
					    	<?php }}?>
					    </select>
				  	</div>
				  	<div class="form-group">
					    <label>Angkatan</label>
					    <select class="form-control" name="id_angkatan">
					    	<option>--Pilih--</option>
					    	<?php
					    		require_once "conf/koneksi.php";
					    		$query = "SELECT * FROM tb_angkatan";
								$hasil = mysqli_query($koneksi, $query);
								if(mysqli_num_rows($hasil) > 0){
								while($data = mysqli_fetch_assoc($hasil)){ ?>
					    	?>
					    		<option value="<?= $data['id_angkatan'] ?>"><?= $data['angkatan'] ?></option>
					    	<?php }}?>
					    </select>
				  	</div>
				  	<div class="form-group">
					    <input type="text" class="form-control" name="asal" placeholder="Asal Daerah" autocomplete="off">
					    <input type="hidden" class="form-control" name="level" value="2">
				  	</div>
				  	<div class="form-group">
					    <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
				  	</div>
				  	<div class="form-group">
					    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
				  	</div>
				</div>
				<div class="modal-body text-right">
					<button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Batal</button>
					<button class="btn btn-primary btn-sm" type="submit" name="tambah"><span data-feather="plus-circle"></span> Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- End Modal Tambah Alumni-->