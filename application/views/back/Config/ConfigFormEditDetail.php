<script type="text/javascript" src="<?php echo base_url('/assets/theme/back-end/plugins/ckeditor/ckeditor.js'); ?>"></script>
<section class="content" ng-controller="">
  <div class="container-fluid">
    <div class="block-header">
      <h1>เว็บไซต์</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header bg-cyan">
            <h2>
              เนื้อหา
            </h2>

          </div>
          <div class="body">
            <?php echo form_open_multipart('/Config/SaveConfigDetail'); ?>
            <input type="hidden" name="mlm_config_id" value="<?php echo $ConfigDetail[0]['mlm_config_id'] ?>">

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">รายละเอียดร้านค้า</label>
                  <div class="form-line">
                    <textarea name="mlm_config_detail"  rows="20" cols="80" class="form-control input-lg ckeditor"><?php echo $ConfigDetail[0]['mlm_config_detail'] ?></textarea>
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
