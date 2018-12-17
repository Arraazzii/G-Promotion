<div class="col-sm-12">
    
    <form action="../admin/controllers/config/p_tambah_user.php"" method="post" class="">
        <p style="color: red; text-align: left;">Untuk melihat Authorization Role klik menu <b>Master Role</b></p>
        <div class="form-group">
            <div class="input-group">
                <input type="text" id="username2" name="username" placeholder="Username *" class="form-control" required="">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="text" id="nama" name="nama" placeholder="Nama *" class="form-control" required="">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" id="password2" name="password" placeholder="Password *" class="form-control" required="">
                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <select data-placeholder="Choose a role..." name="role[]" multiple class="standardSelect form-control" required="">
                    <?php 
                    $q = mysql_query("SELECT * FROM m_role GROUP BY kode_role");
                    while ($d = mysql_fetch_array($q)) {?>
                        <option value="<?= $d['kode_role'] ?>">
                            <?= $d['kode_role'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-actions form-group">
            <br><br>
            <input type="checkbox" checked="" hidden="">
            <button type="submit" class="btn btn-secondary btn-sm float-right" name="tambah">Submit</button>
        </div>



    </form>
</div>