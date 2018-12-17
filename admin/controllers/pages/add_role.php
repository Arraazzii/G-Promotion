<?php
    $q = mysql_fetch_array(mysql_query("SELECT * FROM m_role ORDER BY kode_role DESC LIMIT 1 "));
    $x = $q['kode_role'];
    if (is_null($x)) {
        $x = 'A';
    }else{
        $x++;
    }
?>
    <?php include'../../../components/form/add-role-form.php'; ?>