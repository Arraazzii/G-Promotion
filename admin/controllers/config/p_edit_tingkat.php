<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	

		$id 			= mysql_escape_string($_POST['id']);
		$kode_tingkat 	= mysql_escape_string($_POST['kode_tingkat']);
		$nama 			= mysql_escape_string($_POST['tingkat']);
		$desc 			= mysql_escape_string($_POST['desc']);

		$update 		= mysql_query("UPDATE m_tingkat SET 
						kode_tingkat = '$kode_tingkat', nama_tingkat = '$nama', deskripsi = '$desc' WHERE id = '$id' ") or die(mysql_error());

		if ($update) {
					if (isset($_SESSION['admin'])) {
						echo "<script>window.location.href='/adminweb/grade?edit=berhasil'</script>";
					}else{
						echo "<script>window.location.href='/user/grade?edit=berhasil'</script>";
					}
		} else {
			echo "<script>alert('error!'); window.history.back();</script>";
		}

	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>