<?php 
	require '../../../_database/koneksi.php';
	
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		mysql_query("DELETE FROM m_role WHERE id = '$id' ");
	}else{
		echo "<script>window.history.back();</script>";
	}
?>