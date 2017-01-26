<section class="content" ng-controller="">
  <div class="container-fluid">
    <div class="block-header">
      <h1>สินค้า</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>
              รายการสินค้า
            </h2>

          </div>
          <div class="body">

            <div class="row">
              <div class="col-md-12">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>รหัสสั่งซื้อ</th>
                      <th>วันที่สั่งซื้อ</th>
                      <th>จำนวนรายการสินค้า</th>
                      <th>ราคารวม</th>
                      <th>สถานะ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($SaleOrderList as $row): ?>
                      <tr style="cursor: pointer;" onclick="document.location = '<?php echo site_url('SaleOrder/SaleOrderDetail/'.$row['accounting_id']); ?>';">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['journal_sale_order_detail_code'] ?></td>
                        <td><?php echo $this->thaidate->ShortDateTime($row['journal_sale_order_detail_date']); ?></td>
                        <td><?php echo number_format($row['shop_detail_total_quantity']) ?></td>
                        <td><?php echo number_format($row['shop_detail_total_price']) ?></td>
                        <td>
                          <?php if ($row['accounting_status']==1): ?>
                            <span class="font-bold col-teal">ชำระเงินแล้ว</span>
                          <?php elseif ($row['accounting_status']==0): ?>
                            <span class="font-bold col-orange">ค้างชำระ</span>
                          <?php elseif ($row['accounting_status']==2): ?>
                            <span class="font-bold col-pink">ยกเลิก</span>

                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php $i++; endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
