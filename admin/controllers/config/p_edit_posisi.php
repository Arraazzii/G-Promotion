<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	

		$id 			= mysql_escape_string($_POST['id']);
		$kode_posisi 	= mysql_escape_string($_POST['kode_posisi']);
		$nama 			= mysql_escape_string($_POST['posisi']);
		$desc 			= mysql_escape_string($_POST['desc']);
		$level 			= mysql_escape_string($_POST['level']);
		$kode_grade 			= mysql_escape_string($_POST['kode_grade']);

		$update 		= mysql_query("UPDATE m_posisi SET 
						kode_posisi = '$kode_posisi', nama_posisi = '$nama', grade_posisi = '$kode_grade',id_tingkat = '$level', deskripsi = '$desc' WHERE id = '$id' ") or die(mysql_error());

		if ($update) {
					if (isset($_SESSION['admin'])) {
						echo "<script>window.location.href='/adminweb/position?edit=berhasil'</script>";
					}else{
						echo "<script>window.location.href='/user/position?edit=berhasil'</script>";
					}
		} else {
			echo "<script>alert('error!'); window.history.back();</script>";
		}

	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>