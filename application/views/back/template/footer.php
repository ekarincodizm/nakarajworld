
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

$this->debuger->load_back_js('moment-with-locales.min');

$this->debuger->load_back_plugins('bootstrap-select/js/bootstrap-select');
$this->debuger->load_back_plugins('jquery-slimscroll/jquery.slimscroll');
$this->debuger->load_back_plugins('node-waves/waves');

$this->debuger->load_back_plugins('jquery-datatable/jquery.dataTables');
$this->debuger->load_back_plugins('jquery-datatable/skin/bootstrap/js/dataTables.bootstrap');
$this->debuger->load_back_plugins('jquery-datatable/extensions/export/dataTables.buttons.min');
$this->debuger->load_back_plugins('jquery-datatable/extensions/export/buttons.print.min');

$this->debuger->front_load_js('bootstrap-datepicker');
$this->debuger->front_load_js('bootstrap-datepicker-thai');
$this->debuger->front_load_js('locale/bootstrap-datepicker.th');

$this->debuger->load_back_js('demo');
$this->debuger->load_back_js('admin');

?>
<script type="text/javascript" src="<?php echo base_url('assets/theme/back-end/js/angular.min.js') ?>"></script>

<?php $this->debuger->load_back_js('angular-locale_th-th');  ?>
<script type="text/javascript" src="<?php echo base_url('assets/theme/back-end/js/angular-animate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/theme/back-end/js/angular-sanitize.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app/app.js') ?>"></script>

<?php $segment_1 = $this->uri->segment(1); if ($segment_1=="Accounting"): ?>
  <script type="text/javascript">
    $("#dateFrom").change(function() {
      var dateFrom = $('#dateFrom').data('datepicker').date;
      var dateFrom_date = ( dateFrom.getDate() < 10 ? "0" : "" ) + dateFrom.getDate();
      var dateFrom_month =  dateFrom.getMonth()+1;
          dateFrom_month =  ( dateFrom_month < 10 ? "0" : "" ) + dateFrom_month;
      var dateFrom_year = dateFrom.getFullYear();
      var setDateFrom = dateFrom_year+"-"+dateFrom_month+"-"+dateFrom_date;
      console.log(setDateFrom);

      $("#setDateFrom").val(setDateFrom);
    });
    $("#dateTo").change(function() {
      var dateTo = $('#dateTo').data('datepicker').date;
      var dateTo_date = ( dateTo.getDate() < 10 ? "0" : "" ) + dateTo.getDate();
      var dateTo_month =  dateTo.getMonth()+1;
          dateTo_month =  ( dateTo_month < 10 ? "0" : "" ) + dateTo_month;
      var dateTo_year = dateTo.getFullYear();
      var setDateTo = dateTo_year+"-"+dateTo_month+"-"+dateTo_date;
      console.log(setDateTo);

      $("#setDateTo").val(setDateTo);
    });


  </script>
<?php endif; ?>

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
<script type="text/javascript">
console.log(window.location.href);
$(function() {
  $(".menu ul li a").each(function(){
    console.log($(this).attr("href"));

    if( $(this).attr("href") == window.location.href ){
      $(this).parent().addClass('active');
      $(this).parent().parent().parent().children("a:first-child").addClass('toggled');
      $(this).parent().parent().parent().children("ul").css("display", "block");
      $(this).parent().parent().parent().addClass('active');

    }
  })
});
</script>

</body>
</html>
