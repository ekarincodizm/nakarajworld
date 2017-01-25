<?php $this->load->view('front/User/UserID'); ?>
<section id="extra-features" class="separator top" data-ng-controller="ProfileCtrl">
  <div class="container" style="min-height: 460px;">
    <div class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-8">
            <h6>โปรไฟล์</h6><br>
          </div>
          <div class="col-md-4 text-center col-md-offset-1">
            <img src="<?php echo base_url('/assets/image/profile/'.$Profile[0]['member_photo']); ?>" class="img-circle" style="height: 200px;">
          </div>
        </div>

        <h2><?php echo $Profile[0]['member_prefix'].$Profile[0]['member_firstname']." ".$Profile[0]['member_lastname'] ?></h2>
        <h4><?php echo $Profile[0]['member_prefix_eng'].$Profile[0]['member_firstname_eng']." ".$Profile[0]['member_lastname_eng'] ?></h4>

        <!-- <h4>PV: <?php echo $PV ?></h4  > -->
        <p>
          <?php echo $Profile[0]['member_id_card_type_name']?> : <strong><?php echo $Profile[0]['member_citizen_id']?></strong>  <br>
          วันเกิด : <strong><?php echo $this->thaidate->FullDate($Profile[0]['member_born']) ?></strong><br>
          อายุ : <strong><?php echo $Profile[0]['member_age'] ?></strong> ปี <br>
          เบอร์โทร : <strong><?php echo $Profile[0]['member_phone'] ?></strong><br>
          อีเมล : <strong><?php echo $Profile[0]['member_email'] ?></strong><br>
          ที่อยู่ : <strong><?php echo $Profile[0]['member_address'] ?></strong><br>
          Line : <strong><?php echo $Profile[0]['member_line_id'] ?></strong><br>
          Skype : <strong><?php echo $Profile[0]['member_skype'] ?></strong><br>
          WhatApp : <strong><?php echo $Profile[0]['member_whatapp'] ?></strong><br>
          ช่องทางการติดต่ออื่นๆ : <strong><?php echo $Profile[0]['member_contact_etc'] ?></strong><br>
          <div class="col-lg-4">
            <a href="<?php echo site_url('HomePage/EditProfile'); ?>" class="button green rounded">แก้ไขข้อมูลส่วนตัว</a>
          </div>
        </p>
      </div>
      <div class="col-lg-6">
        <?php if ($Profile[0]['member_status']==2): ?>
          <?php $this->load->view('front/User/TemplatePrintRegister'); ?>
        <?php elseif ($Profile[0]['member_status']==1): ?>
          <?php $this->load->view('front/User/TemplateRegistered'); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
</section>
