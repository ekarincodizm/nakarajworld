
<footer id="footer" style=" left:0; bottom:0; z-index:999;">
<!-- <footer id="footer" > -->

  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-6">
        <p class="copyright">Copyrights © 2016 NakarajWorld. All rights reserved.</p>
      </div>
      <div class="hidden-xs col-sm-6 col-md-6 text-right">
        <ul class="list-unstyled no-list-style list-inline list-socials">
          <!-- <li><a href="#top"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="#top"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="#top"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
          <li><a href="#top"><i class="fa fa-instagram" aria-hidden="true"></i></a></li> -->
        </ul>
      </div>
    </div>
  </div>
</footer>
<script type="text/javascript">
    $(function () {
        $('.bootstrap-datepicker').datetimepicker({
          locale: 'th',
          format: 'DD-MM-YYYY',
        });
    });
</script>


<script type="text/javascript">
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
<script src="<?php echo base_url(); ?>assets/app/app.js"></script>



</body>
</html>
