<div class="row clearfix">
  <div class="col-md-8">
    <div class="card">
      <div class="body">
        <div class='row '>
          <div class="col-md-4 text-center col-md-offset-4">
            <?php if ($Profile[0]['member_photo']!=""): ?>
              <img src="<?php echo base_url('/assets/image/profile/'.$Profile[0]['member_photo']); ?>" class="img-circle" height="200px" width="auto">
            <?php else: ?>
              <img src="<?php echo base_url('/assets/image/profile/no_profile.png'); ?>" class="img-circle" height="200px" width="auto">
            <?php endif; ?>
          </div>
          <div class="col-md-12 text-center">
            <h4><?php echo $Profile[0]['member_prefix'].$Profile[0]['member_firstname']." ".$Profile[0]['member_lastname'] ?></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h5>ข้อมูลเบื้องต้น</h5>
            <div class="col-md-12">
              <p>
                <?php echo $Profile[0]['member_id_card_type_name']; ?> : <?php echo $Profile[0]['member_citizen_id']; ?> <br>
                วันเกิด : <?php echo $this->thaidate->FullDate($Profile[0]['member_born']); ?><br>
                อายุ : <?php echo $Profile[0]['member_age']; ?> ปี<br>
              </p>
            </div>
          </div>
          <div class="col-md-12">
            <h5>การติดต่อ</h5>
            <div class="col-md-6">
              <p> เบอร์โทร : <?php echo $Profile[0]['member_phone']; ?><br>
                ที่อยู่ : <?php echo $Profile[0]['member_address']; ?><br>
                จังหวัด : <?php echo $Profile[0]['province_name']; ?><br>
                อำเภอ : <?php echo $Profile[0]['amphur_name']; ?><br>
              </p>
            </div>
            <div class="col-md-6">
              <p>
                Line ID : <?php echo $Profile[0]['member_line_id']; ?><br>
                Skype ID : <?php echo $Profile[0]['member_skype']; ?><br>
                What App : <?php echo $Profile[0]['member_whatapp']; ?><br>
                อื่นๆ : <?php echo $Profile[0]['member_contact_etc']; ?><br>
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <h5>ข้อมูล ผู้แนะนำ</h5>
            <div class="col-md-12">
              <p>
                ชื่อ-นามสกุล : <?php echo $Profile[0]['member_adviser_name'] ?><br>
                รหัสผู้แนะนำ : <?php echo $Profile[0]['member_adviser_id'] ?><br>
                ชื่ออัพไลน์ : <?php echo $Profile[0]['member_upline_name'] ?><br>
                รหัส : <?php echo $Profile[0]['member_upline_id'] ?></p>
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <h5>ข้อมูล ผู้รับมรดกตกทอด</h5>
            <div class="col-md-12">
              <p>
                ชื่อ-นามสกุล <?php echo $Profile[0]['legacy_prefix'].$Profile[0]['legacy_firstname']." ".$Profile[0]['legacy_lastname'] ?><br>
                เลขบัตรประชาชน <?php echo $Profile[0]['legacy_citizen_id']?><br>
                วันเกิด : <b><?php echo $this->thaidate->FullDate($Profile[0]['legacy_born']) ?></b> อายุ <b><?php echo $Profile[0]['legacy_age'] ?></b> ปี<br>
                <br><b>ข้อมูลติดต่อ : </b><br>
                เบอร์โทรศัพท์ : <?php echo $Profile[0]['legacy_phone']; ?><br>
                Email : <?php echo $Profile[0]['legacy_email']; ?><br>
                Line ID : <?php echo $Profile[0]['legacy_line_id']; ?><br>
                Skype ID : <?php echo $Profile[0]['legacy_skype']; ?><br>
                What App : <?php echo $Profile[0]['legacy_whatapp']; ?><br>
                อื่นๆ : <?php echo $Profile[0]['legacy_contact_etc']; ?><br>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="form-group">
              <?php if ($check_acc_id==0): ?>
                <a class="btn btn-lg btn-success" href="<?php echo site_url('/Member/ApprovedMember/'.$this->uri->segment(3)); ?>">ยืนยันสมาชิก</a>
                <a class="btn btn-lg btn-danger" href="<?php echo site_url('/Member/DeleteMember/'.$this->uri->segment(3)); ?>" onclick="return confirm('ต้องการลบสมาชิกนี้ใช่หรือไม่?')">ลบสมาชิก</a>
              <?php else: ?>
                <?php echo $Profile[0]['member_prefix'].$Profile[0]['member_firstname']." ".$Profile[0]['member_lastname'] ?><br style="margin: 30 0 30 0;">
                <a class="btn btn-lg btn-info" href="<?php echo site_url('/Accounting/AccountingDetail/'.$check_acc_id); ?>">ชำระค่าสมาชิก</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
