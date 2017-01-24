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
                <?php elseif ($SaleOrderDetail[0]['accounting_status']==2): ?>
                  <span class="font-bold col-orange">สถานะ: ค้างชำระ</span>
                  <div class="row">
                    <div class="col-md-12">
                      <a href="<?php echo site_url('/SaleOrder/ConfirmPayment/'.$SaleOrderDetail[0]['journal_sale_order_detail_id']); ?>" class="btn btn-block btn-lg bg-teal waves-effect" >ยืนยันการชำระเงิน</a>
                    </div>
                  </div>
                <?php elseif ($SaleOrderDetail[0]['accounting_status']==0): ?>
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
