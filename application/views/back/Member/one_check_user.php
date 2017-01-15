<section class="content">
  <div class="container-fluid">

    <div class="col-md-6 col-md-offset-3">
      <?php if (@$Result['Result']=='null'): ?>
        <div class="alert alert-danger text-center">
          <h4>ไม่พบรหัส <span class="label bg-black"><strong><?php echo strtoupper($Result['AccountFullCode'])  ?></strong></span>  ในระบบ กรุณาตรวจสอบ</h4>
        </div>
      <?php endif; ?>

      <div class="card">
        <div class="body">
          <div class="row clearfix">

            <div class="col-md-12 text-center">
              <h1>รหัสผู้แนะนำ</h1>
            </div>
            <div class="col-md-12">
              <?php echo form_open('/Admin_controller/search_user_by_code', array('id' => 'search_user')); ?>

              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="input-group input-group-lg form-float">
                  <div class="form-line">
                    <input id="account_code" name="account_code" type="text" class="form-control text-center" style="text-transform:uppercase" maxlength="10"  required="required">
                  </div>
                </div>
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-12 text-center">
                <button id="btn_search" click="check_code();"  type="button" class="btn bg-cyan waves-effect"><i class="material-icons">search</i> <span style="font-size: 18px;">ค้นหา</span></button>

              </div>
              <?php echo form_close(); ?>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  $(document).on("keypress", "form", function(event) {
    return event.keyCode != 13;
  });
  $('#account_code').filter_input({regex:'[a-zA-Z0-9]'});
  $('#btn_search').click(function check_code(){
    var textBox = document.getElementById("account_code");
    var code = textBox.value.length;
    console.log(code);
    if(code==9){
      $('#search_user').submit();
    } else {
      alert("กรอกรหัสสมาชิก อย่างน้อย 10 หลัก");
    }
  });
</script>
