<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {

		$year 		= mysql_escape_string($_POST['year']);
		$a 			= mysql_escape_string($_POST['a']);
		$b 			= mysql_escape_string($_POST['b']);
		$c 			= mysql_escape_string($_POST['c']);
		$d 			= mysql_escape_string($_POST['d']);

		$cek = mysql_query("SELECT tahun FROM m_penilaian WHERE tahun ='$year'");
		if (mysql_num_rows($cek) > 0) {
			echo "<script>alert('Year Already Available!'); window.history.back();</script>";
		}else{
			$insert 		= mysql_query("INSERT INTO m_penilaian VALUES
							(NULL, '$year','$a', '$b', '$c','$d') ") or die(mysql_error());

			if ($insert) {
				if (isset($_SESSION['admin'])) {
					echo "<script>window.location.href='/adminweb/point?input=berhasil'</script>";
				}else{
					echo "<script>window.location.href='/user/point?input=berhasil'</script>";
				}
			} else {
				echo "<script>alert('error!'); window.history.back();</script>";
			}
		}
	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>