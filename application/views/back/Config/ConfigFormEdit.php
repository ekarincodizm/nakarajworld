<script type="text/javascript" src="<?php echo base_url('/assets/theme/back-end/plugins/ckeditor/ckeditor.js'); ?>"></script>
<section class="content" ng-controller="">
  <div class="container-fluid">
    <div class="block-header">
      <h1>เว็บไซต์</h1>
    </div>
    <div class="row clearfix ">
      <div class="col-md-12">
        <div class="card">
          <div class="header bg-cyan">
            <h2>
              ตั้งค่า
            </h2>

          </div>
          <div class="body">
            <?php echo form_open_multipart('/Config/SaveConfig'); ?>
            <input type="hidden" name="mlm_config_id" value="<?php echo $ConfigDetail[0]['mlm_config_id'] ?>">

            <div class="row">
              <div class="col-sm-offset-3 col-sm-6 text-center">
                <div class="form-group">
                  <label for=""><h2>โลโก้</h2></label>
                  <div class="form-line">
                    <img src="<?php echo base_url('/assets/image/'.$ConfigDetail[0]['mlm_config_logo']) ?>" alt="">
                    <input type="hidden" name="mlm_config_logo_old" value="<?php echo $ConfigDetail[0]['mlm_config_logo']; ?>">
                    <input name="mlm_config_logo" type="file" class="form-control" >
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-offset-3 col-sm-6 text-center">
                <div class="form-group">
                  <label for="">ชื่อร้านค้า</label>
                  <div class="form-line">
                    <input name="mlm_config_name" type="text" step="any" class="form-control input-lg" value="<?php echo $ConfigDetail[0]['mlm_config_name'] ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-offset-3 col-sm-6 text-center">
                <div class="form-group">
                  <label for="">ที่อยู่ร้านค้า</label>
                  <div class="form-line">
                    <textarea name="mlm_config_address"  rows="2" cols="80" class="form-control input-lg"><?php echo $ConfigDetail[0]['mlm_config_address'] ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-offset-3 col-sm-6 text-center">
                <div class="form-group">
                  <label for="">อีเมล</label>
                  <div class="form-line">
                    <input name="mlm_config_email" type="text" step="any" class="form-control input-lg" value="<?php echo $ConfigDetail[0]['mlm_config_email'] ?>">
                    <!-- <input name="products_detail" type="text" class="form-control input-lg"> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-offset-3 col-sm-6 text-center">
                <div class="form-group">
                  <label for="">เบอร์โทรศัพท์</label>
                  <div class="form-line">
                    <input name="mlm_config_tel" type="text" class="form-control input-lg" value="<?php echo $ConfigDetail[0]['mlm_config_tel'] ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-lg btn-success">
                  บันทึก
                </button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
