<script type="text/javascript" src="../assets/js/ext/jquery-1.12.4.js"></script>
<script type="text/javascript" src="../assets/js/ext/jquery.dataTables.min.js"></script>
<script src="../assets/js/ext/jquery-2.1.0.js" integrity="sha256-D6d1KSapXjq2tfZ6Ie9AYozkRHyB3fT2ys9mO2+4Wvc=" crossorigin="anonymous"></script>
<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<script src="../assets/js/ext/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../assets/js/ext/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script><!-- 
<script src="../assets/js/ext/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/lib/data-table/datatables.min.js"></script>
<script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="../assets/js/lib/data-table/datatables-init.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/lib/chosen/chosen.jquery.min.js"></script>
<script src="../assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="../assets/js/dashboard.js"></script>
<script src="../assets/js/widgets.js"></script>
<script src="../assets/js/lib/vector-map/jquery.vmap.js"></script>
<script src="../assets/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="../assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="../assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>

<script type="text/javascript">
function hapus(id) {
    setTimeout(function() {
        var alamat = $('#alamat').val();
        var master = $('#master').val();
        var kode_master = $('#kode_master').val();
        swal({
            title: "Are you sure?",
            text: "Master " + master + "\nID : " + id + " It will be deleted permanently!",
            type: "warning",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!',
            cancelButtonText: 'Back',
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function() {
            setTimeout(function() {
                swal("Deleted", "Data Has been deleted ", "success");
                var kode = $('#kode').val();
                console.log("Event Called");
                jQuery.ajax({
                    type: 'POST',
                    url: '../admin/controllers/config/p_hapus.php',
                    data: 'id=' + id + '&kode=' + kode + '&alamat=' + alamat + '&kode_master=' + kode_master,
                    success: function(data) {
                        $("head").append('<meta http-equiv="refresh" content="0.8">');
                    }
                });
            }, 1000);

        });
    }, 10);
}
</script>
<script type="text/javascript">
function promote(id) {
    setTimeout(function() {
        var master = $('#master').val();
        swal({
            title: "Are you sure?",
            text: "Master " + master + "\nNIK : " + id + " It will be Promoted!",
            type: "info",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Promoted it!',
            cancelButtonText: 'Back',
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function() {
            setTimeout(function() {
                swal("Promoted", "Employee Has been Promoted ", "success");
                var kode = $('#kode').val();
                console.log("Event Called");
                jQuery.ajax({
                    type: 'POST',
                    url: '../admin/controllers/config/p_promotion.php',
                    data: 'id=' + id + '&kode=' + kode + '&alamat=' + alamat + '&kode_master=' + kode_master,
                    success: function(data) {
                        $("head").append('<meta http-equiv="refresh"  content="0.8;employee_grade">');
                    }
                });
            }, 1000);

        });
    }, 10);
}
</script>
<script>
jQuery(document).ready(function() {
    jQuery(".standardSelect").chosen({
        disable_search_threshold: 10,
        no_results_text: "Oops, nothing found!",
        width: "100%"
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("form").submit(function() {
        checked = $("input[type=checkbox]:checked").length;

        if (!checked) {
            alert("You must check at least one checkbox.");
            return false;
        } else {
            var this_master = $(this);

            this_master.find('input[type="checkbox"]').each(function() {
                var checkbox_this = $(this);


                if (checkbox_this.is(":checked") == true) {
                    checkbox_this.attr('value', '1');
                } else {
                    checkbox_this.prop('hidden', true);
                    checkbox_this.prop('checked', true);
                    checkbox_this.attr('value', '0');
                }
            });
        }
    });
});
</script>
<script>
(function($) {
    "use strict";

    jQuery('#vmap').vectorMap({
        map: 'world_en',
        backgroundColor: null,
        color: '#ffffff',
        hoverOpacity: 0.7,
        selectedColor: '#1de9b6',
        enableZoom: true,
        showTooltip: true,
        values: sample_data,
        scaleColors: ['#1de9b6', '#03a9f5'],
        normalizeFunction: 'polynomial'
    });
})(jQuery);
</script>
