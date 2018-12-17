<?php 
	session_start();
	require '../../../_database/koneksi.php';

	if (isset($_POST['kode'])) {	
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
		$kode = $_POST['kode'];
		$master = $_POST['master'];
		$tambah = $_POST['tambah'];
		$lihat = $_POST['lihat'];
		$edit = $_POST['edit'];
		$hapus = $_POST['hapus'];
		if (is_null($kode) ) {
			echo '<script>   alert("Masukan Kode Role"); </script>';
			echo "<script>window.history.back();</script>";
		}else{
			$jumlah = count($master);
 
			for($x=0;$x<$jumlah;$x++){

				$id = acak(); 
				$warga = mysql_query("INSERT INTO m_role VALUES 
						('$id','$kode[$x]','$master[$x]','$tambah[$x]','$lihat[$x]','$edit[$x]','$hapus[$x]');
						") or die(mysql_error());
			}
			if ($warga === true) {
				mysql_query("DELETE FROM m_role WHERE tambah = 0 AND hapus = 0 AND lihat = 0 AND edit = 0");
				echo "<script>window.location.href='../../../adminweb/role'</script>";
			}else{
				echo "<script>alert('Gagal Menambahkan!'); window.history.back();</script>";
			}
		}
	}else{
		echo "<script>window.history.back();</script>";
	}

?>