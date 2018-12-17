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
		//kode alamat
		$query 		= "SELECT max(kode_alamat) as maxKode FROM alamat";
		$hasil 		= mysql_query($query) or die(mysql_error());
		$data  		= mysql_fetch_array($hasil);
		$kodeAlamat = $data['maxKode'];

		$noUrut 	= (int) substr($kodeAlamat, 5, 5);

		$noUrut++;
		$char 		= "ALM";
		$newID 		= $char . sprintf("%05s", $noUrut);	
		//end kode alamat
		
		$kode_perusahaan 	= mysql_escape_string($_POST['kode_perusahaan']);
		$nama 				= mysql_escape_string($_POST['nama_perusahaan']);
		$telp	 			= mysql_escape_string($_POST['no_telepon']);
		$alamat 			= mysql_escape_string($_POST['alamat']);
		$no_rumah 			= mysql_escape_string($_POST['no_rumah']);
		$rt 				= mysql_escape_string($_POST['rt']);
		$rw 				= mysql_escape_string($_POST['rw']);
		$kelurahan 			= mysql_escape_string($_POST['kelurahan']);
		$kecamatan 			= mysql_escape_string($_POST['kecamatan']);
		$kota 				= mysql_escape_string($_POST['kota']);
		$kode_pos 			= mysql_escape_string($_POST['kode_pos']);
		$desc 				= mysql_escape_string($_POST['desc']);

		$cek = mysql_query("SELECT kode_perusahaan FROM m_perusahaan WHERE kode_perusahaan ='$kode_perusahaan'");
		if (mysql_num_rows($cek) > 0) {
			echo "<script>alert('Code Already Available!'); window.history.back();</script>";
		}else{
			$insAlamat 		= mysql_query("INSERT INTO alamat VALUES 
						('$newID','$alamat','$no_rumah','$rt','$rw','$kelurahan','$kecamatan','$kota','$kode_pos')
						")or die(mysql_error());
			if ($insAlamat == 'true') {
				$perusahaan	= mysql_query("INSERT INTO m_perusahaan VALUES 
						('$kode_perusahaan', '$nama', '$telp', '$desc','$newID','$id');
						") or die(mysql_error());
				if ($perusahaan) {
					if (isset($_SESSION['admin'])) {
						echo "<script>window.location.href='/adminweb/company?input=berhasil'</script>";
					}else{
						echo "<script>window.location.href='/user/company?input=berhasil'</script>";
					}
				}else{
					echo "<script>alert('error!'); window.history.back();</script>";
				}
			}
		}
	}
	
?>