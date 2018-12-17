<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<form action="../admin/controllers/config/p_tambah_employee_point.php" method="post">
    <div class="col-sm-12">
        <label>NIK <a class="required">*</a></label>
        <div class="input-group nik">
            <select name="nik" id="employee" class="standardSelect form-control" tabindex="1" onchange="changeValue(this.value)" required="">
                <option value="0">--- Choose NIK ---</option>
                <?php 
                $qn = mysql_query("SELECT * FROM mt_employee JOIN master ON master.nik = mt_employee.nik");
                $jsArray1 = "var mtK = new Array();\n"; 
                while ($row = mysql_fetch_array($qn)) {    
                    $year = date('Y', strtotime($row['enterprise_begin']));
                    echo '<option value="' . $row['nik'] . '">'. $row['nik'] .' - '.$row['nama_depan'] .' '. $row['nama_belakang']. '</option>';    

                    $jsArray1 .= "mtK['" . $row['nik'] . "'] = {nama:'" . addslashes($row['nama_depan']." ".$row['nama_belakang'] ) . "',tahun:'" . addslashes($year ) . "'};\n";    
                }      
                ?>    
            </select>
        </div>
        <br>
        <div class="row tahun">
            <div class="col-sm-4 ">
                <label>Tahun</label>
                <div class="input-group">
                    <select name="year" class="standardSelect form-control" id="tahun" onchange="changeValueNilai(this.value)">
                        <option value="0" hidden>
                            --- Choose Year ---
                        </option>
                        <?php 
                            $qt = mysql_query("SELECT * FROM m_penilaian");
                            $jsArray2 = "var mP = new Array();\n"; 
                            while ($t = mysql_fetch_array($qt)) {    
                                echo '<option value="' . $t['tahun'] . '">' . $t['tahun'] . '</option>';    

                                $jsArray2 .= "mP['" . $t['tahun'] . "'] = {a:'" . addslashes($t['a'] ) . "',b:'" . addslashes($t['b'] ) . "',c:'" . addslashes($t['c'] ) . "',d:'" . addslashes($t['d'] ) . "'};\n";    
                                 
                            ?> 

                        <?php } ?>
                        
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <label>Name</label>
                <div class="input-group">
                    <input type="text" name="name" id="nm" placeholder="Name" class="form-control" readonly="" required="">
                    <div class="input-group-addon "><i class="fa fa-user"></i></div>
                </div>
            </div>
            <div class="col-sm-4">
                <label>Enterprise Begin - Year</label>
                <div class="input-group">
                    <input type="text" name="begin" id="year" placeholder="Enterprise Begin" class="form-control" readonly="" required="">
                    <div class="input-group-addon "><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="row funkyradio">
            <div class="col-sm-3 funkyradio-success">
                <input type="radio" name="point" id="a" />
                <label for="a">A (<span id="a1" style="font-weight: bold;"></span>Point)</label>
                
            </div>
            <div class="col-sm-3 funkyradio-success">
                <input type="radio" name="point" id="b" />
                <label for="b">B (<span id="b1" style="font-weight: bold;"></span>Point)</label>
            </div>
            <div class="col-sm-3 funkyradio-success">
                <input type="radio" name="point" id="c" />
                <label for="c">C (<span id="c1" style="font-weight: bold;"></span>Point)</label>
            </div>
            <div class="col-sm-3 funkyradio-success">
                <input type="radio" name="point" id="d" />
                <label for="d">D (<span id="d1" style="font-weight: bold;"></span>Point)</label>
            </div>
        </div>
        <br>
        <br>
        <br>
        <input type="text" name="grade" id="grade" hidden="" >
        <input style="display: none" type="checkbox" name="check" checked>
        <input type="hidden" name="status" value="1">
        <button class="btn float-right" type="submit" id="save" name="tambah">Save</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $('.tahun').hide();
        $('.funkyradio').hide();
        $('#save').hide();
        $("input[type=radio]").change(function(){
            $('#save').show();
        });
    });
</script>
<script type="text/javascript">    
    <?php echo $jsArray1; ?>  
    function changeValue(nik){  
        document.getElementById('nm').value = mtK[nik].nama;  
        document.getElementById('year').value = mtK[nik].tahun;  
        var year = $('#year').val();
        if (year.length > 0) {
            $('.tahun').show();
        };
    }; 
    
</script> 
<script type="text/javascript">
    <?php echo $jsArray2; ?>  
    function changeValueNilai(tahun){  
        document.getElementById('a').value = mP[tahun].a;
        document.getElementById('b').value = mP[tahun].b;
        document.getElementById('c').value = mP[tahun].c;
        document.getElementById('d').value = mP[tahun].d; 
        document.getElementById('a1').innerHTML  = mP[tahun].a + ' ';
        document.getElementById('b1').innerHTML  = mP[tahun].b + ' ';
        document.getElementById('c1').innerHTML  = mP[tahun].c + ' ';
        document.getElementById('d1').innerHTML  = mP[tahun].d + ' ';  

        var year = $("#tahun option:selected").val();
        var enter = $("#year").val();
        if (year < enter){
            alert("Must be more then " + enter ) ;
            return false;
        }else{
            $('.funkyradio').show();
            return true;
        } 
        
    }; 
</script>
<script>
    $(function() {  
        $("button[type='submit']").click(function(){
            var check = true;
            $("input:radio").each(function(){
                var name = $(this).attr("name");
                if($("input:radio[name="+name+"]:checked").length == 0){
                    check = false;
                }
            });
     
            if(check){
                return true;
            }else{
                alert('Please select at least one answer in each question.');
                return false;
            }
        });
    });
</script>

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
