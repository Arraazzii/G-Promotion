<?php 
	session_start();
	require '../../../_database/koneksi.php';
	if (isset($_POST['tambah'])) {
		function acak(){
			$gpass	= NULL;
			$n 		= 2; 
			$chr 	= "0123456789";
			for($i=0;$i<=$n;$i++){
				$rIdx = rand(1,strlen($chr));
				$gpass .=substr($chr,$rIdx,1);
			}
			return $gpass;
		};
		$kode = $_POST['kode_user']; 
		$role = $_POST['role'];
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$status = $_POST['status'];
		$role_gabung = implode(',', $_POST['role']);
		$jumlah = count($role);
		$cekuser = mysql_query("SELECT username from user where username ='$username'") or die(mysql_error());
		if (mysql_num_rows($cekuser) == 0 ) {
			echo '<script>   alert("Username tidak ada"); </script>';
			echo "<script>window.history.back();</script>";
		}else{
			mysql_query("DELETE FROM user WHERE kode_user='$kode'") or die(mysql_error());
			$warga = mysql_query("INSERT INTO user VALUES 
					('$kode','$nama','$username','$password','$role_gabung','$status');
					") or die(mysql_error());
			if ($warga === true) {
				for($x = 0; $x < $jumlah; $x++) {

					$id = acak(); 
				    mysql_query("INSERT INTO user_role VALUES 
					('$id','$kode','$role[$x]');
					") or die(mysql_error());
				}
				echo "<script>window.location.href='../../../adminweb/user?edit=berhasil'</script>";
			}else{
				echo "<script>alert('Gagal Menambahkan!'); window.history.back();</script>";
			}
		}
	}else{
		echo "<script>window.history.back();</script>";
	}

?>