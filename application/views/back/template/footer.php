
<?php
if (!isset($loadJQ)) {
  $this->debuger->load_back_plugins('jquery/jquery.min');
  // $this->debuger->load_back_plugins('raphael/raphael.min');
  // $this->debuger->load_back_plugins('morrisjs/morris');
  $this->debuger->load_back_plugins('bootstrap/js/bootstrap');
}else {?>
  <script type="text/javascript">
      $(function () {
          $('.bootstrap-datepicker').datetimepicker({
            locale: 'th',
            format: 'YYYY-MM-DD',
          });
      });
  </script>
<?php }
$this->debuger->load_back_plugins('bootstrap-select/js/bootstrap-select');
$this->debuger->load_back_plugins('jquery-slimscroll/jquery.slimscroll');
$this->debuger->load_back_plugins('node-waves/waves');


$this->debuger->load_back_plugins('jquery-datatable/jquery.dataTables');
$this->debuger->load_back_plugins('jquery-datatable/skin/bootstrap/js/dataTables.bootstrap');
$this->debuger->load_back_plugins('jquery-datatable/extensions/export/dataTables.buttons.min');
$this->debuger->load_back_plugins('jquery-datatable/extensions/export/buttons.print.min');
$this->debuger->load_back_js('demo');
$this->debuger->load_back_js('admin');


?>

<script type="text/javascript">
$('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});
$(function () {
    $('.js-basic-example').DataTable();

    //Exportable table
    $('.js-table').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'print',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        }]
    });
});
</script>
</body>
</html>
