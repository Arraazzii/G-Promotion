<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	

		$id 				= mysql_escape_string($_POST['id']);
		$kode_pekerjaan 	= mysql_escape_string($_POST['kode_pekerjaan']);
		$nama 				= mysql_escape_string($_POST['nama_pekerjaan']);
		$desc 				= mysql_escape_string($_POST['desc']);

		$update 			= mysql_query("UPDATE m_pekerjaan SET 
							kode_pekerjaan = '$kode_pekerjaan', nama_pekerjaan = '$nama', deskripsi = '$desc' WHERE id = '$id' ") or die(mysql_error());

		if ($update) {
					if (isset($_SESSION['admin'])) {
						echo "<script>window.location.href='/adminweb/job?edit=berhasil'</script>";
					}else{
						echo "<script>window.location.href='/user/job?edit=berhasil'</script>";
					}
		} else {
			echo "<script>alert('error!'); window.history.back();</script>";
		}

	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>