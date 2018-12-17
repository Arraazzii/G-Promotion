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
		//Details 
		$kode_program 	= mysql_escape_string($_POST['kode_program']);
		$nama 			= mysql_escape_string($_POST['nama_program']);
		$tgl_masuk		= mysql_escape_string($_POST['tanggal_masuk']);
		$tgl_keluar		= mysql_escape_string($_POST['tanggal_keluar']);
		$desc 			= mysql_escape_string($_POST['desc']);
		// Gambar 
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		$namagambar = "M_Program_".$_FILES['file']['name'];
		$x = explode('.', $namagambar);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];	
		$cek = mysql_query("SELECT kode_program FROM m_program WHERE kode_program ='$kode_program'");
		if (mysql_num_rows($cek) > 0) {
			echo "<script>alert('Code Already Available!'); window.history.back();</script>";
		}else{
			if (isset($_POST['file'])) {
				if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					if($ukuran < 244070){			
						move_uploaded_file($file_tmp, '../../../assets/images/upload/'.$namagambar);
						$insert 	= mysql_query("INSERT INTO m_program VALUES
							('$kode_program', '$nama', '$tgl_masuk', '$tgl_keluar', '$desc','$namagambar','$id') ") or die(mysql_error());

						if ($insert) {
							if (isset($_SESSION['admin'])) {
								echo "<script>window.location.href='/adminweb/program?input=berhasil'</script>";
							}else{
								echo "<script>window.location.href='/user/program?input=berhasil'</script>";
							}
						} else {
							echo "<script>alert('error!'); window.history.back();</script>";
						}
					}else{
						echo "<script>alert('File is too Large!'); window.history.back();</script>";
					}
				}else{
					echo "<script>alert('Extension File not allowed'); window.history.back();</script>";
				}
			}else{
				$insert 	= mysql_query("INSERT INTO m_program VALUES
							('$kode_program', '$nama', '$tgl_masuk', '$tgl_keluar', '$desc','','$id') ") or die(mysql_error());
				if ($insert) {
					if (isset($_SESSION['admin'])) {
						echo "<script>window.location.href='/adminweb/program?input=berhasil'</script>";
					}else{
						echo "<script>window.location.href='/user/program?input=berhasil'</script>";
					}
				} else {
					echo "<script>alert('error!'); window.history.back();</script>";
				}
			}
			
			
		}
	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>