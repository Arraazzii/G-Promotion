<?php
    $kode = base64_decode($_POST['kode_role']);
    $id = $_POST['id'];
    $q = mysql_fetch_array(mysql_query("SELECT * FROM m_role WHERE kode_role = '$kode' "));
    $x = $q['kode_role'];
    if (is_null($x)) {
        echo "<script>window.location.href='role';</script>";
    }
    $q1 = mysql_query("SELECT * FROM m_role WHERE kode_role = '$kode' ");
    
?>
                <?php include'../../../components/form/edit-role-form.php'; ?>
    <script>
    var room = 1;

    function education_fields() {

        room++; var objTo = document.getElementById('education_fields'); var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room); var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="col-sm-12"><input type="text" name="kode0[]" value="<?= $x ?>" hidden><div class="col-sm-6">        <label>Master</label>    <select name="master0[]" class="form-control"><?php  $q2 = mysql_query("SELECT * FROM
        m_navigasi"); while ($d2= mysql_fetch_array($q2)) { ?> <option value="<?= $d2['master']?>" <?php if
        ($d1['master']==$d2['master']) {echo"selected";} ?>>    <?= $d2['nama_navigasi']?> </option><?php }     ?>        </select></div><div class="col-sm-4">    <div class="form-group"><div class="col-sm-3">    <label>Tambah</label>        <br>    <input type="checkbox" name="tambah[]" value="1" <?php if ($d1['tambah']=='1' ) { echo "checked";}
        ?>></div><div class="col-sm-3">    <label>Lihat</label>    <br>    <input type="checkbox" name="lihat[]"        value="1" <?php if ($d1['lihat']=='1' ) { echo "checked";} ?>></div><div class="col-sm-3">        <label>Edit</label>    <br>    <input type="checkbox" name="edit[]" value="1" <?php if ($d1['edit']=='1' ) {
        echo "checked";} ?>></div><div class="col-sm-3">    <label>Hapus</label>    <br>    <input type="checkbox"        name="hapus[]" value="1" <?php if ($d1['hapus']=='1' ) { echo "checked";} ?>></div>    </div></div><div class        ="col-sm-2"><button class="btn btn-danger" type="button"    onclick="remove_education_fields(' + room + ');"        style="margin-top: 30px">-</button></div></div><br>';

    objTo.appendChild(divtest)
    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
    </script>

