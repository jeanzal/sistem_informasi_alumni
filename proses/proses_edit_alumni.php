<?php

require_once "../conf/koneksi.php";

if(isset($_POST['edit'])){
	$id_alumni 		= $_POST['id_alumni'];
	$nama_alumni 	= $_POST['nama_alumni'];
	$jenkel			= $_POST['jenkel'];
	$id_jurusan		= $_POST['id_jurusan'];
	$id_angkatan	= $_POST['id_angkatan'];
	$asal			= $_POST['asal'];
	$level			= $_POST['level'];
	$username		= $_POST['username'];
	$password		= $_POST['password'];

	$query = "UPDATE tb_alumni set id_alumni='$id_alumni', nama_alumni='$nama_alumni', jenkel='$jenkel', id_jurusan='$id_jurusan', id_angkatan=
				'$id_angkatan', asal='$asal', level='$level', username='$username', password='$password' WHERE id_alumni='$id_alumni' ";
	$hasil = mysqli_query($koneksi, $query);
	if($hasil){
		?>
			<script type="text/javascript">
				alert('Data berhasil di edit');
				window.location.href="..?a=data_alumni";
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				alert('Gagal mengedit data');
				window.location.href="..?a=data_alumni";
			</script>
		<?php
	}
}

?>