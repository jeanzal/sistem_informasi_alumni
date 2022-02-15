<?php

require_once "../conf/koneksi.php";

if(isset($_POST['tambah'])){
	$nama		= $_POST['nama_alumni'];
	$jenkel		= $_POST['jenkel'];
	$jurusan	= $_POST['id_jurusan'];
	$angkatan	= $_POST['id_angkatan'];
	$asal		= $_POST['asal'];
	$level		= $_POST['level'];
	$username	= $_POST['username'];
	$password	= $_POST['password'];

	$query = "INSERT INTO tb_alumni (nama_alumni, jenkel, id_jurusan, id_angkatan, asal, level, username, password) VALUES ('$nama', '$jenkel', '$jurusan', '$angkatan', '$asal', '$level', '$username', '$password')";
	$hasil = mysqli_query($koneksi, $query);
	if($hasil){
		?>
			<script type="text/javascript">
				alert('Data berhasil di tambah');
				window.location.href="../?a=data_alumni";
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				alert('Gagal Menambah Data!');
				window.location.href="../?a=data_alumni";
			</script>
		<?php
	}
}

?>
