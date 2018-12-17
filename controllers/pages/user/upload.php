<div class="card" style="margin: 15px">
    <div class="card-header bg-flat-color-5">
        <h3 class="text-white"><strong>Upload Data</strong></h3>
    </div>
    <div class="card-body">
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" role="alert">
             <h3 class="alert-heading">Read Me First!</h3>
             <p>Only XLS files (Excel 2003) are allowed to upload</p>
             <hr>
             <p class="mb-0">How to change xls extentions?<a href="https://support.office.com/en-us/article/save-a-workbook-in-another-file-format-6a16c862-4a36-48f9-a300-c2ca0065286e" target="_blank">&nbsp;<u>Here!</u></a></p>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
    </div>
    <div class="card-body">
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-1 text-light">
                <div class="card-body">
                    <div class="h4 m-0">Employee Master</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">
                        <form method="post" onsubmit="return validateForm1()"  action="../../components/upload/master.php" method="post" enctype="multipart/form-data">
                            Choose File <input type="file" id="master" name="master" required="">
                            <hr>
                            <input type="checkbox" checked="" hidden="">
                            <label><input type="checkbox" name="drop" value="1" /> <u>Clear the Table First.</u> </label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" name="master">Upload</button>
                            <a href="../../components/template/master.xls" download style="color: white;">Download Template</a>
                        </form>
                    </small>
                </div>
            </div>
        </div><!--/.col-->

        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-5 text-light">
                <div class="card-body">
                    <div class="h4 m-0">Master Point (/year)</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">
                        <form method="post" onsubmit="return validateForm2()"  action="../../components/upload/master_point.php" method="post" enctype="multipart/form-data">
                            Choose File <input type="file" id="point" name="point" required="">
                            <hr>
                            <input type="checkbox" checked="" hidden="">
                            <label><input type="checkbox" name="drop" value="1" /> <u>Clear the Table First.</u> </label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" name="point">Upload</button>
                            <a href="../../components/template/point.xls" download style="color: white;">Download Template</a>
                        </form>
                        
                    </small>
                </div>
            </div>
        </div><!--/.col-->

    </div>

    <hr>

    <div class="card-body">
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-5 text-light">
                <div class="card-body">
                    <div class="h4 m-0">Master Area</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">
                        <form method="post" onsubmit="return validateForm3()" action="../../components/upload/master_area.php" enctype="multipart/form-data">
                            Choose File <input type="file" id="area" name="area" required="">
                            <hr>
                            <input type="checkbox" checked="" hidden="">
                            <label><input type="checkbox" name="drop" value="1" /> <u>Clear the Table First.</u> </label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" name="area">Upload</button>
                            <a href="../../components/template/area.xls" download style="color: white;">Download Template</a>
                        </form>
                        
                    </small>
                </div>
            </div>
        </div><!--/.col-->

        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-4 text-light">
                <div class="card-body">
                    <div class="h4 m-0">Master Group</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">
                        <form method="post" onsubmit="return validateForm4()"  action="../../components/upload/master_group.php" method="post" enctype="multipart/form-data">
                            Choose File <input type="file" id="group" name="group" required="">
                            <hr>
                            <input type="checkbox" checked="" hidden="">
                            <label><input type="checkbox" name="drop" value="1" /> <u>Clear the Table First.</u> </label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" name="group">Upload</button>
                            <a href="../../components/template/group.xls" download style="color: white;">Download Template</a>
                        </form>
                        
                    </small>
                </div>
            </div>
        </div><!--/.col-->
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-3 text-light">
                <div class="card-body">
                    <div class="h4 m-0">Master Jobs</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">
                        <form method="post" onsubmit="return validateForm5()"  action="../../components/upload/master_job.php" method="post" enctype="multipart/form-data">
                            Choose File <input type="file" id="job" name="job" required="">
                            <hr>
                            <input type="checkbox" checked="" hidden="">
                            <label><input type="checkbox" name="drop" value="1" /> <u>Clear the Table First.</u> </label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" name="job">Upload</button>
                            <a href="../../components/template/job.xls" download style="color: white;">Download Template</a>
                        </form>
                        
                    </small>
                </div>
            </div>
        </div><!--/.col-->

        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-2 text-light">
                <div class="card-body">
                    <div class="h4 m-0">Master Company</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">
                        <form method="post" onsubmit="return validateForm6()"  action="../../components/upload/master_company.php" method="post" enctype="multipart/form-data">
                            Choose File <input type="file" id="company" name="company" required="">
                            <hr>
                            <input type="checkbox" checked="" hidden="">
                            <label><input type="checkbox" name="drop" value="1" /> <u>Clear the Table First.</u> </label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" name="company">Upload</button>
                            <a href="../../components/template/company.xls" download style="color: white;">Download Template</a>
                        </form>
                        
                    </small>
                </div>
            </div>
        </div><!--/.col-->
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-4 text-light">
                <div class="card-body">
                    <div class="h4 m-0">Master Position</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">
                        <form method="post" onsubmit="return validateForm7()"  action="../../components/upload/master_position.php" method="post" enctype="multipart/form-data">
                            Choose File <input type="file" id="position" name="position" required="">
                            <hr>
                            <input type="checkbox" checked="" hidden="">
                            <label><input type="checkbox" name="drop" value="1" /> <u>Clear the Table First.</u> </label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" name="position">Upload</button>
                            <a href="../../components/template/position.xls" download style="color: white;">Download Template</a>
                        </form>
                        
                    </small>
                </div>
            </div>
        </div><!--/.col-->

        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-3 text-light">
                <div class="card-body">
                    <div class="h4 m-0">Master Program</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">
                        <form method="post" onsubmit="return validateForm8()"  action="../../components/upload/master_program.php" method="post" enctype="multipart/form-data">
                            Choose File <input type="file" id="program" name="program" required="">
                            <hr>
                            <input type="checkbox" checked="" hidden="">
                            <label><input type="checkbox" name="drop" value="1" /> <u>Clear the Table First.</u> </label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" name="program">Upload</button>
                            <a href="../../components/template/program.xls" download style="color: white;">Download Template</a>
                        </form>
                        
                    </small>
                </div>
            </div>
        </div><!--/.col-->
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-2 text-light">
                <div class="card-body">
                    <div class="h4 m-0">Master Level</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">
                        <form method="post" onsubmit="return validateForm9()"  action="../../components/upload/master_level.php" method="post" enctype="multipart/form-data">
                            Choose File <input type="file" id="level" name="level" required="">
                            <hr>
                            <input type="checkbox" checked="" hidden="">
                            <label><input type="checkbox" name="drop" value="1" /> <u>Clear the Table First.</u> </label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" name="level">Upload</button>
                            <a href="../../components/template/level.xls" download style="color: white;">Download Template</a>
                        </form>
                        
                    </small>
                </div>
            </div>
        </div><!--/.col-->

        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-5 text-light">
                <div class="card-body">
                    <div class="h4 m-0">Master Unit</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">
                        <form method="post" onsubmit="return validateForm10()"  action="../../components/upload/master_unit.php" method="post" enctype="multipart/form-data">
                            Choose File <input type="file" id="unit" name="unit" required="">
                            <hr>
                            <input type="checkbox" checked="" hidden="">
                            <label><input type="checkbox" name="drop" value="1" /> <u>Clear the Table First.</u> </label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" name="unit">Upload</button>
                            <a href="../../components/template/unit.xls" download style="color: white;">Download Template</a>
                        </form>
                        
                    </small>
                </div>
            </div>
        </div><!--/.col-->
    </div>
</div>


<script type="text/javascript">
    function validateForm1()
    {
        if (confirm('Please for nothing duplicate data')) {
            function hasExtension(inputID, exts) {
                var fileName = document.getElementById(inputID).value;
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
            }
     
            if(!hasExtension('master', ['.xls'])){
                alert("Only XLS files (Excel 2003) are allowed.");
                return false;
            }
        }else{
            return false;
        }
    }
</script>
<script type="text/javascript">
    function validateForm2()
    {
        if (confirm('Please for nothing duplicate data')) {
            function hasExtension(inputID, exts) {
                var fileName = document.getElementById(inputID).value;
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
            }
     
            if(!hasExtension('point', ['.xls'])){
                alert("Only XLS files (Excel 2003) are allowed.");
                return false;
            }
        }else{
            return false;
        }
    }
</script>
<script type="text/javascript">
    function validateForm3()
    {
        if (confirm('Please for nothing duplicate data')) {
            function hasExtension(inputID, exts) {
                var fileName = document.getElementById(inputID).value;
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
            }
     
            if(!hasExtension('area', ['.xls'])){
                alert("Only XLS files (Excel 2003) are allowed.");
                return false;
            }
        }else{
            return false;
        }
        
    }
</script>
<script type="text/javascript">
    function validateForm4()
    {
        if (confirm('Please for nothing duplicate data')) {
            function hasExtension(inputID, exts) {
                var fileName = document.getElementById(inputID).value;
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
            }
     
            if(!hasExtension('group', ['.xls'])){
                alert("Only XLS files (Excel 2003) are allowed.");
                return false;
            }
        }else{
            return false;
        }
    }
</script>
<script type="text/javascript">
    function validateForm5()
    {
        if (confirm('Please for nothing duplicate data')) {
            function hasExtension(inputID, exts) {
                var fileName = document.getElementById(inputID).value;
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
            }
     
            if(!hasExtension('job', ['.xls'])){
                alert("Only XLS files (Excel 2003) are allowed.");
                return false;
            }
        }else{
            return false;
        }
    }
</script>
<script type="text/javascript">
    function validateForm6()
    {
        if (confirm('Please for nothing duplicate data')) {
            function hasExtension(inputID, exts) {
                var fileName = document.getElementById(inputID).value;
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
            }
     
            if(!hasExtension('company', ['.xls'])){
                alert("Only XLS files (Excel 2003) are allowed.");
                return false;
            }
        }else{
            return false;
        }
    }
</script>
<script type="text/javascript">
    function validateForm7()
    {
        if (confirm('Please for nothing duplicate data')) {
            function hasExtension(inputID, exts) {
                var fileName = document.getElementById(inputID).value;
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
            }
     
            if(!hasExtension('position', ['.xls'])){
                alert("Only XLS files (Excel 2003) are allowed.");
                return false;
            }
        }else{
            return false;
        }
    }
</script>
<script type="text/javascript">
    function validateForm8()
    {
        if (confirm('Please for nothing duplicate data')) {
            function hasExtension(inputID, exts) {
                var fileName = document.getElementById(inputID).value;
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
            }
     
            if(!hasExtension('program', ['.xls'])){
                alert("Only XLS files (Excel 2003) are allowed.");
                return false;
            }
        }else{
            return false;
        }
    }
</script>
<script type="text/javascript">
    function validateForm9()
    {
        if (confirm('Please for nothing duplicate data')) {
            function hasExtension(inputID, exts) {
                var fileName = document.getElementById(inputID).value;
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
            }
     
            if(!hasExtension('level', ['.xls'])){
                alert("Only XLS files (Excel 2003) are allowed.");
                return false;
            }
        }else{
            return false;
        }
    }
</script>
<script type="text/javascript">
    function validateForm10()
    {
        if (confirm('Please for nothing duplicate data')) {
            function hasExtension(inputID, exts) {
                var fileName = document.getElementById(inputID).value;
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
            }
     
            if(!hasExtension('unit', ['.xls'])){
                alert("Only XLS files (Excel 2003) are allowed.");
                return false;
            }
        }else{
            return false;
        }
    }
</script>