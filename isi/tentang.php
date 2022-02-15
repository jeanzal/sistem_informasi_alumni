<div class="tentang">
	<div class="tentang_kiri">
		<h5><b><span data-feather="user"></span> Tentang</b></h5>
		<div class="text">
			<p>
				Sistem Informasi Alumni dibuat untuk mempermudah pencarian data alumni dan melihat data alumni Universitas Kristen Imannuel Yogyakarta.
			</p>	
		</div>
		<h5><b><span data-feather="help-circle"></span> Bantuan</b></h5>
		<div class="text">
			<p>
				Buat Alumni yang mau ingin merubah data diri secara pribadi. Silahkan hubungi admin untuk mendapatkan username dan password. Terimakasih..
			</p>
		</div>
	</div>
	<div class="tentang_kanan">
		<h5><b><span data-feather="message-circle"></span> Komentar</b></h5>
		<div class="text">
			Kami membutuhkan saran dan kritik dari anda. Silahkan berkomentar 
		</div>
		<form action="proses/proses_tambah_komentar.php" method="post" class="kotak-komen">
			<div class="form-group">
				<input type="text" class="form-control" name="nama" placeholder="Nama" required>
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="3" placeholder="Komentar Anda" name="komentar" required></textarea>
			</div>
			<div class="form-group float-right">
				<input type="submit" name="komen" value="Komen" class="btn btn-primary btn-sm">
			</div>
		</form>
	</div>
	<div class="clearr"></div>
	<div class="tentang_kanan">
		<h5><b><span data-feather="message-circle"></span> Daftar Komentar</b></h5>
		<div class="text">
			Daftar Komentar
		</div>
		<div class="daftar-komen">
			<?php
				require_once "conf/koneksi.php";
				$query = "SELECT * FROM tb_komentar ORDER BY id_komentar DESC";
				$hasil = mysqli_query($koneksi, $query);
				if(mysqli_num_rows($hasil) > 0){
					while($data = mysqli_fetch_assoc($hasil)){ ?>
						<div class="komentar">
							<i>
								Nama : <?= $data['nama'] ?>
								<?php
									if(isset($_SESSION['id_alumni'])){
										if($_SESSION['level'] == 1){ ?>
											<a href="?a=hapus_komentar&id=<?= $data['id_komentar'] ?>"><span data-feather="x" class="float-right"></span></a>		
								<?php }}?>
							</i>
							<p><b>Komentar :</b> <br><?= $data['komentar'] ?></p>
						</div>
			<?php }}else{ ?>
						<div class="komentar">
							<i>Daftar Komentar tidak ada</i>
						</div>
			<?php } ?>
		</div>
	</div>

</div>