<?php

require_once "../conf/koneksi.php";

if(isset($_POST['komen'])){
	$nama 		= $_POST['nama'];
	$komentar	= $_POST['komentar'];
	$query = "INSERT INTO tb_komentar (nama, komentar) VALUES ('$nama','$komentar')";
	$hasil = mysqli_query($koneksi, $query);
	if($hasil){
		?>
			<script type="text/javascript">
				alert('Terimakasih sudah berkomntar');
				window.location.href="../?a=tentang";
			</script>
		<?php
	}
}else{
		?>
			<script type="text/javascript">
				alert('Data memberi komentar.');
				window.location.href="../?a=tentang";
			</script>
		<?php
	}

?>