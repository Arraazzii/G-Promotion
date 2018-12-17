<?php 
if (isset($_SESSION['kode_user'])) {
    $kode = $_SESSION['kode_user'];
    $edit = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'area' AND m_role.edit = 1 AND user.kode_user = '$kode'") or die(mysql_error());
}
?>
<form action="../admin/controllers/config/p_edit_employee_program.php" method="post">
    <div class="col-sm-12">
        <label>NIK <a class="required">*</a></label>
        <div class="input-group">
            <select data-placeholder="Choose Employee..." name="nik" class="standardSelect form-control" tabindex="1" onchange="changeValue(this.value)">
                <option value="<?= $q['nik'] ?>">
                    <?= $q['nik'] ?>
                </option>
            </select>
        </div>
        <br>
        <label>Name</label>
        <div class="input-group">
            <input type="text" name="name" id="nm" value="<?= $q['nama_depan']." ".$q['nama_belakang'] ?>" placeholder="Name" class="form-control" readonly>
            <div class="input-group-addon "><i class="fa fa-user"></i></div>
        </div>
        <br>
        <div class="row">
            <?php
                $nik = $q['nik'];
                $qp = mysql_query("SELECT * FROM program_karyawan WHERE program_karyawan.nik = '$nik' GROUP BY program_karyawan.kode_program  ") or die(mysql_error());;
                while ($p = mysql_fetch_array($qp)) {?>
                <div class="col-sm-8">
                    <label>Program</label>
                    <select id="1" name="program[]" class="form-control selectClass">
                        <?php 
                            $qt = mysql_query("SELECT * FROM m_program")or die(mysql_error());
                            while ($t = mysql_fetch_array($qt)) {?>
                        <option value="<?= $t['kode_program']?>" <?php if($q[ 'kode_program']==$t[ 'kode_program'] ){echo "selected";}?> >
                            <?= $t['nama_program']?>
                        </option>
                        <?php } ?>
                    </select>
                    <br>
                </div>
                <div class="col-sm-2">
                    <br>
                    <input type="text" name="master" class="master" id="master" value="Employee Program" hidden>
                    <input type="text" name="kode" class="kode" id="kode" value="16" hidden>
                    <button type="button" class="btn btn-outline-danger" onclick="hapus(<?= $p['id_program'] ?>)"><i class="fa fa-eraser">Hapus</i></button>
                </div>
                <?php }
            ?>
        </div>
        <br>
        <div id="education_fields">
        </div>
        <br>
        <br>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
        <input type="hidden" name="status" value="1">
        <button class="btn btn-success float-left" type="button" onclick="education_fields();" style="margin-top: 30px">Add Program</button>
        <?php 
            if (isset($_SESSION['kode_user'])) {
                if (mysql_num_rows($edit) >= 1 ) {?>
        <button class="btn float-right" type="submit " name="tambah">Save</button>
        <?php   }
            }else{?>
        <button class="btn float-right" type="submit " name="tambah">Save</button>
        <?php    }  ?>
    </div>
</form>
<!-- <script
  src="https://code.jquery.com/jquery-1.4.3.js"
  integrity="sha256-DjMDo6DOyV68jDzD4Z/HHJlIf6ooawXQGj64zKTZC8c="
  crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/ui/1.8.5/jquery-ui.js"
  integrity="sha256-1hMuPkMyCgD9Q1gtvSZDgl5AqQSraMIf43UjIemhF7I="
  crossorigin="anonymous"></script>
<script type="text/javascript">
var $select = $("select");
$select.on("change", function() {
    var selected = [];  
    $.each($select, function(index, select) {           
        if (select.value !== "") { selected.push(select.value); }
    });         
   $("option").prop("disabled", false);         
   for (var index in selected) { $('option[value="'+selected[index]+'"]').prop("disabled", true); }
});
</script> -->
<script>
var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="row">            <div class="col-sm-11">                <label>Program</label>                <select id="2" onchange="cek()" name="program[]" class="form-control">                    <option value="0">                        ---Choose Program---                    </option>                    <?php 
    $qu = mysql_query("SELECT * FROM m_program") or die(mysql_error());
    while ($u = mysql_fetch_array($qu)) { ?> <option id="program-new"        value="<?= $u['kode_program']?>"> <?= $u['nama_program']?> </option>                    <?php } ?>                </select > </div>            <div class="col-sm-1">                <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');" style="margin-top: 30px">-</button> </div>        </div> <br> ';

        objTo.appendChild(divtest)

    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script>