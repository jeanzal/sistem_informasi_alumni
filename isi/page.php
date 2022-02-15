<?php

if(isset($_GET['a'])){
	switch ($_GET['a']){
		case 'beranda':
		require_once "isi/beranda.php";
		break;
		case 'data_alumni':
		require_once "isi/data_alumni.php";
		break;
		case 'tentang':
		require_once "isi/tentang.php";
		break;
		case 'logout':
		require_once "isi/logout.php";
		break;
		case 'hapus_alumni':
		require_once "proses/proses_hapus_alumni.php";
		break;
		case 'hapus_komentar':
		require_once "proses/proses_hapus_komentar.php";
		break;

	}
}else{
	require_once "isi/beranda.php";
}

?>