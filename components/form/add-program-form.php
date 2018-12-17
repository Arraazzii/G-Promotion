<form action="../admin/controllers/config/p_tambah_program.php" method="post" enctype="multipart/form-data">
    <div class="col-sm-12">
        <label>Kode Program <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_program" placeholder="Kode Program" class="form-control" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Nama Program <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="nama_program" placeholder="Nama Program" class="form-control" required>
            <div class="input-group-addon"><i class="fa fa-archive"></i></div>
        </div>
        <br>
        <div class="row ">
            <div class="col-sm-6">
                <label>Tanggal Mulai <a class="required">*</a></label>
                <div class="input-group">
                    <input type="date" name="tanggal_masuk" placeholder="Tanggal Masuk" class="form-control" required>
                    <div class="input-group-addon "><i class="fa fa-calendar "></i></div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Tanggal Selesai <a class="required">*</a></label>
                <div class="input-group">
                    <input type="date" name="tanggal_keluar" placeholder="Tanggal Keluar" class="form-control" required>
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <br>
        <label>Deskripsi</label>
        <div class="input-group">
            <textarea type="text" name="desc" class="form-control"></textarea>
        </div>
        <br>
        <label>Choose Image <i>*Max 200kb</i></label>
        <div class="input-group">
            <input type="file" name="file">
        </div>
        <input style="display: none" type="checkbox" name="check" checked>
        <button class="btn float-right" type="submit" name="tambah">Simpan</button>
    </div>
</form>