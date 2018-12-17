<form action="../admin/controllers/config/p_tambah_point.php" method="post">
    <div class="col-sm-12">
        <label>Year <a class="required">*</a></label>
        <div class="input-group">
            <input type="number" max="<?= date('Y') ?>" name="year" min="2011" placeholder="Year" class="form-control" required>
            <div class="input-group-addon "><i class="fa fa-calendar"></i></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>A</label>
                <div class="input-group">
                    <input type="number" max="100" name="a" placeholder="Nilai" class="form-control" required>
                    <div class="input-group-addon"><i class="fa fa-trophy"></i></div>
                </div>
            </div>
            <div class="col-sm-3">
                <label>B</label>
                <div class="input-group">
                    <input type="number" max="100" name="b" placeholder="Nilai" class="form-control" required>
                    <div class="input-group-addon"><i class="fa fa-trophy"></i></div>
                </div>
            </div>
            <div class="col-sm-3">
                <label>C</label>
                <div class="input-group">
                    <input type="number" max="100" name="c" placeholder="Nilai" class="form-control" required>
                    <div class="input-group-addon"><i class="fa fa-trophy"></i></div>
                </div>
            </div>
            <div class="col-sm-3">
                <label>D</label>
                <div class="input-group">
                    <input type="number" max="100" name="d" placeholder="Nilai" class="form-control" required>
                    <div class="input-group-addon"><i class="fa fa-trophy"></i></div>
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