<?php 
	session_start();
	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	

		$id 			= mysql_escape_string($_POST['id']);
		$kode_area 		= mysql_escape_string($_POST['kode_area']);
		$kode_alamat 	= mysql_escape_string($_POST['kode_alamat']);
		$alamat 		= mysql_escape_string($_POST['alamat']);
		$no_rumah 		= mysql_escape_string($_POST['no_rumah']);
		$rt 			= mysql_escape_string($_POST['rt']);
		$rw 			= mysql_escape_string($_POST['rw']);
		$kelurahan 		= mysql_escape_string($_POST['kelurahan']);
		$kecamatan 		= mysql_escape_string($_POST['kecamatan']);
		$kota 			= mysql_escape_string($_POST['kota']);
		$kode_pos 		= mysql_escape_string($_POST['kode_pos']);
		$desc 			= mysql_escape_string($_POST['desc']);
		
		if (!empty($kode_area)) {
			$insAlamat 	= mysql_query("UPDATE alamat SET 
						alamat = '$alamat', no_rumah = '$no_rumah', rt ='$rt', rw='$rw', kelurahan = '$kelurahan', kecamatan = '$kecamatan', kota = '$kota', kode_pos = '$kode_pos' WHERE kode_alamat = '$kode_alamat'
						")or die(mysql_error());
			if ($insAlamat == 'true') {
				$area 	= mysql_query("UPDATE m_area SET
					    kode_area = '$kode_area', deskripsi = '$desc' WHERE id = '$id'
						") or die(mysql_error());
				if ($area) {
					if (isset($_SESSION['admin'])) {
						echo "<script>window.location.href='/adminweb/area?edit=berhasil'</script>";
					}else{
						echo "<script>window.location.href='/user/area?edit=berhasil'</script>";
					}
				}else{
					echo "<script>alert('error!'); window.history.back();</script>";
				}
			}
		}else{
			echo "<script>alert('error!'); window.history.back();</script>";
		}
	}
	
?>