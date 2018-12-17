    <form id="form" action="../admin/controllers/config/p_edit_role.php" method="post">
        <input type="text" name="awal" id="awal" value="<?= $x ?>" hidden>
        <input type="text" name="awal2" id="awal2" value="<?= $id ?>" hidden>
        <div class="card" style="padding-bottom: 20px;margin: 15px">
            <div class="card-header bg-flat-color-5">
                <h3 class="text-white"><strong>DETAILS ROLE (<?= $x ?>)</strong></h3>
                <a href="role">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
                </a>
            </div>
            <div class="card-body">
                <div class="panel-body">
                    <div class="tampil-table">
                        <?php 
                

                while ($d1 = mysql_fetch_array($q1)) {?>
                        <input type="text" name="kode0[]" value="<?= $x ?>" hidden>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <label>Master</label>
                                <select name="master0[]"class="form-control">
                                    <?php 
                                    $q2 = mysql_query("SELECT * FROM m_navigasi");
                                    while ($d2= mysql_fetch_array($q2)) {?>
                                    <option value="<?= $d2['master']?>" <?php if ($d1[ 'master']==$d2[ 'master']) { echo "selected";} ?>>
                                        <?= $d2['nama_navigasi']?>
                                    </option>
                                    <?php }
                                ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Tambah</label>
                                        <br>
                                        <input type="checkbox" name="tambah[]" value="1" <?php if ($d1[ 'tambah']=='1' ) { echo "checked";} ?>>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Lihat</label>
                                        <br>
                                        <input type="checkbox" name="lihat[]" value="1" <?php if ($d1[ 'lihat']=='1' ) { echo "checked";} ?>>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Edit</label>
                                        <br>
                                        <input type="checkbox" name="edit[]" value="1" <?php if ($d1[ 'edit']=='1' ) { echo "checked";} ?>>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Hapus</label>
                                        <br>
                                        <input type="checkbox" name="hapus[]" value="1" <?php if ($d1[ 'hapus']=='1' ) { echo "checked";} ?>>
                                    </div>
                                </div>
                            </div>
                            <input type="text" name="" id="kode_role" value="<?= $d1['kode_role'] ?>" hidden>
                            <div class="col-sm-2">
                                <input type="text" name="master" class="master" id="master" value="Role" hidden="">
                                <input type="text" name="kode" class="kode" id="kode" value="10" hidden="">
                                <button onclick="hapus(<?= $d1['id'] ?>)" type="button" class="btn btn-outline-danger"><i class="fa fa-eraser">Hapus</i></button>          
                                </a>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
            <div class="col-sm-12 nopadding">


            </div>
                        <?php } ?>
                    </div>
            <br><br><br>
            <hr>
            <div id="education_fields">
            </div>
            <br>
            <div class="col-sm-3 no-padding" style="margin-top: 20px">
                <div class="col-sm-6">
                    <button class="btn btn-primary" type="submit">Simpan Role</button>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-success float-left" type="button" onclick="education_fields();">ADD NEW ROLE</button>
                </div>
            </div> 
        </div>
    </form>