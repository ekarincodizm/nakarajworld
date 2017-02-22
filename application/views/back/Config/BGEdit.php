<script type="text/javascript" src="<?php echo base_url('/assets/theme/back-end/plugins/ckeditor/ckeditor.js'); ?>"></script>
<section class="content" ng-controller="">
  <div class="container-fluid">
    <div class="block-header">
      <h1>ตั้งค่าเว็บไซต์</h1>
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
            <?php echo form_open_multipart('/Config/SaveBG'); ?>
            <input type="hidden" name="mlm_config_id" value="<?php echo $ConfigDetail[0]['mlm_config_id'] ?>">

            <div class="row">
              <div class="col-sm-offset-3 col-sm-6 text-center">
                <div class="form-group">
                  <label for=""><h2>ภาพพื้นหลัง</h2></label>
                  <div class="form-line">
                    <img src="<?php echo base_url('/assets/theme/front-end/images/'.$ConfigDetail[0]['mlm_config_bg']) ?>" width="400" alt="">
                    <input type="hidden" name="mlm_config_bg_old" value="<?php echo $ConfigDetail[0]['mlm_config_bg']; ?>">
                    <input name="mlm_config_bg" type="file" class="form-control" >
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
