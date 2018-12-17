<?php 
	session_start();
 	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {	
		$kode_alamat 	= mysql_escape_string($_POST['kode_alamat']);
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
		$alamat 	= mysql_escape_string($_POST['alamat']);
		$no_rumah 	= mysql_escape_string($_POST['no_rumah']);
		$rt 		= mysql_escape_string($_POST['rt']);
		$rw 		= mysql_escape_string($_POST['rw']);
		$kelurahan 	= mysql_escape_string($_POST['kelurahan']);
		$kecamatan 	= mysql_escape_string($_POST['kecamatan']);
		$kota 		= mysql_escape_string($_POST['kota']);
		$kode_pos 	= mysql_escape_string($_POST['kode_pos']);

		
		$nik 			= mysql_escape_string($_POST['nik']);
		$begin 			= mysql_escape_string($_POST['begin']);
		$last 			= mysql_escape_string($_POST['last']);
		$nama_depan 	= mysql_escape_string($_POST['nama_depan']);
		$nama_belakang 	= mysql_escape_string($_POST['nama_belakang']);
		$pob 			= mysql_escape_string($_POST['pob']);
		$dob 			= mysql_escape_string($_POST['dob']);
		$gender 		= mysql_escape_string($_POST['gender']);
		$no_telepon 	= mysql_escape_string($_POST['no_telepon']);
		$email 			= mysql_escape_string($_POST['email']);
		
		$staff 			= mysql_escape_string($_POST['staff']);
		$area 			= mysql_escape_string($_POST['area']);
		$group 			= mysql_escape_string($_POST['group']);
		$job 			= mysql_escape_string($_POST['job']);
		$company 		= mysql_escape_string($_POST['company']);
		$position 		= mysql_escape_string($_POST['position']);
		$level 			= mysql_escape_string($_POST['level']);
		$unit 			= mysql_escape_string($_POST['unit']);

		$cek = mysql_query("SELECT nik FROM mt_employee WHERE nik ='$nik'");
		if (mysql_num_rows($cek) == 0) {
			echo "<script>alert('Error!'); window.history.back();</script>";
		}else{

			
			$insAlamat 	= mysql_query("UPDATE alamat SET alamat = '$alamat', no_rumah= '$no_rumah', rt = '$rt', rw = '$rw', kelurahan ='$kelurahan', kecamatan ='$kecamatan', kota='$kota', kode_pos = '$kode_pos' WHERE kode_alamat = '$kode_alamat' ") or die(mysql_error());
			if ($insAlamat == 'true') {
				$em 	= mysql_query("UPDATE mt_employee SET nama_depan = '$nama_depan', nama_belakang= '$nama_belakang', tempat_lahir = '$pob', tanggal_lahir = '$dob', jenis_kelamin ='$gender', no_telepon ='$no_telepon', email='$email', kode_alamat = '$kode_alamat' WHERE nik = '$nik'") or die(mysql_error());
				if ($em) {
					$master 	= mysql_query("UPDATE master SET enterprise_begin = '$begin', enterprise_last= '$last', kode_perusahaan = '$company', kode_area = '$area', kode_unit ='$unit', kode_grup ='$group', kode_pekerjaan='$job', kode_posisi = '$position', kode_tingkat = '$level', staff_date = '$staff' WHERE nik = '$nik' ") or die(mysql_error());
					if ($master) {
						if (isset($_SESSION['admin'])) {
							echo "<script>window.location.href='/adminweb/employee?edit=berhasil'</script>";
						}else{
							echo "<script>window.location.href='/user/employee?edit=berhasil'</script>";
						}
					}else{
						echo "<script>alert('error!'); window.history.back();</script>";
					}
				}else{
					echo "<script>alert('error!'); window.history.back();</script>";
				}
			}
		}
	}else{
		echo "<script>window.history.back();</script>";
	}
	
?>