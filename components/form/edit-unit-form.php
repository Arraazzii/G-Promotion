<?php 
if (isset($_SESSION['kode_user'])) {
    $kode = $_SESSION['kode_user'];
    $edit = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'area' AND m_role.edit = 1 AND user.kode_user = '$kode'") or die(mysql_error());
}
?>
<form action="../admin/controllers/config/p_edit_unit.php" method="post">
    <div class="col-sm-12">
        <label>Unit Code</label>
        <div class="input-group">
            <input type="text" name="kode_unit" placeholder="Unit Code" class="form-control" value="<?= $q['kode_unit']?>" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Unit Name</label>
        <div class="input-group">
            <input type="text" name="nama_unit" placeholder="Unit" class="form-control" value="<?= $q['nama_unit']?>" required>
            <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
        </div>
        <br>
        <label>Description</label>
        <div class="input-group">
            <textarea type="text" name="desc" class="form-control"><?= $q['deskripsi']?></textarea>
        </div>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
        <input type="hidden" name="id" value="<?= $q['id']?>">
        <?php 
            if (isset($_SESSION['kode_user'])) {
                if (mysql_num_rows($edit) >= 1 ) {?>
                <button class="btn float-right" type="submit " name="tambah">Save</button>
        <?php   }
            } else { ?>
                <button class="btn float-right" type="submit " name="tambah">Save</button>
        <?php } ?>
    </div>
</form>