<form action="../admin/controllers/config/p_tambah_employee.php" method="post">
    <div class="col-sm-12">
        <label>NIK <a class="required">*</a></label>
        <div class="input-group">
            <input type="number" name="nik" placeholder="NIK" class="form-control" maxlength="20" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>First Name <a class="required">*</a></label>
                <div class="input-group">
                    <input type="text" name="nama_depan" placeholder="First Name" class="form-control" required>
                    <div class="input-group-addon "><i class="fa fa-user"></i></div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Last Name</label>
                <div class="input-group">
                    <input type="text" name="nama_belakang" placeholder="Last Name" class="form-control">
                    <div class="input-group-addon "><i class="fa fa-user"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Enterprise Begin <a class="required">*</a></label>
                <div class="input-group">
                    <input type="date" name="begin" class="form-control" required>
                    <div class="input-group-addon "><i class="fa fa-calendar"></i></div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Enterprise Last</label>
                <div class="input-group">
                    <input type="date" name="last" class="form-control">
                    <div class="input-group-addon "><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <label>Date Of Birth</label>
                <div class="input-group">
                    <input type="date" name="dob" class="form-control">
                    <div class="input-group-addon "><i class="fa fa-birthday-cake"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>Place Of Birth</label>
                <div class="input-group">
                    <input type="text" name="pob" placeholder="Place Of Birth" class="form-control">
                    <div class="input-group-addon "><i class="fa fa-birthday-cake"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>Gender</label>
                <div class="input-group">
                    <select name="gender" class="form-control">
                        <option value="" hidden>
                            -Choose-
                        </option>
                        <option value="L">
                            Male
                        </option>
                        <option value="P">
                            Female
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <label>Phone Number</label>
        <div class="input-group">
            <input type="number" name="no_telepon" placeholder="Phone Number" class="form-control">
            <div class="input-group-addon "><i class="fa fa-phone"></i></div>
        </div>
        <br>
        <label>Email</label>
        <div class="input-group">
            <input type="text" name="email" placeholder="Email" class="form-control">
            <div class="input-group-addon "><i class="fa fa-at"></i></div>
        </div>
        <br>
        <label>Address</label>
        <div class="input-group">
            <textarea type="text" name="alamat" class="form-control"></textarea>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <label>Home Number</label>
                <div class="input-group">
                    <input type="number" name="no_rumah" placeholder="Home Number" class="form-control ">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>RT</label>
                <div class="input-group ">
                    <input type="number" name="rt" placeholder="RT" class="form-control ">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>RW</label>
                <div class="input-group ">
                    <input type="number" name="rw" placeholder="RW" class="form-control ">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Kelurahan</label>
                <div class="input-group">
                    <input type="text" name="kelurahan" placeholder="Kelurahan" class="form-control ">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Kecamatan</label>
                <div class="input-group">
                    <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control ">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Town</label>
                <div class="input-group">
                    <input type="text" name="kota" placeholder="Kota" class="form-control">
                    <div class="input-group-addon"><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-6 ">
                <label>Pos Code</label>
                <div class="input-group ">
                    <input type="number" name="kode_pos" placeholder="Pos Code" class="form-control">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
        <button class="btn float-right" type="submit" name="tambah">Save</button>
    </div>
</form>