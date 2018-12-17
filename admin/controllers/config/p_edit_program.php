<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	

		$id 			= mysql_escape_string($_POST['id']);
		$kode_program	= mysql_escape_string($_POST['kode_program']);
		$nama 			= mysql_escape_string($_POST['nama_program']);
		$tgl_masuk 		= mysql_escape_string($_POST['tanggal_masuk']);
		$tgl_keluar		= mysql_escape_string($_POST['tanggal_keluar']);
		$desc 			= mysql_escape_string($_POST['desc']);
		$gambar 			= mysql_escape_string($_POST['gambar']);
		// gambar
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		$namagambar = "M_Program_".$_FILES['file']['name'];
		$x = explode('.', $namagambar);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 244070){			
				unlink('../../../assets/images/upload/'.$gambar);
				move_uploaded_file($file_tmp, '../../../assets/images/upload/'.$namagambar);	
				$update 		= mysql_query("UPDATE m_program SET 
								kode_program = '$kode_program', nama_program = '$nama', tanggal_mulai = '$tgl_masuk', tanggal_selesai = '$tgl_keluar', deskripsi = '$desc', image = '$namagambar' WHERE id = '$id' ") or die(mysql_error());
				if ($update) {
					if (isset($_SESSION['admin'])) {
						echo "<script>window.location.href='/adminweb/program?edit=berhasil'</script>";
					}else{
						echo "<script>window.location.href='/user/program?edit=berhasil'</script>";
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
	} else {
			echo "<script>alert('error!'); window.history.back();</script>";
	}
	
?>