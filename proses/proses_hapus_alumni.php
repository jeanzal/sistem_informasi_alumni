<?php

require_once "conf/koneksi.php";

if(isset($_GET['id'])){
	$id 	= htmlspecialchars($_GET['id']);

	$query = "DELETE FROM tb_alumni WHERE id_alumni='$id'";
	$hasil = mysqli_query($koneksi, $query);
	if($hasil){
		?>
			<script type="text/javascript">
				alert('Berhasil Di Hapus');
				window.location.href="?a=data_alumni";
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				alert('Gagal Mengapus Data Alumni');
				window.location.href="?a=data_alumni";
			</script>
		<?php
	}
}

?>