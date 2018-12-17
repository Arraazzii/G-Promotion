<form action="../admin/controllers/config/p_tambah_grup.php" method="post">
    <div class="col-sm-12">
        <label>Kode Grup <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_grup" placeholder="Kode Grup" class="form-control" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Nama Grup <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="nama_grup" placeholder="Nama Grup" class="form-control" required>
            <div class="input-group-addon"><i class="fa fa-group"></i></div>
        </div>
        <br>
        <label>Deskripsi</label>
        <div class="input-group">
            <textarea type="text" name="desc" class="form-control"></textarea>
        </div>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
        <button class="btn float-right" type="submit" name="tambah">Simpan</button>
    </div>
</form>

