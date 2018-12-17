<?php 
	require '../../../_database/koneksi.php';
	$id = $_POST['id'];
	$kode = $_POST['kode'];
	if ($kode == 'area') {
		mysql_query("DELETE FROM m_area WHERE id = '$id' ");
	}elseif ($kode == 'grup') {
		mysql_query("DELETE FROM m_grup WHERE id = '$id' ");
	}else{
		echo "<script>window.history.back();</script>";
	}

?>