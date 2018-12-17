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

		$kode_posisi 	= mysql_escape_string($_POST['kode_posisi']);
		$nama 			= mysql_escape_string($_POST['posisi']);
		$desc 			= mysql_escape_string($_POST['desc']);
		$level 			= mysql_escape_string($_POST['level']);
		$kode_grade 			= mysql_escape_string($_POST['kode_grade']);

		$cek = mysql_query("SELECT kode_posisi FROM m_posisi WHERE kode_posisi ='$kode_posisi'");
		if (mysql_num_rows($cek) > 0) {
			echo "<script>alert('Code Already Available!'); window.history.back();</script>";
		}else{
			$insert 	= mysql_query("INSERT INTO m_posisi VALUES
							('$kode_posisi', '$nama','$kode_grade', '$level', '$desc','$id') ") or die(mysql_error());

			if ($insert) {
						if (isset($_SESSION['admin'])) {
							echo "<script>window.location.href='/adminweb/position?input=berhasil'</script>";
						}else{
							echo "<script>window.location.href='/user/position?input=berhasil'</script>";
						}
			} else {
				echo "<script>alert('error!'); window.history.back();</script>";
			}
		}
	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>