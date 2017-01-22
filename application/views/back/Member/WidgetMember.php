<div class="row clearfix">
  <div class="col-md-8">
    <div class="card">
      <div class="body">
        <div class='row '>
          <!-- <div class="col-md-12 text-center"> <img alt="140x140" data-src="holder.js/140x140" class="img-circle" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTg4MDQwZjU1ZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ODgwNDBmNTVlIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 100px; height: 100px;"/> </div> -->
          <div class="col-md-4 text-center col-md-offset-4">
            <img src="<?php echo base_url('/assets/image/profile/'.$Profile[0]['member_photo']); ?>" class="img-circle" height="200px" width="auto">
          </div>
          <div class="col-md-12 text-center">

            <h4><?php echo $Profile[0]['member_prefix'].$Profile[0]['member_firstname']." ".$Profile[0]['member_lastname'] ?></h4>
            <h5><?php echo "PV: ". $PV; ?></h5>
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
      <!-- <div class="col-md-12">
        <div class="card">
          <div class="body bg-teal">
            จำนวนบัญชีธุรกิจ <span class="pull-right"><b>12 รหัส</b> </span>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
