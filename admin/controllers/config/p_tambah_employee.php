<?php 
	session_start();
 	require '../../../_database/koneksi.php';
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
		$alamat 	= mysql_escape_string($_POST['alamat']);
		$no_rumah 	= mysql_escape_string($_POST['no_rumah']);
		$rt 		= mysql_escape_string($_POST['rt']);
		$rw 		= mysql_escape_string($_POST['rw']);
		$kelurahan 	= mysql_escape_string($_POST['kelurahan']);
		$kecamatan 	= mysql_escape_string($_POST['kecamatan']);
		$kota 		= mysql_escape_string($_POST['kota']);
		$kode_pos 	= mysql_escape_string($_POST['kode_pos']);


		$nik 				= mysql_escape_string($_POST['nik']);
		$begin 				= mysql_escape_string($_POST['begin']);
		$last 				= mysql_escape_string($_POST['last']);
		$nama_depan 		= mysql_escape_string($_POST['nama_depan']);
		$nama_belakang 		= mysql_escape_string($_POST['nama_belakang']);
		$pob 				= mysql_escape_string($_POST['pob']);
		$dob 				= mysql_escape_string($_POST['dob']);
		$gender 			= mysql_escape_string($_POST['gender']);
		$no_telepon 		= mysql_escape_string($_POST['no_telepon']);
		$email 				= mysql_escape_string($_POST['email']);
		
		$cek = mysql_query("SELECT nik FROM mt_employee WHERE nik ='$nik'");
		if (mysql_num_rows($cek) > 0) {
			echo "<script>alert('NIK Already Available!'); window.history.back();</script>";
		}else{
			$insAlamat 	= mysql_query("INSERT INTO alamat VALUES 
						('$newID','$alamat','$no_rumah','$rt','$rw','$kelurahan','$kecamatan','$kota','$kode_pos')
						")or die(mysql_error());
			if ($insAlamat == 'true') {
				$area 	= mysql_query("INSERT INTO mt_employee VALUES 
						('$nik','$nama_depan','$nama_belakang','$pob','$dob','$gender','$no_telepon','$email','$newID');
						") or die(mysql_error());
				if ($area) {
					$master 	= mysql_query("INSERT INTO master VALUES 
						('$nik','$begin','$last','','','','','','','','');
						") or die(mysql_error());
					if ($master) {
						if (isset($_SESSION['admin'])) {
							echo "<script>window.location.href='/adminweb/employee?input=berhasil'</script>";
						}else{
							echo "<script>window.location.href='/user/employee?input=berhasil'</script>";
						}
					}else{
						echo "<script>alert('error!'); window.history.back();</script>";
					}
				}else{
					echo "<script>alert('error!'); window.history.back();</script>";
				}
			}
		}
	}
	
?>