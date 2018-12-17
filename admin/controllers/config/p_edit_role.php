<?php 
	session_start();
	require '../../../_database/koneksi.php';
	
	if (isset($_POST['kode'])) {
		$get1 = base64_encode($_POST['awal']);
		$get2 = $_POST['awal2'];
		$awal = $_POST['awal'];
		$kode = $_POST['kode0'];
		$master = $_POST['master0'];
		$tambah = $_POST['tambah'];
		$lihat = $_POST['lihat'];
		$edit = $_POST['edit'];
		$hapus = $_POST['hapus'];
		if (is_null($kode) ) {
			echo '<script>   alert("Masukan Kode Role"); </script>';
			echo "<script>window.history.back();</script>";
		}else{
			$jumlah = count($master);
 			mysql_query("DELETE FROM m_role WHERE kode_role = '$awal' ");
			for($x=0;$x<$jumlah;$x++){
				$warga = mysql_query("INSERT INTO m_role VALUES 
						(NULL,'$kode[$x]','$master[$x]','$tambah[$x]','$lihat[$x]','$edit[$x]','$hapus[$x]');
						") or die(mysql_error());
			}
			if ($warga === true) {
				mysql_query("DELETE FROM m_role WHERE tambah = 0 AND hapus = 0 AND lihat = 0 AND edit = 0");
				echo "<script>window.location.href='../../../adminweb/role?edit=berhasil'</script>";
			}else{
				echo "<script>alert('Gagal Menambahkan!'); window.history.back();</script>";
			}
		}
	}else{
		echo "<script>window.history.back();</script>";
	}

?>