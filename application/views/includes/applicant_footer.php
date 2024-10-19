<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="">DWCC-SMS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Scholarship Management System</b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/')?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/')?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/')?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/')?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/')?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/')?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/')?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/')?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/')?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/')?>dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/')?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
 $(function () {
    var table = $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        initComplete: function () {
            // Apply the search
            this.api().columns(4).every(function () {
                var column = this;
                $('#userTypeFilter').on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );
                    column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });
            });
        }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
        "paging": true,          
        "lengthChange": false,   
        "searching": true,     
        "ordering": true,       
        "info": true,          
        "autoWidth": false,     
        "responsive": true,      
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"] 
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
});


$(document).ready(function() {
    function filterTable() {
        var selectedYear = $('#filter_academic_year').val();
        var selectedSemester = $('#filter_semester').val();

        var visibleRows = 0;

        // Iterate over each row to check if it matches the filters
        $('tbody tr').each(function() {
            var rowAcademicYear = $(this).data('academic-year');
            var rowSemester = $(this).data('semester');

            var yearMatch = (!selectedYear || rowAcademicYear === selectedYear);
            var semesterMatch = (!selectedSemester || rowSemester === selectedSemester);

            if (yearMatch && semesterMatch) {
                $(this).show();  // Show matching rows
                visibleRows++;
            } else {
                $(this).hide();  // Hide non-matching rows
            }
        });

        // Show or hide "No Data Found" row based on the number of visible rows
        $('#noDataRow').toggle(visibleRows === 0);
    }

    // Trigger filter when either dropdown changes
    $('#filter_academic_year, #filter_semester').on('change', filterTable);
});


</script>
</body>
</html>