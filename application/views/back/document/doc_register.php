<div class="row" style="    position: fixed;
right: 5%;
top: 0%;">
<div class=' col-md-12 col-sm-12 col-xs-12 text-center ' style="margin-top:20px">
  <form class='form-group'>

    <button type='button' class='btn btn-lg btn-primary no-print' onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

  </form>

</div>
</div>


<div class='row '>
  <page size="A4" style="color: #000;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4 col-sm-4 ">


        </div>
        <div class="col-sm-4 text-center logo col-sm-4 ">
          <div class="row">

            <div class="col-sm-12" style="margin-bottom:20px">
              <h1 class="text-center">ใบสมัครสมาชิก</h1>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-sm-4  text-right">

        </div>
      </div>



      <div class="row">
        <div class="col-md-8">
          <h3>ข้อมูลผู้สมัคร</h3>
          <div class="well well-sm">
            <div class="container">
              <div class="row">
                <div class="">
                  <p>
                    <?php echo $Result['Profile'][0]['member_prefix'].$Result['Profile'][0]['member_firstname']." ".$Result['Profile'][0]['member_lastname']; ?><br>
                    <?php if($Result['Profile'][0]['member_id_card_type']==0): ?>
                      เลขบัตรประจำตัวประชาชน : <?php echo $Result['Profile'][0]['member_citizen_id']; ?><br>
                    <?php elseif ($Result['Profile'][0]['member_id_card_type']==1): ?>
                      Passport : <?php echo $Result['Profile'][0]['member_citizen_id']; ?><br>
                    <?php elseif($Result['Profile'][0]['member_id_card_type']==2): ?>
                      Work Permit : <?php echo $Result['Profile'][0]['member_citizen_id']; ?><br>
                    <?php endif; ?>

                    วันเกิด : <?php echo $Result['Profile'][0]['member_born']; ?> <br>
                    อายุ : <?php echo $Result['Profile'][0]['member_age']; ?> ปี <br>
                    เบอร์โทร : <?php echo $Result['Profile'][0]['member_phone']; ?><br>
                    อีเมล : <?php echo $Result['Profile'][0]['member_email']; ?><br>
                    ที่อยู่ : <?php echo $Result['Profile'][0]['member_address']; ?><br>

                  </p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-md-offset-1">
          <h3>รหัสผู้แนะนำ</h3>
          <div class="well well-sm">
            <div class="container">
              <p></p>
              </div>
          </div>
          <!-- <p>*ถ้ามี</p> -->
        </div>
      </div>



      <div class="row" style="margin-top:150px">
        <div class="col-sm-6">
          <div class="row text-center">
            <div class="col-sm-12">......................................................................</div>
            <div class="col-sm-12">(.....................................................................)</div>
            <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
            <div class="col-sm-12">ลายมือชื่อผู้สมัคร</div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="row text-center">
            <div class="col-sm-12">......................................................................</div>
            <div class="col-sm-12">(.....................................................................)</div>
            <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
            <div class="col-sm-12">ลายมือชื่อเจ้าหน้าที่</div>
          </div>
        </div>
      </div>
    </div>
  </page>
</div>
