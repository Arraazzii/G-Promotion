<form action="../admin/controllers/config/p_tambah_perusahaan.php" method="post">
    <div class="col-sm-12">
        <label>Kode Perusahaan <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_perusahaan" placeholder="Kode Perusahaan" class="form-control" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Nama Perusahaan <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control " required="" >
            <div class="input-group-addon "><i class="fa fa-building-o"></i></div>
        </div>
        <br>
        <label>No. Telepon</label>
        <div class="input-group">
            <input type="number" name="no_telepon" placeholder="No. Telepon " class="form-control " >
            <div class="input-group-addon "><i class="fa fa-phone"></i></div>
        </div>
        <br>
        <label>Alamat</label>
        <div class="input-group">
            <textarea type="text" name="alamat" class="form-control"></textarea>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <label>No. Rumah</label>
                <div class="input-group">
                    <input type="number" name="no_rumah" placeholder="No. Rumah" class="form-control " >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>RT</label>
                <div class="input-group ">
                    <input type="number" name="rt" placeholder="RT" class="form-control " >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>RW</label>
                <div class="input-group ">
                    <input type="number" name="rw" placeholder="RW" class="form-control " >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Kelurahan</label>
                <div class="input-group">
                    <input type="text" name="kelurahan" placeholder="Kelurahan" class="form-control " >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Kecamatan</label>
                <div class="input-group">
                    <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control " >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Kota</label>
                <div class="input-group">
                    <input type="text" name="kota" placeholder="Kota" class="form-control" >
                    <div class="input-group-addon"><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-6 ">
                <label>Kode Pos</label>
                <div class="input-group ">
                    <input type="number" name="kode_pos" placeholder="Kode Pos" class="form-control" >
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <label>Deskripsi</label>
        <div class="input-group">
            <textarea type="text" name="desc" class="form-control"></textarea>
        </div>
        <br>
        <br>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
        <button class="btn float-right" type="submit" name="tambah">Simpan</button>
    </div>
</form>