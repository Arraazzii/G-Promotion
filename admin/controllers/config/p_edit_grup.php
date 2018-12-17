<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	

		$kode_grup 	= mysql_escape_string($_POST['kode_grup']);
		$nama 		= mysql_escape_string($_POST['nama_grup']);
		$desc 		= mysql_escape_string($_POST['desc']);

		$update 	= mysql_query("UPDATE m_grup SET 
					nama_grup = '$nama', deskripsi = '$desc' WHERE kode_grup = '$kode_grup' ") or die(mysql_error());

		if ($update) {
			if (isset($_SESSION['admin'])) {
				echo "<script>window.location.href='/adminweb/group?edit=berhasil'</script>";
			}else{
				echo "<script>window.location.href='/user/group?edit=berhasil'</script>";
			}
		} else {
			echo "<script>alert('error!'); window.history.back();</script>";
		}

	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>