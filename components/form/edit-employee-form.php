<form action="../admin/controllers/config/p_edit_employee.php" method="post">
    <input type="hidden" name="kode_alamat" placeholder="" value="<?= $q['kode_alamat']?>" class="form-control">
    <div class="col-sm-12">
        <label>NIK <a class="required">*</a></label>
        <div class="input-group">
            <input type="number" name="nik" placeholder="NIK" class="form-control" value="<?= $q['nik']?>" required readonly>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>First Name</label>
                <div class="input-group">
                    <input type="text" name="nama_depan" placeholder="First Name" value="<?= $q['nama_depan']?>" class="form-control" required>
                    <div class="input-group-addon "><i class="fa fa-user"></i></div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Last Name</label>
                <div class="input-group">
                    <input type="text" name="nama_belakang" placeholder="Last Name" value="<?= $q['nama_belakang']?>" class="form-control">
                    <div class="input-group-addon "><i class="fa fa-user"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Enterprise Begin</label>
                <div class="input-group">
                    <input type="date" name="begin" class="form-control" value="<?= $q['enterprise_begin']?>" required>
                    <div class="input-group-addon "><i class="fa fa-calendar"></i></div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Enterprise Last</label>
                <div class="input-group">
                    <input type="date" name="last" class="form-control" value="<?= $q['enterprise_last']?>">
                    <div class="input-group-addon "><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <br>
        <label>Staff Date</label>
        <div class="input-group">
            <input type="date" name="staff" class="form-control" value="<?= $q['staff_date']?>">
            <div class="input-group-addon "><i class="fa fa-calendar"></i></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <label>Date Of Birth</label>
                <div class="input-group">
                    <input type="date" name="dob" class="form-control" value="<?= $q['tanggal_lahir']?>">
                    <div class="input-group-addon "><i class="fa fa-birthday-cake"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>Place Of Birth</label>
                <div class="input-group">
                    <input type="text" name="pob" placeholder="Place Of Birth" value="<?= $q['tempat_lahir']?>" class="form-control">
                    <div class="input-group-addon "><i class="fa fa-birthday-cake"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>Gender</label>
                <div class="input-group">
                    <select name="gender" class="form-control">
                        <option hidden="">---- Choose Gender ----</option>
                        <option value="L" <?php if($q[ 'jenis_kelamin']=="L" ){echo "selected";}?>> Male
                        </option>
                        <option value="P" <?php if($q[ 'jenis_kelamin']=="P" ){echo "selected";}?>> Female
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <label>Phone Number</label>
        <div class="input-group">
            <input type="number" name="no_telepon" placeholder="Phone Number" class="form-control" value="<?= $q['no_telepon']?>">
            <div class="input-group-addon "><i class="fa fa-phone"></i></div>
        </div>
        <br>
        <label>Email</label>
        <div class="input-group">
            <input type="text" name="email" placeholder="Email" class="form-control" value="<?= $q['email']?>">
            <div class="input-group-addon "><i class="fa fa-at"></i></div>
        </div>
        <br>
        <label>Address</label>
        <div class="input-group">
            <textarea type="text" name="alamat" class="form-control">
                <?= $q['alamat']?>
            </textarea>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <label>Home Number</label>
                <div class="input-group">
                    <input type="number" name="no_rumah" placeholder="Home Number" class="form-control" value="<?= $q['no_rumah']?>">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>RT</label>
                <div class="input-group ">
                    <input type="number" name="rt" placeholder="RT" class="form-control" value="<?= $q['rt']?>">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>RW</label>
                <div class="input-group ">
                    <input type="number" name="rw" placeholder="RW" class="form-control" value="<?= $q['rw']?>">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Kelurahan</label>
                <div class="input-group">
                    <input type="text" name="kelurahan" placeholder="Kelurahan" class="form-control" value="<?= $q['kelurahan']?>">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Kecamatan</label>
                <div class="input-group">
                    <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control" value="<?= $q['kecamatan']?>">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Town</label>
                <div class="input-group">
                    <input type="text" name="kota" placeholder="Kota" class="form-control" value="<?= $q['kota']?>">
                    <div class="input-group-addon"><i class="fa fa-home"></i></div>
                </div>
            </div>
            <div class="col-sm-6 ">
                <label>Post Code</label>
                <div class="input-group ">
                    <input type="number" name="kode_pos" placeholder="Pos Code" class="form-control" value="<?= $q['kode_pos']?>">
                    <div class="input-group-addon "><i class="fa fa-home"></i></div>
                </div>
            </div>
        </div>
        <br>
        <label>Area</label>
        <div class="input-group">
            <select name="area" class="form-control">
                <option value="" hidden="">---- Choose Area ----</option>
                <?php 
                $qa = mysql_query("SELECT * FROM m_area")or die(mysql_error());
                while ($a = mysql_fetch_array($qa)) {?>
                <option value="<?= $a['kode_area']?>" <?php if($q[ 'kode_area']==$a[ 'kode_area'] ){echo "selected";}?> >
                    <?= $a['deskripsi']?>
                </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <label>Group</label>
        <div class="input-group">
            <select name="group" class="form-control">
                <option value="" hidden>---- Choose Group ----</option>
                <?php 
                $qg = mysql_query("SELECT * FROM m_grup")or die(mysql_error());
                while ($g = mysql_fetch_array($qg)) {?>
                <option value="<?= $g['kode_grup']?>" <?php if($q[ 'kode_grup']==$g[ 'kode_grup'] ){echo "selected";}?>>
                    <?= $g['nama_grup']?>
                </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <label>Job</label>
        <div class="input-group">
            <select name="job" class="form-control">
                <option value="" hidden>---- Choose Job ----</option>
                <?php 
                $qj = mysql_query("SELECT * FROM m_pekerjaan")or die(mysql_error());
                while ($j = mysql_fetch_array($qj)) {?>
                <option value="<?= $j['kode_pekerjaan']?>" <?php if($q[ 'kode_pekerjaan']==$j[ 'kode_pekerjaan'] ){echo "selected";}?>>
                    <?= $j['nama_pekerjaan']?>
                </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <label>Company</label>
        <div class="input-group">
            <select name="company" class="form-control">
                <option value="" hidden>---- Choose Company ----</option>
                <?php 
                $qc = mysql_query("SELECT * FROM m_perusahaan")or die(mysql_error());
                while ($c = mysql_fetch_array($qc)) {?>
                <option value="<?= $c['kode_perusahaan']?>" <?php if($q[ 'kode_perusahaan']==$c[ 'kode_perusahaan'] ){echo "selected";}?> >
                    <?= $c['nama_perusahaan']?>
                </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <label>Level</label>
        <div class="input-group">
            <select name="level" id="level" class="form-control">
                <option value="" hidden>---- Choose Level ----</option>
                <?php 
                $qt = mysql_query("SELECT * FROM m_tingkat")or die(mysql_error());
                while ($t = mysql_fetch_array($qt)) {?>
                <option value="<?= $t['kode_tingkat']?>" <?php if($q[ 'kode_tingkat']==$t[ 'kode_tingkat'] ){echo "selected";}?> >
                    <?= $t['nama_tingkat']?>
                </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <label>Position <b><sup>*Choose Level First to Change Position</sup></b></label>
        <div class="input-group">
            <select name="position" id="posisi" class="form-control">
                <option value="" hidden>---- Choose Position ----</option>
                <?php 
                $posisi = $q['kode_posisi'];
                $qm = mysql_query("SELECT * FROM m_posisi WHERE kode_posisi = '$posisi'")or die(mysql_error());
                while ($m = mysql_fetch_array($qm)) {?>
                <option value="<?= $m['kode_posisi']?>" <?php if($q['kode_posisi']==$m[ 'kode_posisi'] ){echo "selected";}?> >
                    <?= $m['nama_posisi']?>
                </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <label>Unit</label>
        <div class="input-group">
            <select name="unit" class="form-control">
                <option value="" hidden>---- Choose Unit ----</option>
                <?php 
                $qu = mysql_query("SELECT * FROM m_unit")or die(mysql_error());
                while ($u = mysql_fetch_array($qu)) {?>
                <option value="<?= $u['kode_unit']?>" <?php if($q[ 'kode_unit']==$u[ 'kode_unit'] ){echo "selected";}?> >
                    <?= $u['nama_unit']?>
                </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <br>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
        <button class="btn float-right" type="submit " name="tambah">Save</button>
    </div>
</form>
<script src="../assets/js/ext/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#level').on('change',function(){
        var id = $(this).val();
        if(id){
            jQuery.ajax({
                type:'POST',
                url:'../admin/controllers/config/p_choose_position.php',
                data:'id='+id,
                success:function(html){
                    $('#posisi').html(html);
                }
            }); 
        }
    });
});
</script>