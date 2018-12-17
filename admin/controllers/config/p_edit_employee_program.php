<?php 
	session_start();
	require '../../../_database/koneksi.php';
	
	if (isset($_POST['name'])) {
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
		$nik = $_POST['nik'];
		$name = $_POST['name'];
		$program = $_POST['program'];
		if ($nik == '' ) {
			echo '<script>   alert("Choose Employee"); </script>';
			echo "<script>window.history.back();</script>";
		}else{
			$jumlah = count($program);
 			mysql_query("DELETE FROM program_karyawan WHERE nik = '$nik' ");
			for($x=0;$x<$jumlah;$x++){
				$id = acak();
				$warga = mysql_query("INSERT INTO program_karyawan VALUES 
						('$id','$nik','$program[$x]');
						") or die(mysql_error());
			}
			if ($warga) {
				if (isset($_SESSION['admin'])) {
					echo "<script>window.location.href='/adminweb/employee_program?edit=berhasil'</script>";
				}else{
					echo "<script>window.location.href='/user/employee_program?edit=berhasil'</script>";
				}
			} else {
				echo "<script>alert('error!'); window.history.back();</script>";
			}
		}
	}else{
		echo "<script>window.history.back();</script>";
	}

?>