<section class="content">
  <div class="container-fluid">

    <div class="col-md-6 col-md-offset-3">
      <?php if (@$Result['Result']=='null'): ?>
        <div class="alert alert-danger text-center">
          <h4>ไม่พบรหัส <span class="label bg-black"><strong><?php echo strtoupper($Result['UserFullCode'])  ?></strong></span>  ในระบบ กรุณาตรวจสอบ</h4>
        </div>
      <?php endif; ?>

      <div class="card">
        <div class="body">
          <div class="row clearfix">

            <div class="col-md-12 text-center">
              <h1>รหัสผู้แนะนำ</h1>

            </div>
            <div class="col-md-12">
              <?php echo form_open('/Member/FindAccountByCode/'.$Member[0]['member_id'], array('id' => 'search_user')); ?>

              <div class="col-md-2"></div>
              <div class="col-md-3">
                <select class="form-control selectpicker" name="account_team">
                  <?php for ($i='A'; $i <= 'I'; $i++) { ?>
                    <option value="<?php echo $i ?>">ทีม <?php echo $i ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-5">
                <div class="input-group input-group-lg">
                  <div class="form-line">
                    <input id="" name="account_code" type="text" class="form-control text-center" style="text-transform:uppercase" maxlength="8"  required="required">
                  </div>
                </div>
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-12 text-center">
                <p class="text-center">กรุณาค้นหาผู้แนะนำสำหรับ <br>
                  <?php echo "คุณ".$Member[0]['member_firstname']." ".$Member[0]['member_lastname']; ?></p>
                  <button id="" type="submit" class="btn bg-cyan waves-effect"><i class="material-icons">search</i> <span style="font-size: 18px;">ค้นหา</span></button>

                </div>
                <?php echo form_close(); ?>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
