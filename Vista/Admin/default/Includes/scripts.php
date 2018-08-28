<!-- INCLUDES SCRIPTS -->

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>

<!-- Counter js  -->
<script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="../plugins/counterup/jquery.counterup.min.js"></script>

<!--C3 Chart-->
<script type="text/javascript" src="../plugins/d3/d3.min.js"></script>
<script type="text/javascript" src="../plugins/c3/c3.min.js"></script>

<!--Echart Chart-->
<script src="../plugins/echart/echarts-all.js"></script>

<!-- Dashboard init -->
<script src="assets/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<!--Form Wizard-->
<script src="../plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<!--wizard initialization-->
<script src="assets/pages/jquery.wizard-init.js" type="text/javascript"></script>

<!-- Required datatable js -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="../plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="../plugins/datatables/jszip.min.js"></script>
<script src="../plugins/datatables/pdfmake.min.js"></script>
<script src="../plugins/datatables/vfs_fonts.js"></script>
<script src="../plugins/datatables/buttons.html5.min.js"></script>
<script src="../plugins/datatables/buttons.print.min.js"></script>
<script src="../plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="../plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );

</script>

<!--FooTable-->
<script src="../plugins/footable/js/footable.all.min.js"></script>

<!--FooTable Example-->
<script src="assets/pages/jquery.footable.js"></script>

<!-- Examples -->
<script src="../plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/tiny-editable/mindmup-editabletable.js"></script>
<script src="../plugins/tiny-editable/numeric-input-example.js"></script>

<script src="assets/pages/jquery.datatables.editable.init.js"></script>

<script>
    $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
</script>

<!-- MODAL -->
<div id="dialog" class="modal-block mfp-hide">
    <section class="card p-20">
        <header class="panel-heading">
            <h4 class="panel-title mt-0">Are you sure?</h4>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <p>Are you sure that you want to delete this row?</p>
                </div>
            </div>

            <div class="row m-t-20">
                <div class="col-md-12 text-right">
                    <button id="dialogConfirm" class="btn btn-success waves-effect waves-light">Confirm</button>
                    <button id="dialogCancel" class="btn btn-danger waves-effect">Cancel</button>
                </div>
            </div>
        </div>

    </section>
</div>
<!-- end Modal -->

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>

<!-- END INCLUDES SCRIPTS -->