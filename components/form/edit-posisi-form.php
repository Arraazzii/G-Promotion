<?php 
if (isset($_SESSION['kode_user'])) {
    $kode = $_SESSION['kode_user'];
    $edit = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'area' AND m_role.edit = 1 AND user.kode_user = '$kode'") or die(mysql_error());
}
?>
<form action="../admin/controllers/config/p_edit_posisi.php" method="post">
    <div class="col-sm-12">
        <label>Level <a class="required">*</a></label>
        <div class="input-group nik">
            <select name="level" id="employee" class="standardSelect form-control" tabindex="1" required="">
                <option value="0" hidden>---- Choose Level ----</option>
                <?php 
                $qt = mysql_query("SELECT * FROM m_tingkat")or die(mysql_error());
                while ($t = mysql_fetch_array($qt)) {?>
                <option value="<?= $t['kode_tingkat']?>" <?php if($q['id_tingkat']==$t['kode_tingkat'] ){echo "selected";}?> >
                    <?= $t['nama_tingkat']?>
                </option>
                <?php } ?>  
            </select>
        </div>
        <br>
        <label>Position Code <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_posisi" placeholder="Position Code" class="form-control" value="<?= $q['kode_posisi']?>" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Position <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="posisi" placeholder="Position" class="form-control" value="<?= $q['nama_posisi']?>" required>
            <div class="input-group-addon"><i class="fa fa-bar-chart-o"></i></div>
        </div>
        <br>
        <label>Grade Code <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_grade" placeholder="ex: 4A / 1A / 3A" class="form-control" value="<?= $q['grade_posisi']?>" required>
            <div class="input-group-addon"><i class="fa fa-bar-chart-o"></i></div>
        </div>
        <br>
        <label>Description</label>
        <div class="input-group">
            <textarea type="text" name="desc" class="form-control" required=""><?= $q['deskripsi']?></textarea>
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