<form action="../admin/controllers/config/p_tambah_job.php" method="post">
    <div class="col-sm-12">
        <label>Kode Pekerjaan <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_pekerjaan" placeholder="Kode Pekerjaan" class="form-control" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Nama Pekerjaan <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="nama_pekerjaan" placeholder="Nama Pekerjaan" class="form-control" required>
            <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
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