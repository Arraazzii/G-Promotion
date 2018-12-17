<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	

		$grade 		= mysql_escape_string($_POST['grade']);
		$nik 		= mysql_escape_string($_POST['nik']);
		$year 		= mysql_escape_string($_POST['year']);
		$point 		= mysql_escape_string($_POST['point']);

		$cek = mysql_query("SELECT * FROM employee_penilaian WHERE tahun ='$year' AND nik = '$nik'") or die(mysql_error());
		if (mysql_num_rows($cek) == 0) {
			echo "<script>alert('Error'); window.history.back();</script>";
		}else{
			$insert 	= mysql_query("UPDATE employee_penilaian SET nilai = '$point', grade = '$grade' WHERE 
				nik = '$nik' AND tahun = '$year'   ") or die(mysql_error());
			if ($insert) {
				if (isset($_SESSION['admin'])) {
					echo "<script>window.location.href='/adminweb/employee_point?edit=berhasil'</script>";
				}else{
					echo "<script>window.location.href='/user/employee_point?edit=berhasil'</script>";
				}		
			} else {
				echo "<script>alert('error!'); window.history.back();</script>";
			}
		}

	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>