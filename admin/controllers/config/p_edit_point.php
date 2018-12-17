<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	
		$id 		= mysql_escape_string($_POST['id']);
		$year 		= mysql_escape_string($_POST['year']);
		$a 			= mysql_escape_string($_POST['a']);
		$b 			= mysql_escape_string($_POST['b']);
		$c 			= mysql_escape_string($_POST['c']);
		$d 			= mysql_escape_string($_POST['d']);


		$update 		= mysql_query("UPDATE m_penilaian SET 
						tahun = '$year', a = '$a', b = '$b', c = '$c', d = '$d' WHERE id = '$id' ") or die(mysql_error());

		if ($update) {
					if (isset($_SESSION['admin'])) {
						echo "<script>window.location.href='/adminweb/point?edit=berhasil'</script>";
					}else{
						echo "<script>window.location.href='/user/point?edit=berhasil'</script>";
					}
		} else {
			echo "<script>alert('error!'); window.history.back();</script>";
		}

	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>