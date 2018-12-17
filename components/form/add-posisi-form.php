<form action="../admin/controllers/config/p_tambah_posisi.php" method="post">
    <div class="col-sm-12">
        <label>Level <a class="required">*</a></label>
        <div class="input-group nik">
            <select name="level" id="employee" class="standardSelect form-control" tabindex="1" required="">
                <option value="0">--- Choose Level ---</option>
                <?php 
                $qn = mysql_query("SELECT * FROM m_tingkat");
                while ($row = mysql_fetch_array($qn)) {    
                    echo '<option value="' . $row['kode_tingkat'] . '">'. $row['kode_tingkat'] .' - '.$row['nama_tingkat'].'</option>';       
                }      
                ?>    
            </select>
        </div>
        <br>
        <label>Positon Code <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_posisi" placeholder="ext : ASTKBN" class="form-control" required>
            <div class="input-group-addon "><i class="fa fa-code"></i></div>
        </div>
        <br>
        <label>Position <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="posisi" placeholder="ext : ASISTEN KEBUN" class="form-control" required>
            <div class="input-group-addon"><i class="fa fa-bar-chart-o"></i></div>
        </div>
        <br>
        <label>Grade Code <a class="required">*</a></label>
        <div class="input-group">
            <input type="text" name="kode_grade" placeholder="ex: 4A / 1A / 3A" class="form-control" required>
            <div class="input-group-addon"><i class="fa fa-bar-chart-o"></i></div>
        </div>
        <br>
        <label>Description <a class="required">*</a></label>
        <div class="input-group">
            <textarea type="text" name="desc" class="form-control" required=""></textarea>
        </div>
        <br>
        <input style="display: none" type="checkbox" name="check" checked>
        <button class="btn float-right" type="submit" name="tambah">Simpan</button>
    </div>
</form>