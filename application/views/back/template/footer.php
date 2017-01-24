
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

$this->debuger->load_back_js('demo');
$this->debuger->load_back_js('admin');


?>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url('assets/theme/back-end/js/angular.min.js') ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/theme/back-end/js/angular-animate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/theme/back-end/js/angular-sanitize.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/app/app.js') ?>"></script>

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
