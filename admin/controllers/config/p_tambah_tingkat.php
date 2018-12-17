<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	
		function acak(){
			$gpass=NULL;
			$n = 11; 
			$chr = "0123456789";
			for($i=0;$i<=$n;$i++){
				$rIdx = rand(1,strlen($chr));
				$gpass .=substr($chr,$rIdx,1);
			}
			return $gpass;
		};
		$id = acak(); 

		$kode_tingkat 	= mysql_escape_string($_POST['kode_tingkat']);
		$nama 			= mysql_escape_string($_POST['tingkat']);
		$desc 			= mysql_escape_string($_POST['desc']);

		$cek = mysql_query("SELECT kode_tingkat FROM m_tingkat WHERE kode_tingkat ='$kode_tingkat'");
		if (mysql_num_rows($cek) > 0) {
			echo "<script>alert('Code Already Available!'); window.history.back();</script>";
		}else{
			$insert 		= mysql_query("INSERT INTO m_tingkat VALUES
							('$kode_tingkat', '$nama', '$desc','$id') ") or die(mysql_error());

			if ($insert) {
				if (isset($_SESSION['admin'])) {
					echo "<script>window.location.href='/adminweb/level?input=berhasil'</script>";
				}else{
					echo "<script>window.location.href='/user/level?input=berhasil'</script>";
				}
			} else {
				echo "<script>alert('error!'); window.history.back();</script>";
			}
		}
	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>