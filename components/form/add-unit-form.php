<form action="../admin/controllers/config/p_tambah_unit.php" method="post">
    <div class="col-sm-12">
        <label>Kode Unit <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_unit" placeholder="Kode Unit" class="form-control" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Nama Unit <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="nama_unit" placeholder="Unit" class="form-control" required>
            <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
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

