<?php 
if (isset($_SESSION['kode_user'])) {
    $kode = $_SESSION['kode_user'];
    $edit = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'area' AND m_role.edit = 1 AND user.kode_user = '$kode'") or die(mysql_error());
}
?>
<form action="../admin/controllers/config/p_edit_area.php" method="post">
    <div class="col-sm-12">
        <label>Area Code <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_area" placeholder="Area Code" class="form-control" value="<?= $q['kode_area']?>" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Address</label>
        <div class="input-group">
            <textarea type="text" name="alamat" class="form-control"><?= $q['alamat']?></textarea>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <label>No.</label>
                <div class="input-group">
                    <input type="number" name="no_rumah" placeholder="No." class="form-control" value="<?= $q['no_rumah']?>" >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>RT</label>
                <div class="input-group ">
                    <input type="number" name="rt" placeholder="RT" class="form-control" value="<?= $q['rt']?>" >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>RW</label>
                <div class="input-group ">
                    <input type="number" name="rw" placeholder="RW" class="form-control" value="<?= $q['rw']?>" >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Kelurahan</label>
                <div class="input-group">
                    <input type="text" name="kelurahan" placeholder="Kelurahan" class="form-control" value="<?= $q['kelurahan']?>" >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Kecamatan</label>
                <div class="input-group">
                    <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control" value="<?= $q['kecamatan']?>" >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Town</label>
                <div class="input-group">
                    <input type="text" name="kota" placeholder="Town" class="form-control" value="<?= $q['kota']?>">
                    <div class="input-group-addon"><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-6 ">
                <label>Post Code</label>
                <div class="input-group ">
                    <input type="number" name="kode_pos" placeholder="Post Code" class="form-control" value="<?= $q['kode_pos']?>" >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <label>Description <a class="required">*</a></label>
        <div class="input-group">
            <textarea type="text" name="desc" class="form-control" required="" style="resize: none;"><?= $q['deskripsi']?></textarea>
        </div>
        <br>
        <br>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
        <input type="hidden" name="kode_alamat" value="<?= $q['kode_alamat']?>">
        <input type="hidden" name="id" value="<?= $q['id']?>">
        <?php 
            if (isset($_SESSION['kode_user'])) {
                if (mysql_num_rows($edit) >= 1 ) { ?>
                <button class="btn float-right" type="submit " name="tambah">Save</button>
        <?php   }
            }else{?>
                <button class="btn float-right" type="submit " name="tambah">Save</button>
        <?php    }  ?>   
            
    </div>
</form>