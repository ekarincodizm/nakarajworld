<div class="row" style="    position: fixed;
right: 5%;
top: 0%;">
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ' style="margin-top:20px">
  <form class='form-group'>

    <button type='button' class='btn btn-lg btn-primary no-print' onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

  </form>

</div>
</div>
<page size="A4" >
  <div class="col-sm-12">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-offset-0 col-sm-3 col-md-3">
          <h1 class="text-center"><img src="<?php echo base_url('assets/theme/front-end/images/logo.png')?>" class="img-responsive" alt=""/><br>
          </h1>
        </div>
        <div class="col-sm-offset-0 col-sm-8 col-md-8">
          <h3 class="text-center"><b>ใบสมัคร และ สัญญาการเข้าร่วมธุรกิจ
            <br>บริษัท นว ดรากอน จำกัด</b></h3>
        </div>
        <div class="col-sm-offset-0 col-sm-2 col-md-2">
          <!-- <p class="text-center">รหัสสมาชิก<span><br>
          <b><?php //echo "NEW".sprintf("%05d", $Profile[0]['member_id']); ?></b></span></p> -->
        </div>
      </div>
      <div class="row">
        <div class="row">
        <div class="col-sm-offset-0 col-md-12 col-sm-12">
          <p class="text-left"><strong>ข้อมูลผู้สมัคร</strong><br>
          </p>
        </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-0 col-md-12 col-sm-12">
            ชื่อ-นามสกุล : <b><?php echo $Profile[0]['member_prefix'].$Profile[0]['member_firstname']." ".$Profile[0]['member_lastname'] ?></b><br>

          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-0 col-md-6 col-md-offset-0 col-sm-6">
            ชื่อภาษาอังกฤษตรงกับบัตรประชาชน/Passport<br>
              <p><b><?php echo $Profile[0]['member_prefix_eng'].$Profile[0]['member_firstname_eng']." ".$Profile[0]['member_lastname_eng'] ?></b>
            </p></div>
            <div class="col-sm-offset-0 col-md-6 col-sm-6">
                <?php echo $Profile[0]['member_id_card_type_name']?> : <strong><?php echo $Profile[0]['member_citizen_id']?></strong>
                <br>ว./ด./ป.เกิด : <b><?php echo $this->thaidate->FullDate($Profile[0]['member_born']) ?></b> อายุ <b><?php echo $Profile[0]['member_age'] ?></b> ปี
            </div>
          </div>
          <div class="row">
            <div class="col-sm-offset-0 col-md-12 col-sm-12">
              ที่อยู่ : <strong><?php echo $Profile[0]['member_address'] ?></strong><br>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-offset-0 col-md-12 col-sm-12">
              เบอร์โทรศัพท์ : <strong><?php echo $Profile[0]['member_phone'] ?></strong>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-offset-0 col-md-12 col-sm-12">
              <p>ที่อยู่สำรองกรณีติดต่อไม่ได้ : <strong><?php echo $Profile[0]['member_address2'] ?></strong></p>
              </div>
              <div class="col-sm-offset-0 col-md-6 col-sm-6">
                <p><strong>ข้อมูล ผู้แนะนำ</strong><br>
                  ชื่อ-นามสกุล : <?php echo $Profile[0]['member_adviser_name'] ?><br>
                  รหัสผู้แนะนำ : <?php echo $Profile[0]['member_adviser_id'] ?><br>
                  ชื่ออัพไลน์ : <?php echo $Profile[0]['member_upline_name'] ?><br>
                  รหัส : <?php echo $Profile[0]['member_upline_id'] ?></p>
                </div>
                <div class="col-sm-offset-0 col-md-6 col-sm-6">
                  <p><strong>ข้อมูล ผู้รับมรดกตกทอด</strong><br>
                    ชื่อ-นามสกุล ........................................................<br>
                    เลขบัตรประชาชน ...............................................<br>
                    เพศ .................... ว./ด./ป.เกิด ............................<br>
                    ข้อมูลติดต่อ .........................................................</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-offset-0 col-md-6 col-sm-6">
                    <p><strong>ข้อมูล การติดต่อทางอีเลคทรอนิคส์</strong><br>
                      E-Mail : <strong><?php echo $Profile[0]['member_email'] ?></strong><br>
                      Line ID : <strong><?php echo $Profile[0]['member_line_id'] ?></strong><br>
                      Skype : <strong><?php echo $Profile[0]['member_skype'] ?></strong><br>
                      WhatApp : <strong><?php echo $Profile[0]['member_whatapp'] ?></strong><br>
                      ช่องทางอื่นๆ : <strong><?php echo $Profile[0]['member_contact_etc'] ?></strong><br>
                    </p>
                  </div>
                  <div class="col-sm-offset-0 col-md-6 col-sm-6">
                    <p><strong>ข้อมูลการโอนเงิน</strong><br>
                      ชื่อธนาคาร .......................................................<br>
                      เลขบัญชี ...........................................................<br>
                      ชื่อบัญชี ............................................................<br>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-offset-0 col-md-6 col-sm-6">
                    <p><strong><font size="2">เอกสารประกอบการสมัคร</strong><br>
                      ( ) สำเนาบัตรประชาชน <br>( ) สำเนาหน้าสมุดบัญชีธนาคาร</font></p>
                    </div>
                    <div class="col-sm-offset-0 col-md-6 col-sm-6">
                      <p><strong><font size="2">เอกสารผู้รับมรดกตกทอด</strong> <br>( ) สำเนาบัตรประชาชน และหรือสำเนาทะเบียนบ้าน<br> </font><br>
                      </p>
                    </div>
                    <div class="col-sm-offset-0 col-md-12 col-sm-12">
                      <p><font size="2"><strong>หมายเหตุ</strong> : ในกรณีที่ผู้สมัครฯ มีอายุไม่ครบ 20 ปีบริบูรณ์ จะต้องได้รับการยินยอมจากผู้ปกครอง (บิดา/มารดา/ผู้ใช้อำนาจตามกฎหมาย โดยผู้ปกครองต้องเซ็นชื่อในใบสมัครนี้ และแนบสำเนาบัตรประชาชนพร้อมเซ็นรับรองสำเนาถูกต้อง </font><br>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </page>

          <page size="A4" >
            <div class="col-sm-offset-0 col-md-0 col-sm-12"><font size="2"><br>
              <p class="text-center"><strong>สัญญาการเข้าร่วมธุรกิจระหว่างนักธุรกิจอิสระ นว ดรากอน กับบริษัท นว ดรากอน เวล เน็ตเวิร์ค จำกัด</strong></p>
              <p class="text-justify">1. ผู้ประกอบการธุรกิจขายตรง จะจ่ายผลตอบแทนให้กับผู้จำหน่ายอิสระ เป็นไปตามแผนการจ่ายผลตอบแทนที่ได้จดทะเบียนต่อนายทะเบียน ณ สำนักงานคณะกรรมการคุ้มครอง ผู้บริโภค (สคบ.) และดังที่ปรากฏในแผนการจ่ายผลตอบแทนของผู้ประกอบการธุรกิจขายตรง ที่มอบให้กับผู้จำหน่ายอิสระ <br>
                2. ผู้จำหน่ายอิสระ ตกลงที่จะชำระค่าธรรมเนียมการสมัคร ค่าฝึกอบรม ค่าวัสดุอุปกรณ์ส่งเสริมการขาย หรือค่าธรรมเนียมอื่นๆ ตามผู้ประกอบธุรกิจขายตรง กำหนดไว้ในสัญญาฉบับนี้ ทั้งนี้ การที่ผู้ประกอบธุรกิจขายตรง จะเรียกเก็บค่าธรรมเนียม หรือค่าใช้จ่ายอื่นใด นอกจากที่กำหนดไว้ในสัญญาฉบับนี้ มิให้มีผลผูกพันต่อผู้จำหน่ายอิสระ <br>
                3. ผู้ประกอบการธุรกิจขายตรงตกลงยินยอมที่จะรับซื้อสินค้า กระเป๋าเอกสาร พร้อมชุดคู่มือ แค็ตตาล็อกสินค้าจากผู้จำหน่ายอิสระ ในกรณีที่ผู้จำหน่ายอิสระประสงค์จะใช้สิทธิดังกล่าว โดยที่ผู้จำหน่ายอิสระ จะต้องแสดงความจำนงที่จะใช้สิทธิคืนดังกล่าวต่อผู้ประกอบการธุรกิจขายตรง ภายใน 30 วัน นับจากวันที่ได้รับสินค้า <br>
                4. เมื่อผู้จำหน่ายอิสระใช้สิทธิคืนสินค้า วัสดุอุปกรณ์ส่งเสริมการขาย ชุดคู่มือ หรืออุปกรณ์ส่งเสริมธุรกิจที่ซื้อไปจากผู้ประกอบธุรกิจขายตรงให้ผู้ประกอบการซื้อคืนตามราคาที่ผู้จำหน่าย อิสระได้จ่ายไปภายใน 15 วัน นับแต่วันที่ผู้จำหน่ายอิสระใช้สิทธิคืน แต่ในการใช้สิทธิคืน กรณีที่สัญญาตามข้อ 3. สิ้นสุดลง ผู้ประกอบธุรกิจขายตรงมีสิทธิหักค่าดำเนินการต่างๆได้ และมีสิทธิหักกลบลบหนี้ใดๆ อันเกี่ยวกับสัญญาข้อ 1. ที่ผู้จำหน่ายอิสระต้องชำระ <br>
                5. สถานภาพการเป็นผู้จำหน่ายอิสระมีอายุ 1 ปี นับจากเดือนที่สมัคร โดยสมาชิกที่ประสงค์จะรักษาสถานภาพการเป็นสมาชิก จะต้องต่อสถานภาพเป็นประจำทุกปี และบริษัทฯ เป็นผู้พิจารณาและอนุมัติการสมัครตามใบสมัครแต่เพียงผู้เดียว </p>
              </font></div>
              <div class="col-sm-offset-0 col-md-12 col-sm-12"></div>
              <div class="col-sm-offset-0 col-md-6 col-sm-12"><p><br></p></div>
              <div class="col-sm-12">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-offset-0 col-md-12 col-sm-12"><font size="2">
                      <p class="text-justify">ข้าพเจ้าขอรับรองว่า ข้อความต่างๆเป็นจริงทุกประการและถือว่าใบสมัครฉบับนี้เป็นสัญญาที่ข้าพเจ้ามีต่อบริษัทข้าพเจ้าได้อ่านและทำความเข้าใจเงื่อนไขข้อตกลง รวมถึงกฎระเบียบต่างๆของผู้จำหน่ายอิสระของบริษัทอย่างครบถ้วนแล้ว และ หากมีเงื่อนไขข้อตกลงอื่นๆที่บริษัทประกาศตามมาภายหลัง ข้าพเจ้ายินดีปฏิบัติตามอย่างเคร่งครัดโดยปราศจากเงื่อนไขทุกประการ</p></font>
                    </div>
                  </div>
                  <p class="text-center">&nbsp;</p>

                  <div class="row"> </div>
                  <div class="row">
                    <div class="col-sm-offset-0 col-sm-4 col-md-4">
                      <p class="text-center">&nbsp;</p>
                      <p class="text-center">&nbsp;</p>


                      <p class="text-center"><font size="2">.......................................<br>
                        ลายเซ็นผู้สมัคร <br>วันที่......./........../..........</font></p>
                      </div>
                      <div class="col-sm-offset-0 col-sm-4 col-md-4">
                        <p class="text-center">&nbsp;</p>
                        <p class="text-center">&nbsp;</p>

                        <p class="text-center"><font>.......................................</font><br>
                          ลายเซ็นผู้ปกครอง<br>
                          วันที่......./........../..........</p>
                        </div>
                        <div class="col-sm-offset-0 col-md-4 col-sm-4" id="border">
                          <p class="text-center"><strong> ส่วนของเจ้าหน้าที่บริษัท</strong></p>
                          <p class="text-center">&nbsp;</p>
                          <p class="text-center">&nbsp;</p>
                          <p class="text-center">&nbsp;</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </page>
