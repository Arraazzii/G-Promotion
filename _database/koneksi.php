<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'g-promotion';
	$konek = mysql_connect($host,$user,$pass);

	if ($konek) {
		$ambil = mysql_select_db($db);
			if (!$ambil) {?>
				<meta http-equiv="refresh" content="0;url=../controllers/index.html">
			<?php }
	}else{
		echo "MySQL tidak terhubung";
	}

?>