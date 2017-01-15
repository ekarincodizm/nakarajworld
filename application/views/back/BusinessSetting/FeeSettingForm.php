<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    ค่าธรรมเนียม
                    <small>แก้ไขเมื่อวันที่ <code><?php echo $this->thaidate->FullDate($BusinessSetting[0]['setting_date']) ?></code> </small>
                </h2>
            </div>
            <div class="body">
                
                <?php echo form_open('/BusinessSetting/SaveFee/'); ?>

                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">ค่าสมัครสมาชิก</span>
                            <div class="form-line">
                                <input name="setting_register_fee" type="text" class="form-control text-center" value="<?php echo $BusinessSetting[0]['setting_register_fee'] ?>">
                            </div>
                            <span class="input-group-addon">บาท</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">ค่าผู้แนะนำ</span>
                            <div class="form-line">
                                <input name="setting_adviser_income" type="text" class="form-control text-center" value="<?php echo $BusinessSetting[0]['setting_adviser_income'] ?>">
                            </div>
                            <span class="input-group-addon">บาท</span>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success"> บันทึกค่าธรรมเนียม</button>
                    </div>
                </div>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>
