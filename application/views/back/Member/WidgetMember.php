<div class="row clearfix">
  <div class="col-md-8">
    <div class="card">
      <div class="body">
        <div class='row '>
          <!-- <div class="col-md-12 text-center"> <img alt="140x140" data-src="holder.js/140x140" class="img-circle" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTg4MDQwZjU1ZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ODgwNDBmNTVlIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 100px; height: 100px;"/> </div> -->
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
              <a href="<?php echo site_url('/Member/EditMember/'.$Profile[0]['member_id']); ?>" class="btn btn-lg bg-orange waves-effect">แก้ไขข้อมูล</a>
              <!-- <button type="submit" class="button green rounded">ลงทะเบียน</button> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="body bg-teal">
            บัญชีนักธุรกิจอิสระ <span class="pull-right"><b><?php echo count($AccountList); ?> รหัส</b> </span>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="body bg-pink">
            ยอด PV ปัจจุบัน <span class="pull-right"><b><?php echo number_format($PV[0]['temp_total_pv']-$PV[0]['temp_total_used_pv']); ?> PV</b> </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
