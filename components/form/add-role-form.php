
<form id="form" action="../admin/controllers/config/p_tambah_role.php" method="post">
    <div class="card" style="padding-bottom: 20px;margin: 15px">
                <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>TAMBAH ROLE</strong></h3>
            <a href="role">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
            </a>
        </div>
        <div class="card-body">
                <div class="panel-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Kode Role</label>
                                    <select name='kode[]' class="form-control">
                                        <option value="<?= $x?>">
                                            <?= $x?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Master</label>
                                <select name='master[]' class="form-control">
                                    <?php 
                                        $q = mysql_query("SELECT * FROM m_navigasi");
                                        while ($d = mysql_fetch_array($q)) {?>
                                            <option value="<?= $d['master']?>">
                                                <?= $d['nama_navigasi']?>
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
                                        <input type="checkbox" name="tambah[]" value="1">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Lihat</label>
                                        <br>
                                        <input type="checkbox" name="lihat[]" value="1">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Edit</label>
                                        <br>
                                        <input type="checkbox" name="edit[]" value="1">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Hapus</label>
                                        <br>
                                        <input type="checkbox" name="hapus[]" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <br>
                                        <button class="btn btn-success" type="button" onclick="education_fields();" style="margin-top: 30px">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="education_fields">
                    </div>
                    <div class="clear"></div>
                </div>

        </div>
        <div class="col-sm-3">
            <div class="col-sm-6">
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </div>
    </div>
            </form>
<script>
var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = ' <div class="col-sm-12"><div class="row">                            <div class="col-sm-2">                                <div class="form-group">                                    <label>Kode Role</label>                                    <select name="kode[]" class="form-control">                                        <option value="<?= $x?>">                                            <?= $x?>
                                        </option>                                    </select>                                </div>                            </div>                            <div class="col-sm-3">                                <label>Master</label>                                <select name="master[]" class="form-control">                                    <?php 
                        $q = mysql_query("SELECT * FROM m_navigasi");
                        while ($d = mysql_fetch_array($q)) {?>
                                    <option value="<?= $d['master']?>">                                        <?= $d['nama_navigasi']?>
                                    </option>                                    <?php }
                            ?>
                                </select>                          </div>                            <div class="col-sm-4">                                <div class="form-group">                                    <div class="col-sm-3">                                        <label>Tambah</label>                                        <br>                                        <input type="checkbox" name="tambah[]" value="1">                                    </div>                                    <div class="col-sm-3">                                        <label>Lihat</label>                                        <br>                                        <input type="checkbox" name="lihat[]" value="1">                                    </div>                                    <div class="col-sm-3">                                        <label>Edit</label>                                        <br>                                        <input type="checkbox" name="edit[]" value="1">                                    </div>                                  <div class="col-sm-3">                                        <label>Hapus</label>                                        <br>                                        <input type="checkbox" name="hapus[]" value="1">                                    </div>                                </div>                            </div>                            <div class="col-sm-3">                                <div class="form-group">                                    <div class="input-group">                                        <br>                                        <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');" style="margin-top: 30px">-</button>                                    </div>                                </div>                            </div>                        </div>                    </div>';

    objTo.appendChild(divtest)
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}
</script>