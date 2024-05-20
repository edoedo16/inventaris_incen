</div>
</div>
<!--end page wrapper -->

<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
    <p class="mb-0">Copyright © 2024.</p>
</footer>
</div>
<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="../assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="../assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<script src="../assets/plugins/jquery-knob/excanvas.js"></script>
<script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>
<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
$(function() {
    $(".knob").knob();
});
</script>

<!-- plugin datatable example2 -->

<script>
$(document).ready(function() {
    var table = $('#example2').DataTable({
        // language: {
        //     "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
        // },
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print'],

    });

    table.buttons().container()
        .appendTo('#example2_wrapper .col-md-6:eq(0)');

    //bahasa indo plugin datatables 
    $('#dt').DataTable({
        // "language": {
        //     "url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
        //     "sEmptyTable": "Tidads"
        // }
    });
});
</script>



<!-- end plugin datable example2 -->



<script src="../assets/js/index.js"></script>

<!--app JS-->
<script src="../assets/js/app.js"></script>

<script>
$(function() {
    $('[data-bs-toggle="popover"]').popover();
    $('[data-bs-toggle="tooltip"]').tooltip();
})
</script>
</body>

</html>