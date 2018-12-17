<form action="../admin/controllers/config/p_tambah_employee_program.php" method="post">
    <div class="col-sm-12">
        <label>NIK <a class="required">*</a></label>
        <div class="input-group">
            <select data-placeholder="Choose Employee..." name="nik" class="standardSelect form-control" tabindex="1" onchange="changeValue(this.value)">
                <option value="">--- Choose NIK ---</option>
                <?php 
                $qn = mysql_query("SELECT * FROM mt_employee");
                $jsArray1 = "var mtK = new Array();\n"; 
                while ($row = mysql_fetch_array($qn)) {    
                    echo '<option value="' . $row['nik'] . '">' . $row['nik'] .' - '.$row['nama_depan'] .' '. $row['nama_belakang'].'</option>';    

                    $jsArray1 .= "mtK['" . $row['nik'] . "'] = {nama:'" . addslashes($row['nama_depan']." ".$row['nama_belakang'] ) . "'};\n";    
                }      
                ?>
            </select>
        </div>
        <br>
        <label>Name</label>
        <div class="input-group">
            <input type="text" name="name" id="nm" placeholder="Name" class="form-control" readonly>
            <div class="input-group-addon "><i class="fa fa-user"></i></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-11">
                <label>Program</label>
                <select name="program[]" id="program" class="form-control">
                    <option value="0" hidden="">
                        ---Choose Program---
                    </option>
                    <?php 
                        $qu = mysql_query("SELECT * FROM m_program")or die(mysql_error());
                        while ($u = mysql_fetch_array($qu)) {?>
                        <option value="<?= $u['kode_program']?>">
                            <?= $u['nama_program']?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-success" type="button" onclick="education_fields();" style="margin-top: 30px">+</button>
            </div>
        </div><br>
        <div id="education_fields">
        </div>
        <br>
        <br>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
        <input type="hidden" name="status" value="1">
        <button class="btn float-right" type="submit" id="save" name="tambah">Save</button>
    </div>
</form>
<script src="../assets/js/ext/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#save').hide();
        $("#program").change(function(){
            $('#save').show();
        });
    });
</script>
<script type="text/javascript">    
    <?php echo $jsArray1; ?>  
    function changeValue(nik){  
        document.getElementById('nm').value = mtK[nik].nama;  
    }; 
    
</script> 
<script>
var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="row">            <div class="col-sm-11">                <label>Program</label>                <select name="program[]" class="form-control">                    <option value="0">                        ---Choose Program---                    </option>                    <?php 
                        $qu = mysql_query("SELECT * FROM m_program")or die(mysql_error());
                        while ($u = mysql_fetch_array($qu)) {?>                        <option value="<?= $u['kode_program']?>">                            <?= $u['nama_program']?>                        </option>                    <?php } ?>                </select>            </div>            <div class="col-sm-1">                <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');" style="margin-top: 30px">-</button>            </div>        </div><br>';

    objTo.appendChild(divtest)
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}
</script>

