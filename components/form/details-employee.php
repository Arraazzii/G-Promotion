
<div class="col-sm-12">
    <div class="row form-group">
        <div class="col col-md-2">
            <label class=" form-control-label">NIK</label>
        </div>
        <div class="col col-md-1">
            :
        </div>
        <div class="col-sm-9 col-md-3">
            <p class="form-control-static">
                <?= $q['nik']?>
            </p>
        </div>
        <div class="col col-md-2">
            <label class=" form-control-label">Staff Date</label>
        </div>
        <div class="col col-md-1">
            :
        </div>
        <div class="col-sm-9 col-md-3">
            <p class="form-control-static">
                <?= $q['staff_date']?>
            </p>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-2">
            <label class=" form-control-label">Name</label>
        </div>
        <div class="col col-md-1">
            :
        </div>
        <div class="col-sm-9 col-md-3">
            <p class="form-control-static">
                <?= $q['nama_depan']?>
                <?= $q['nama_belakang']?>
                <?php if($q['jenis_kelamin']=="L" ){
                    echo "(Male)";
                } else if ($q['jenis_kelamin']=="P" ) {
                    echo "(Female)";
                }else{
                    ;
                }?>
            </p>
        </div>
        <div class="col col-md-2">
            <label class=" form-control-label">Place n Birth</label>
        </div>
        <div class="col col-md-1">
            :
        </div>
        <div class="col-sm-9 col-md-3">
            <p class="form-control-static">
                <?= $q['tempat_lahir']?> 
                <?= $q['tanggal_lahir']?>
            </p>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-2">
            <label class=" form-control-label">Enterprise Begin</label>
        </div>
        <div class="col col-md-1">
            :
        </div>
        <div class="col-sm-9 col-md-3">
            <p class="form-control-static">
                <?= $q['enterprise_begin']?>
            </p>
        </div>
        <div class="col col-md-2">
            <label class=" form-control-label">Enterprise Last</label>
        </div>
        <div class="col col-md-1">
            :
        </div>
        <div class="col-sm-9 col-md-3">
            <p class="form-control-static">
                <?= $q['enterprise_last']?>
            </p>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-2">
            <label class=" form-control-label">Phone Number</label>
        </div>
        <div class="col col-md-1">
            :
        </div>
        <div class="col-sm-9 col-md-3">
            <p class="form-control-static">
                <?php 
                if ($q['no_telepon'] = " ") {
                    echo "-";
                }else{
                    echo $q['no_telepon'];
                }    
                ?>
            </p>
        </div>
        <div class="col col-md-2">
            <label class=" form-control-label">Email</label>
        </div>
        <div class="col col-md-1">
            :
        </div>
        <div class="col-sm-9 col-md-3">
            <p class="form-control-static">
                <?php 
                if ($q['email'] = " ") {
                    echo "-";
                }else{
                    echo $q['email'];
                }    
                ?>
            </p>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-2">
            <label class=" form-control-label">Address</label>
        </div>
        <div class="col col-md-1">
            :
        </div>
        <div class="col-sm-9 col-md-9">
            <p class="form-control-static">
                <?= $q['alamat']?> No.
                    <?= $q['no_rumah']?>
                        <?= $q['rt']?>/
                            <?= $q['rw']?> Kel.
                                <?= $q['kelurahan']?> Kec.
                                    <?= $q['kecamatan']?>
                                        <?= $q['kota']?>
                                            <?= $q['kode_pos']?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card-body">
                <div class="default-tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-Area-tab" data-toggle="tab" href="#nav-Area" role="tab" aria-controls="nav-Area" aria-selected="true">Area</a>

                            <a class="nav-item nav-link" id="nav-Group-tab" data-toggle="tab" href="#nav-Group" role="tab" aria-controls="nav-Group" aria-selected="false">Group</a>

                            <a class="nav-item nav-link" id="nav-Job-tab" data-toggle="tab" href="#nav-Job" role="tab" aria-controls="nav-Job" aria-selected="false">Job</a>

                            <a class="nav-item nav-link" id="nav-Company-tab" data-toggle="tab" href="#nav-Company" role="tab" aria-controls="nav-Company" aria-selected="false">Company</a>

                            <a class="nav-item nav-link" id="nav-Level-tab" data-toggle="tab" href="#nav-Level" role="tab" aria-controls="nav-Level" aria-selected="false">Level</a>

                            <a class="nav-item nav-link" id="nav-Position-tab" data-toggle="tab" href="#nav-Position" role="tab" aria-controls="nav-Position" aria-selected="false">Position</a>

                            <a class="nav-item nav-link" id="nav-Unit-tab" data-toggle="tab" href="#nav-Unit" role="tab" aria-controls="nav-Unit" aria-selected="false">Unit</a>

                            <a class="nav-item nav-link" id="nav-Program-tab" data-toggle="tab" href="#nav-Program" role="tab" aria-controls="nav-Program" aria-selected="false">Program</a>
                        </div>
                    </nav>
                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-Area" role="tabpanel" aria-labelledby="nav-Area-tab">
                            <select name="area" class="form-control" disabled="">
                                <option value="">---- Choose Area ----</option>
                                <?php 
                                $qa = mysql_query("SELECT * FROM m_area")or die(mysql_error());
                                while ($a = mysql_fetch_array($qa)) {?>
                                <option value="<?= $a['kode_area']?>" <?php if($q[ 'kode_area']==$a[ 'kode_area'] ){echo "selected";}?> >
                                    <?= $a['deskripsi']?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="tab-pane fade" id="nav-Group" role="tabpanel" aria-labelledby="nav-Group-tab">
                            <div class="input-group">
                                <select name="group" class="form-control" disabled="">
                                    <option value="">---- Choose Group ----</option>
                                    <?php 
                                    $qg = mysql_query("SELECT * FROM m_grup")or die(mysql_error());
                                    while ($g = mysql_fetch_array($qg)) {?>
                                    <option value="<?= $g['kode_grup']?>" <?php if($q[ 'kode_grup']==$g[ 'kode_grup'] ){echo "selected";}?>>
                                        <?= $g['nama_grup']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-Job" role="tabpanel" aria-labelledby="nav-Job-tab">
                            <div class="input-group">
                                <select name="job" class="form-control" disabled="">
                                    <option value="">---- Choose Job ----</option>
                                    <?php 
                                    $qj = mysql_query("SELECT * FROM m_pekerjaan")or die(mysql_error());
                                    while ($j = mysql_fetch_array($qj)) {?>
                                    <option value="<?= $j['kode_pekerjaan']?>" <?php if($q[ 'kode_pekerjaan']==$j[ 'kode_pekerjaan'] ){echo "selected";}?>>
                                        <?= $j['nama_pekerjaan']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-Company" role="tabpanel" aria-labelledby="nav-Company-tab">
                            <div class="input-group">
                                <select name="company" class="form-control" disabled="">
                                    <option value="">---- Choose Company ----</option>
                                    <?php 
                                    $qc = mysql_query("SELECT * FROM m_perusahaan")or die(mysql_error());
                                    while ($c = mysql_fetch_array($qc)) {?>
                                    <option value="<?= $c['kode_perusahaan']?>" <?php if($q[ 'kode_perusahaan']==$c[ 'kode_perusahaan'] ){echo "selected";}?> >
                                        <?= $c['nama_perusahaan']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-Level" role="tabpanel" aria-labelledby="nav-Level-tab">
                            <div class="input-group">
                                <select name="level" class="form-control" disabled="">
                                    <option value="">---- Choose Level ----</option>
                                    <?php 
                                    $qt = mysql_query("SELECT * FROM m_tingkat")or die(mysql_error());
                                    while ($t = mysql_fetch_array($qt)) {?>
                                    <option value="<?= $t['kode_tingkat']?>" <?php if($q[ 'kode_tingkat']==$t[ 'kode_tingkat'] ){echo "selected";}?> >
                                        <?= $t['nama_tingkat']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-Position" role="tabpanel" aria-labelledby="nav-Position-tab">
                            <div class="input-group">
                                <select name="position" class="form-control" disabled="">
                                    <option value="">---- Choose Position ----</option>
                                    <?php 
                                    $qm = mysql_query("SELECT * FROM m_posisi")or die(mysql_error());
                                    while ($m = mysql_fetch_array($qm)) {?>
                                    <option value="<?= $m['kode_posisi']?>" <?php if($q[ 'kode_posisi']==$m[ 'kode_posisi'] ){echo "selected";}?> >
                                        <?= $m['grade_posisi']." - ". $m['nama_posisi']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        

                        <div class="tab-pane fade" id="nav-Unit" role="tabpanel" aria-labelledby="nav-Unit-tab">
                            <div class="input-group">
                                <select name="unit" class="form-control" disabled="">
                                    <option value="">---- Choose Unit ----</option>
                                    <?php 
                                    $qu = mysql_query("SELECT * FROM m_unit")or die(mysql_error());
                                    while ($u = mysql_fetch_array($qu)) {?>
                                    <option value="<?= $u['kode_unit']?>" <?php if($q[ 'kode_unit']==$u[ 'kode_unit'] ){echo "selected";}?> >
                                        <?= $u['nama_unit']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-Program" role="tabpanel" aria-labelledby="nav-Program-tab">
                            <div class="input-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <?php 
                                        $ni = $q['nik'];
                                        $qu = mysql_query("SELECT * FROM program_karyawan JOIN m_program ON m_program.kode_program = program_karyawan.kode_program WHERE program_karyawan.nik = '$ni' GROUP BY program_karyawan.kode_program")or die(mysql_error());
                                        if (mysql_num_rows($qu) == 0) {?>           
                                            <div class="alert alert-danger" role="alert">
                                                No Program Selected! <a href="add_employee_program" style="font-weight: bold;">Add Program Here</a>
                                            </div><br>
                                        <?php }else{  
                                            while ($u = mysql_fetch_array($qu)) {?>
                                                <div class="col-sm-6">
                                                    <div class="card" style="width: 350px">
                                                        <?php 
                                                        if ($u['image'] != '') {?>
                                                            <img class="card-img-top" src="../assets/images/upload/<?= $u['image']?>" style='width: 350px; height: 200px;' alt="<?= $u['image']?>">
                                                        <?php }else {?>
                                                            <img class="card-img-top" src="../assets/images/upload/kosong.png" alt="Image Unavailable" style='width: 350px; height: 200px;'>
                                                        <?php }?>
                                                        
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= $u['nama_program'] ?></h5>
                                                            <p class="card-text"><?= $u['kode_program']?></p>
                                                            <p class="card-text">
                                                                <?= substr($u['deskripsi'], 0, 30); ?>...</p>
                                                            <form action="program_details" method="post">
                                                                <input style="display: none" type="checkbox" name="check" checked>
                                                                <input type="hidden" name="kode_program" value="<?= $u['kode_program']?>">
                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-eye">Details</i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } 
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>