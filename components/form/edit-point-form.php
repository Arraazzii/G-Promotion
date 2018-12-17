<?php 
if (isset($_SESSION['kode_user'])) {
    $kode = $_SESSION['kode_user'];
    $edit = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'area' AND m_role.edit = 1 AND user.kode_user = '$kode'") or die(mysql_error());
}
?>
<form action="../admin/controllers/config/p_edit_point.php" method="post">
    <input type="hidden" name="id" value="<?= $kode?>">
    <div class="col-sm-12">
        <label>Year<a class="required">*</a></label>
        <div class="input-group">
            <input type="number" name="year" placeholder="Year" max="<?= $q['tahun']?>" min="2011" value="<?= $q['tahun']?>" class="form-control" required>
            <div class="input-group-addon "><i class="fa fa-calendar"></i></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>A</label>
                <div class="input-group">
                    <input type="text" name="a" placeholder="Nilai" value="<?= $q['a']?>" class="form-control" required>
                    <div class="input-group-addon"><i class="fa fa-trophy"></i></div>
                </div>
            </div>
            <div class="col-sm-3">
                <label>B</label>
                <div class="input-group">
                    <input type="text" name="b" placeholder="Nilai" value="<?= $q['b']?>" class="form-control" required>
                    <div class="input-group-addon"><i class="fa fa-trophy"></i></div>
                </div>
            </div>
            <div class="col-sm-3">
                <label>C</label>
                <div class="input-group">
                    <input type="text" name="c" placeholder="Nilai" value="<?= $q['c']?>" class="form-control" required>
                    <div class="input-group-addon"><i class="fa fa-trophy"></i></div>
                </div>
            </div>
            <div class="col-sm-3">
                <label>D</label>
                <div class="input-group">
                    <input type="text" name="d" placeholder="Nilai" value="<?= $q['d']?>" class="form-control" required>
                    <div class="input-group-addon"><i class="fa fa-trophy"></i></div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
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