<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>เอกสารการบัญชี</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2><?php echo "เลขที่บัญชี ".$SaleOrderDetail[0]['journal_sale_order_detail_code']." ".$SaleOrderDetail[0]['journals_detail'] ?>
              <a href="<?php echo site_url('SaleOrder/resultSale/'.$SaleOrderDetail[0]['journal_sale_order_detail_id']); ?>" target="_blank" class="btn btn-purple"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</a>
            </h2>

          </div>
          <div class="body">
            <div class="row">
              <div class="col-md-6">
                <h5>เกี่ยวกับเอกสาร</h5>
                <p>
                  วันที่ : <?php echo $this->thaidate->FullDate($SaleOrderDetail[0]['accounting_date']); ?><br>
                  ต้นฉบับ : : <?php echo $SaleOrderDetail[0]['accounting_source_id']; ?><br>
                  สถานะ : <?php if ($SaleOrderDetail[0]['accounting_status']==0): ?>
                    <span class="label bg-deep-orange">ค้างชำระ</span>
                  <?php elseif($SaleOrderDetail[0]['accounting_status']==1): ?>
                    <span class="label bg-green">ชำระแล้ว</span>
                  <?php else: ?>
                    <span class="label bg-blue-grey">รอดำเนินการ</span>
                  <?php endif; ?>
                </p>
              </div>
              <div class="col-md-6">
                <h5>ผู้เกี่ยวข้อง</h5>
                <?php echo $NAVA[0]['member_prefix'].$NAVA[0]['member_firstname']." ".$NAVA[0]['member_lastname']; ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>รหัสสินค้า</th>
                      <th>ชื่อสินค้า</th>
                      <th class="text-right">จำนวน</th>
                      <th class="text-right">ราคาต่อหน่วย</th>
                      <th class="text-right">ยอดรวม</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $i=1; $amount=0; foreach ($SaleOrderDetail as $row): ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['products_code'] ?></td>
                        <td><?php echo $row['products_name'] ?></td>
                        <td class="text-right"><?php echo number_format($row['journal_sale_order_item_quantity']) ?></td>
                        <td class="text-right"><?php echo number_format($row['journal_sale_order_item_price']) ?></td>
                        <td class="text-right"><?php echo number_format($row['journal_sale_order_item_price']*$row['journal_sale_order_item_quantity']) ?></td>
                      </td>
                    </tr>

                    <?php $i++; $amount += $row['journal_sale_order_item_price']*$row['journal_sale_order_item_quantity']; endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 text-right">

              </div>
              <div class="col-md-6 text-right">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>ราคา</td>
                      <td><?php echo $amount;?></td>
                      <td>บาท</td>
                    </tr>
                    <tr>
                      <td>ภาษี(7%)</td>
                      <td>ไม่มี</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>ราคาสุทธิ</td>
                      <td><?php echo $amount; ?></td>
                      <td>บาท</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>

        </div>
      </section>














<section class="content" ng-controller="">
  <div class="container-fluid">
    <div class="block-header">
      <h1>สินค้า</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-8">
        <div class="card">
          <div class="header">
            <h2>
              เลขที่ใบสั่งซื้อ <?php echo $SaleOrderDetail[0]['journal_sale_order_detail_code'] ?>
          </div>
          <div class="body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>รหัสสินค้า</th>
                      <th>ชื่อสินค้า</th>
                      <th>PV</th>
                      <th>ราคา</th>
                      <th style="width:10%">จำนวน</th>
                      <th>ราคารวม</th>
                      <th>PV รวม</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; $amount=0; foreach ($SaleOrderDetail as $row): ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['products_code'] ?></td>
                        <td><?php echo $row['products_name'] ?></td>
                        <td><?php echo $row['journal_sale_order_item_pv'] ?></td>
                        <td><?php echo number_format($row['journal_sale_order_item_price']) ?></td>
                        <td><?php echo number_format($row['journal_sale_order_item_quantity']) ?></td>
                        <td><?php echo number_format($row['journal_sale_order_item_price']*$row['journal_sale_order_item_quantity']) ?></td>
                        <td><?php echo number_format($row['journal_sale_order_item_pv']*$row['journal_sale_order_item_quantity']) ?></td>
                      </td>
                    </tr>

                    <?php $i++; $amount += $row['journal_sale_order_item_price']*$row['journal_sale_order_item_quantity']; endforeach; ?>
                  </tbody>
                </table>
                <a href="<?php echo site_url('SaleOrder/resultSale/'.$SaleOrderDetail[0]['journal_sale_order_detail_id']); ?>" target="_blank" class="btn btn-purple"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</a>
            </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="body">
            <div class="row">
              <div class="col-md-12 text-center" style="font-size: 25px;margin-bottom:0px;">
                <?php if ($SaleOrderDetail[0]['accounting_status']==1): ?>
                  <span class="font-bold col-teal">สถานะ: ชำระเงินแล้ว</span>
                <?php elseif ($SaleOrderDetail[0]['accounting_status']==0): ?>
                  <span class="font-bold col-orange">สถานะ: ค้างชำระ</span>
                  <div class="row">
                    <div class="col-md-12">
                      <a href="<?php echo site_url('/Accounting/ConfirmInvoice/'.$SaleOrderDetail[0]['journal_sale_order_detail_id']."/".$SaleOrderDetail[0]['accounting_id']); ?>" class="btn btn-block btn-lg bg-teal waves-effect" >ยืนยันการชำระเงิน</a>
                    </div>
                  </div>
                <?php elseif ($SaleOrderDetail[0]['accounting_status']==2): ?>
                  <span class="font-bold col-pink">สถานะ: ยกเลิก</span>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="header">
            <h2>
              หลักฐานการจ่ายเงิน
            </h2>
          </div>
          <div class="body">
            <div class="row">
              <div class="col-md-12">
                <?php if ($SaleOrderDetail[0]['journal_sale_order_detail_slip']!=''): ?>
                  <img src="<?php echo base_url('assets/image/slip/'.$SaleOrderDetail[0]['journal_sale_order_detail_slip']); ?>" class="img-rounded img-responsive" >
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
