<form action="../admin/controllers/config/p_tambah_tingkat.php" method="post">
    <div class="col-sm-12">
        <label>Kode Tingkat <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_tingkat" placeholder="Kode Tingkat" class="form-control" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Tingkat <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="tingkat" placeholder="Tingkat" class="form-control" required>
            <div class="input-group-addon"><i class="fa fa-bar-chart-o"></i></div>
        </div>
        <br>
        <label>Deskripsi <a class="required">*</a></label>
        <div class="input-group">
            <textarea type="text" name="desc" class="form-control" required=""></textarea>
        </div>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
        <button class="btn float-right" type="submit" name="tambah">Simpan</button>
    </div>
</form>

