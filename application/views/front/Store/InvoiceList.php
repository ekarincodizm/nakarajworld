<?php $this->load->view('front/User/UserID'); ?>

<section id="extra-features" class="separator top">
  <div class="container" >
    <div class="row">
      <div class="col-md-2">
        <?php $this->load->view('front/Template/UserShopMenu'); ?>
      </div>
      <div class="col-md-6" style="font-size:13px;">
        <div class="row">
          <div class="col-md-12">
            <h3>การชำระเงิน</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>รหัสสั่งซื้อ</th>
                  <th>วันที่สั่งซื้อ</th>
                  <th>จำนวนรายการสินค้า</th>
                  <th>ราคารวม</th>
                  <th>ตัวเลือก</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($InvoiceList as $row): ?>

                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['shop_detail_code'] ?></td>
                    <td><?php echo $this->thaidate->ShortDateTime($row['shop_detail_date']); ?></td>
                    <td><?php echo number_format($row['shop_detail_total_quantity']) ?></td>
                    <td><?php echo number_format($row['shop_detail_total_price']) ?></td>
                    <td>
                      <a href="<?php echo site_url('Store/InvoiceDetail/'.$row['shop_detail_id'])  ?>" class="btn btn-info">รายละเอียด</a>
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
  </div>
</div>
</section>
