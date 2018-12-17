<?php 
	require '../../../_database/koneksi.php';
	if (isset($_POST['status'])) {
		$status = $_POST['status'];
		if ($status == 1 ) {
			mysql_query("UPDATE m_navigasi_parent SET status = '1' WHERE id_parent ='1'");
		}else if ($status == 0 ) {
			mysql_query("UPDATE m_navigasi_parent SET status = '0' WHERE id_parent ='1'");
		}
	}else{
		echo "<script>window.history.back();</script>";
	}

?>