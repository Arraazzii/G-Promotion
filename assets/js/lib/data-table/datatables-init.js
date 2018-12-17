(function($) {
    "use strict";


    /*  Data Table
    -------------*/
    $('#bootstrap-data-table-area').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-area.php",
        columnDefs: [{
            "targets": 2,
            "data": 2,
            "mRender": function(data) {
                return "<form action='area_details' method='post'><input style='display: none' type='checkbox' name='check' checked><input type='hidden' name='kode_area' value='"+data+"'><button type='submit' class='btn btn-outline-success btn-sm'><i class='fa fa-eye'>View</i></button><input type='text' name='master' class='master' id='master' value='Area' hidden=''>                            <input type='text' name='kode' class='kode' id='kode' value='1' hidden>                            <button type='button' class='btn btn-outline-danger btn-sm' onclick='hapus("+data+")''><i class='fa fa-eraser'>Hapus</i></button>                        </form>";
            }
        }]
    });

    $('#bootstrap-data-table-group').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-group.php",
        columnDefs: [{
            "targets": 3,
            "data": 3,
            "mRender": function(data) {
                return "<form action='group_details' method='post'><input style='display: none' type='checkbox' name='check' checked><input type='hidden' name='kode_grup' value='"+data+"'><button type='submit' class='btn btn-outline-success btn-sm'><i class='fa fa-eye'>View</i></button><input type='text' name='master' class='master' id='master' value='Group' hidden=''>                            <input type='text' name='kode' class='kode' id='kode' value='2' hidden>                            <button type='button' class='btn btn-outline-danger btn-sm' onclick='hapus("+data+")''><i class='fa fa-eraser'>Hapus</i></button>                        </form>";
            }
        }]
    });

    $('#bootstrap-data-table-job').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-job.php",
        columnDefs: [{
            "targets": 3,
            "data": 3,
            "mRender": function(data) {
                return "<form action='job_details' method='post'><input style='display: none' type='checkbox' name='check' checked><input type='hidden' name='kode_pekerjaan' value='"+data+"'><button type='submit' class='btn btn-outline-success btn-sm'><i class='fa fa-eye'>View</i></button><input type='text' name='master' class='master' id='master' value='Job' hidden=''>                            <input type='text' name='kode' class='kode' id='kode' value='3' hidden>                            <button type='button' class='btn btn-outline-danger btn-sm' onclick='hapus("+data+")''><i class='fa fa-eraser'>Hapus</i></button>                        </form>";
            }
        }]
    });

    $('#bootstrap-data-table-company').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-company.php",
        columnDefs: [{
            "targets": 4,
            "data": 4,
            "mRender": function(data) {
                return "<form action='company_details' method='post'><input style='display: none' type='checkbox' name='check' checked><input type='hidden' name='kode_perusahaan' value='"+data+"'><button type='submit' class='btn btn-outline-success btn-sm'><i class='fa fa-eye'>View</i></button><input type='text' name='master' class='master' id='master' value='Company' hidden=''>                            <input type='text' name='kode' class='kode' id='kode' value='4' hidden>                            <button type='button' class='btn btn-outline-danger btn-sm' onclick='hapus("+data+")''><i class='fa fa-eraser'>Hapus</i></button>                        </form>";
            }
        }]
    });

    $('#bootstrap-data-table-point').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-point.php",
    });

    $('#bootstrap-data-table-position').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-position.php",
        columnDefs: [{
            "targets": 5,
            "data": 5,
            "mRender": function(data) {
                return "<form action='position_details' method='post'><input style='display: none' type='checkbox' name='check' checked><input type='hidden' name='kode_posisi' value='"+data+"'><button type='submit' class='btn btn-outline-success btn-sm'><i class='fa fa-eye'>View</i></button><input type='text' name='master' class='master' id='master' value='Position' hidden=''>                            <input type='text' name='kode' class='kode' id='kode' value='5' hidden>                            <button type='button' class='btn btn-outline-danger btn-sm' onclick='hapus("+data+")''><i class='fa fa-eraser'>Hapus</i></button>                        </form>";
            }
        }]
    });

    $('#bootstrap-data-table-program').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-program.php",
        columnDefs: [{
            "targets": 5,
            "data": 5,
            "mRender": function(data) {
                return "<form action='program_details' method='post'><input style='display: none' type='checkbox' name='check' checked><input type='hidden' name='kode_program' value='"+data+"'><button type='submit' class='btn btn-outline-success btn-sm'><i class='fa fa-eye'>View</i></button><input type='text' name='master' class='master' id='master' value='Program' hidden=''>                            <input type='text' name='kode' class='kode' id='kode' value='6' hidden>                            <button type='button' class='btn btn-outline-danger btn-sm' onclick='hapus("+data+")''><i class='fa fa-eraser'>Hapus</i></button>                        </form>";
            }
        }]
    });

    $('#bootstrap-data-table-role').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bbProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-role.php",
        columnDefs: [{
            "targets": 2,
            "data": 2,
            "mRender": function(data) {
                return "<form action='role_details' method='post'><input style='display: none' type='checkbox' name='check' checked><input type='hidden' name='kode_role' value='"+data+"'><button type='submit' class='btn btn-outline-success btn-sm'><i class='fa fa-eye'>View</i></button><input type='text' name='master' class='master' id='master' value='Role' hidden=''>                            <input type='text' name='kode' class='kode' id='kode' value='10' hidden>                            <button type='button' class='btn btn-outline-danger btn-sm' onclick='hapus("+data+")''><i class='fa fa-eraser'>Hapus</i></button>                        </form>";
            }
        }]
    });

    $('#bootstrap-data-table-level').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-level.php"
    });

    $('#bootstrap-data-table-unit').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-unit.php"
    });

    $('#bootstrap-data-table-user').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-user.php"
    });

    $('#bootstrap-data-table-employee').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        order: [
            [2, "asc"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-employee.php"
    });

    $('#bootstrap-data-table-employee-grade').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        order: [
            [2, "desc"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-employee.php"
    });

    $('#bootstrap-data-table-employee-program').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        order: [
            [2, "desc"]
        ],
        bProcessing: true,
        bServerSide: true,
        sAjaxSource: "../admin/controllers/config/data-employee-program.php"
    });

    $('#bootstrap-data-table-employee-promotion').DataTable({
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        order: [
            [3, "desc"]
        ],
    });

    $('#bootstrap-data-table-export').DataTable({
        dom: 'lBfrtip',
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    });

    $('#row-select').DataTable({

        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });







})(jQuery);