<?php 
	session_start();
 	require '../../../_database/koneksi.php';
 	$nik 	= mysql_escape_string($_POST['nik']);
	$year 		= mysql_escape_string($_POST['year']);
 	if ($nik == 0 OR $year == 0) {
 		echo "<script>alert('Please Complete Field!'); window.history.back();</script>";
 	}else{
		if (isset($_POST['tambah'])) {	
			function acak(){
				$gpass	= NULL;
				$n 		= 11; 
				$chr 	= "0123456789";
				for($i=0;$i<=$n;$i++){
					$rIdx = rand(1,strlen($chr));
					$gpass .=substr($chr,$rIdx,1);
				}
				return $gpass;
			};
			$id = acak(); 
			$grade 		= mysql_escape_string($_POST['grade']);
			$year 		= mysql_escape_string($_POST['year']);
			$point 		= mysql_escape_string($_POST['point']);

			$cek = mysql_query("SELECT * FROM employee_penilaian WHERE tahun ='$year' AND nik = '$nik'") or die(mysql_error());
			if (mysql_num_rows($cek) > 0) {
				echo "<script>alert('Data Already Available!'); window.history.back();</script>";
			}else{
				$insert 	= mysql_query("INSERT INTO employee_penilaian VALUES
						('$id','$nik', '$year', '$point','$grade', '1') ") or die(mysql_error());
				if ($insert) {
					if (isset($_SESSION['admin'])) {
						echo "<script>window.location.href='/adminweb/employee_point?input=berhasil'</script>";
					}else{
						echo "<script>window.location.href='/user/employee_point?input=berhasil'</script>";
					}		
				} else {
					echo "<script>alert('error!'); window.history.back();</script>";
				}
			}

		} else {
				echo "<script>alert('error!'); window.history.back();</script>";
		}
	}
	
?>