<?php 
	require '../../../_database/koneksi.php';
	$kode = $_POST['kode'];
	$status = $_POST['status'];
	if ($status == 1 ) {
		mysql_query("UPDATE user SET status = '1' WHERE kode_user ='$kode'");
	}else if ($status == 0 ) {
		mysql_query("UPDATE user SET status = '0' WHERE kode_user ='$kode'");
	}else{
		echo "<script>window.history.back();</script>";
	}

?>