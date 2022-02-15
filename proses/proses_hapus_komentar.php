<?php
	
require_once "conf/koneksi.php";

if(isset($_GET['id'])){
	$id = htmlspecialchars($_GET['id']);

	$query = "DELETE FROM tb_komentar WHERE id_komentar='$id'";
	$hasil = mysqli_query($koneksi, $query);
	if($hasil){
		?>
			<script type="text/javascript">
				alert('Komentar berhasil dihapus');
				window.location.href="?a=tentang";
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				alert('Komentar gagal dihapus');
				window.location.href="?a=tentang";
			</script>
		<?php
	}
}

?>