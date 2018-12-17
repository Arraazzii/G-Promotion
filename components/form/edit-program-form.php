<?php 
if (isset($_SESSION['kode_user'])) {
    $kode = $_SESSION['kode_user'];
    $edit = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'area' AND m_role.edit = 1 AND user.kode_user = '$kode'") or die(mysql_error());
}
?>
<form action="../admin/controllers/config/p_edit_program.php" method="post" enctype="multipart/form-data">
    <div class="col-sm-12">
        <label>Program Code <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_program" placeholder="Program Code" class="form-control" value="<?= $q['kode_program']?>" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Program Name <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="nama_program" placeholder="Program Name" class="form-control" value="<?= $q['nama_program']?>" required>
            <div class="input-group-addon"><i class="fa fa-archive"></i></div>
        </div>
        <br>
        <div class="row ">
            <div class="col-sm-6">
                <label>Start Date <a class="required">*</a></label>
                <div class="input-group">
                    <input type="date" name="tanggal_masuk" class="form-control" value="<?= $q['tanggal_mulai']?>" required>
                    <div class="input-group-addon "><i class="fa fa-calendar "></i></div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>End Date <a class="required">*</a></label>
                <div class="input-group">
                    <input type="date" name="tanggal_keluar" class="form-control" value="<?= $q['tanggal_selesai']?>" required>
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <br>
        <label>Description</label>
        <div class="input-group">
            <textarea type="text" name="desc" class="form-control"><?= $q['deskripsi']?></textarea>
        </div>
        <br>
        <div class="input-group">
            <?php 
            if ($q['image'] != '') {?>
                <img class="card-img-top" src="../assets/images/upload/<?= $q['image']?>" style="width: 300px;"" alt="<?= $q['image']?>">
            <?php }else {?>
                <img class="card-img-top" src="../assets/images/upload/kosong.png" style="width: 300px;" alt="Image Unavailable">
            <?php }?>
            <input type="hidden" name="gambar" value="<?= $q['image']?>">
        </div>
        <br> 
        <label>Change Image</label>
        <div class="input-group">
            <input type="file" name="file">
        </div>
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