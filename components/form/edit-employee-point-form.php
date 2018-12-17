<?php 
if (isset($_SESSION['kode_user'])) {
    $kode = $_SESSION['kode_user'];
    
    $edit = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'area' AND m_role.edit = 1 AND user.kode_user = '$kode'") or die(mysql_error());
    }
?>
<form action="../admin/controllers/config/p_edit_employee_point.php" method="post">
    <div class="col-sm-12">
        <label>Tahun</label>
        <div class="input-group">
            <select name="year" class="form-control" onchange="changeValue(this.value)">
                <?php 
                    $t = mysql_fetch_array(mysql_query("SELECT * FROM m_penilaian JOIN employee_penilaian ON employee_penilaian.tahun = m_penilaian.tahun WHERE employee_penilaian.nik = '".$q['nik']."' AND employee_penilaian.tahun = '".$q['tahun']."'"));
                    // while ($t = $qt)) {  ?>  
                    <option value="<?= $t['tahun']?>" > <?= $t['tahun']?>    

                <?php  ?>

                
            </select>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <label>NIK<a class="required">*</a></label>
                <div class="input-group">
                    <input type="number" name="nik" placeholder="NIK" class="form-control" value="<?= $q['nik']?>" required readonly>
                    <div class="input-group-addon "><i class="fa fa-code"></i></div>
                </div>
            </div>
            <div class="col-sm-8">
                <label>Name</label>
                <div class="input-group">
                    <input type="text" name="name" placeholder="Name" class="form-control" value="<?= $q['nama_depan'].' '.$q['nama_belakang']?>" readonly>
                    <div class="input-group-addon "><i class="fa fa-user"></i></div>
                </div>
            </div>
        </div>
        <div class="row funkyradio">
            <div class="col-sm-3 funkyradio-success">
                <input type="radio" name="point" id="a" value="<?= $t['a'] ?>" <?php if($t['a'] == $q['nilai']){echo "checked";} ?> />
                <label for="a">A (<span id="a1" style="font-weight: bold;"><?= $t['a'] ?></span> Point)</label>
            </div>
            <div class="col-sm-3 funkyradio-success">
                <input type="radio" name="point" id="b" value="<?= $t['b'] ?>"  <?php if($t['b'] == $q['nilai']){echo "checked";} ?>/>
                <label for="b">B (<span id="b1" style="font-weight: bold;"><?= $t['b'] ?></span> Point)</label>
            </div>
            <div class="col-sm-3 funkyradio-success">
                <input type="radio" name="point" id="c" value="<?= $t['c'] ?>"  <?php if($t['c'] == $q['nilai']){echo "checked";} ?> />
                <label for="c">C (<span id="c1" style="font-weight: bold;"><?= $t['c'] ?></span> Point)</label>
            </div>
            <div class="col-sm-3 funkyradio-success">
                <input type="radio" name="point" id="d" value="<?= $t['d'] ?>"  <?php if($t['d'] == $q['nilai']){echo "checked";} ?> />
                <label for="d">D (<span id="d1" style="font-weight: bold;"><?= $t['d'] ?></span> Point)</label>
            </div>
        </div>
        <br>
        <br>
        <br>
        <input type="text" name="grade" id="grade" value="<?= $t['grade']?>" hidden>
        <input style="display: none" type="checkbox" name="check" checked>
        <?php 
            if (isset($_SESSION['kode_user'])) {
                if (mysql_num_rows($edit) >= 1 ) {?>
                <button class="btn float-right" type="submit " name="tambah">Save</button>
        <?php   }
            } else { ?>
                <button class="btn float-right" type="submit " name="tambah">Save</button>
        <?php } ?>  
    </div>
</form>

<script src="../assets/js/ext/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('input[type="radio"]').click(function(){
            if ($('#a').is(':checked')){
                $('#grade').val('A');
            }else if ($('#b').is(':checked')){
                $('#grade').val('B');
            }else if ($('#c').is(':checked')){
                $('#grade').val('C');
            }else if ($('#d').is(':checked')){
                $('#grade').val('D');
            }
        });
    });
</script>
<?php 
    if ($t['status'] == 0) {?>
       <script type="text/javascript">
            $(document).ready(function(){
                $("input[type=radio]").attr("disabled", "");
            });
        </script>
    <?php } 
?>