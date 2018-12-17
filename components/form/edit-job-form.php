<?php 
if (isset($_SESSION['kode_user'])) {
    $kode = $_SESSION['kode_user'];
    $edit = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'area' AND m_role.edit = 1 AND user.kode_user = '$kode'") or die(mysql_error());
}
?>
<form action="../admin/controllers/config/p_edit_job.php" method="post">
    <div class="col-sm-12">
        <label>Job Code <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_pekerjaan" placeholder="Kode Pekerjaan" class="form-control" value="<?= $q['kode_pekerjaan']?>" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Job Name <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="nama_pekerjaan" placeholder="Nama Pekerjaan" class="form-control" value="<?= $q['nama_pekerjaan']?>" required>
            <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
        </div>
        <br>
        <label>Deskripsi</label>
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