<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	

		$id 		= mysql_escape_string($_POST['id']);
		$kode_unit 	= mysql_escape_string($_POST['kode_unit']);
		$nama 		= mysql_escape_string($_POST['nama_unit']);
		$desc 		= mysql_escape_string($_POST['desc']);

		$update 	= mysql_query("UPDATE m_unit SET 
					kode_unit = '$kode_unit', nama_unit = '$nama', deskripsi = '$desc' WHERE id = '$id' ") or die(mysql_error());

		if ($update) {
					if (isset($_SESSION['admin'])) {
						echo "<script>window.location.href='/adminweb/unit?edit=berhasil'</script>";
					}else{
						echo "<script>window.location.href='/user/unit?edit=berhasil'</script>";
					}
		} else {
			echo "<script>alert('error!'); window.history.back();</script>";
		}

	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>