<div class="row" style="    position: fixed;
    right: 5%;
    top: 0%;">
  <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ' style="margin-top:20px">
    <form class='form-group'>

        <button type='button' class='btn btn-lg btn-primary no-print' onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

    </form>

  </div>
</div>


<div class='row '>
  <page size="A4" style="color: #000;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4 col-sm-4 col-xs-4">


        </div>
        <div class="col-sm-4 text-center logo col-sm-4 col-xs-4">
          <div class="row">

            <div class="col-sm-12" style="margin-bottom:20px">
              <h1 class="text-center">ใบแจ้งหนี้</h1>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-sm-4 col-xs-4 text-right">

        </div>
      </div>

      <div class="row">
        <div class="col-md-12 table-responsive col-sm-12">
          <table width="100%" class="table table-bordered">

              <thead>
                <tr>
                  <th >#</th>
                  <th >รายการ</th>
                  <th >ราคา/หน่วย (บาท)</th>
                  <th >จำนวน</th>
                  <th >ราคารวม (บาท)</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($Result['AccountHistory'] as $OrderList): ?>
                  <tr>
                    <td ><?php echo $i ?></td>
                    <td >ค่าธรรมเนียมบัญชีธุรกิจ รหัส (<?php echo $OrderList['account_team'].sprintf("%04d", $OrderList['account_level']).sprintf("%04d", $OrderList['account_code']); ?>)</td>
                    <td >500</td>
                    <td >1</td>
                    <td >500</td>
                  </tr>
                <?php $i++; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-md-9 text-right">
            (ห้าร้อยบาทถ้วน)
          </div>
          <div class="col-md-3 text-right">
            ยอดสุทธิ 500 บาท
          </div>
        </div>
        <div class="row" style="margin-top:150px">
          <div class="col-sm-6">
            <div class="row text-center">
              <div class="col-sm-12">......................................................................</div>
              <div class="col-sm-12">(.....................................................................)</div>
              <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              <div class="col-sm-12">ลายมือชื่อผู้ชำระเงิน</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row text-center">
              <div class="col-sm-12">......................................................................</div>
              <div class="col-sm-12">(.....................................................................)</div>
              <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              <div class="col-sm-12">ลายมือชื่อผู้รับเงิน</div>
            </div>
          </div>
        </div>
      </div>
    </page>
  </div>
