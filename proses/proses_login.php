<?php

require_once "../conf/koneksi.php";

if(isset($_POST['login'])){
	$username 	= $_POST['username'];
	$password	= $_POST['password'];
	
	$query = mysqli_query($koneksi, "SELECT * FROM tb_alumni WHERE username='$username' AND password='$password'");
	$data = mysqli_num_rows($query);
	if($data> 0){
		$hasil = mysqli_fetch_array($query);
		session_start();
		$_SESSION['id_alumni'] 	= $hasil['id_alumni'];
		$_SESSION['username'] 	= $hasil['username'];
		$_SESSION['level']		= $hasil['level'];
		if($hasil['level'] == 1 || $hasil['level'] == 2){
			?>
				<script type="text/javascript">
					alert('Berhasil Login');
					window.location.href="../?a=beranda";
				</script>
			<?php
		}
	}else{
		?>
			<script type="text/javascript">
				alert('Gagal Login, Username dan Password Salah. Silahkan Login kembali ...');
				window.location.href="../?a=beranda";
			</script>
		<?php
	}
}

?>