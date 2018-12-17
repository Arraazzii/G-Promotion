    <form name="sign_in_form" id="sign_in_form" action="../admin/controllers/config/p_edit_user.php"" method="post">
        
        <p style="color: red; text-align: left;">Untuk melihat Authorization Role klik menu <b>Master Role</b></p>

        <?php 
            // $q0 = mysql_fetch_array(mysql_query("SELECT * FROM user_role WHERE kode_user='$kode'")) or die(mysql_error());
            // $role = $q0['akses_role'];
            // $array =  explode(',', $role);
            // print_r($array);
        ?>
        <label>Pilih Role</label>
        <select name="role[]" id="role" multiple class="standardSelect select" required=""> 
            <?php 
            

            $q = mysql_query("SELECT * FROM m_role GROUP BY kode_role");
            while ($d = mysql_fetch_array($q)) {
                foreach ($array as $item){ ?>
                    <option value="<?= $d['kode_role'] ?>" <?php if($item == $d['kode_role']  ){echo "selected";}else{echo "id='role' class='selected'"; } ?>>
                            <?= $d['kode_role'] ?>
                    </option>
                
            <?php } }?>
        </select>
        
        <br><br>
        <input type="text" name="status" class="form-control" value="<?= $status?>" required readonly >
        <label>Kode User</label>
        <input type="text" name="kode_user" class="form-control" value="<?= $kode?>" required readonly >
        <br>
        <label>Nama User</label>
        <input type="text" name="nama" class="form-control" value="<?= $nama?>" required >
        <br>
        <label>Username</label>
        <input type="text" name="username" class="form-control" required="" value="<?= $username ?>" readonly>
        <br>
        <label>Password</label>
        <input type="password" name="password" class="form-control" required="" value="<?= $password ?>">
        <br>
        <button class="btn" type="submit" name="tambah">Simpan</button>
        <input type="checkbox" name="" checked="" hidden="">
    </form>
    <script src="../assets/js/ext/2.1.1-jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("select option:selected").each(function (){
                $(this).siblings("[value=" + this.value + "]").remove();
            });
            $("select option:not(:selected)").each(function (){
                $(this).siblings("[value=" + this.value + "]").remove();
            });
        });
    </script>
    