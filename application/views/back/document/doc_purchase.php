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
              <h1 class="text-center">ใบสั่งผลิต</h1>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-sm-4 col-xs-4 text-right">
          <p>เลขที่ <?php echo $Result['ProductionCode']; ?> <br>
           สั่งผลิต <?php echo $Result['ProductionDetail'][0]['prod_order_detail_date']; ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 table-responsive col-sm-12">
          <table width="100%" class="table table-bordered">
              <colgroup>
                <col class="auto-cell-size p-r-20">
              </colgroup>
              <thead>
                <tr>
                  <th >#</th>
                  <th >รหัสสินค้า</th>
                  <th >ชื่อสินค้า</th>
                  <th >จำนวน</th>
                  <th >หน่วย</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($Result['OrderList'] as $OrderList): ?>
                  <tr>
                    <td ><?php echo $i ?></td>
                    <td ><?php echo $OrderList['products_code'] ?></td>
                    <td ><?php echo $OrderList['products_name'] ?></td>
                    <td ><?php echo $OrderList['prod_order_items_quantity'] ?></td>
                    <td ><?php echo $OrderList['products_unit'] ?></td>
                  </tr>
                <?php $i++; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row" style="margin-top:150px">
          <div class="col-sm-6">
            <div class="row text-center">
              <div class="col-sm-12">......................................................................</div>
              <div class="col-sm-12">(.....................................................................)</div>
              <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              <div class="col-sm-12">ลายมือชื่อผู้อนุมัติ</div>
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
