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
            <h3>รายละเอียดการสั่งซื้อ (รหัส <?php echo $InvoiceDetail[0]['journal_sale_order_detail_code'] ?>)</h3>
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
                <?php $i=1; $amount=0; $pv=0; foreach ($InvoiceDetail as $row): ?>

                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['products_code'] ?></td>
                    <td><?php echo $row['products_name'] ?></td>
                    <td><?php echo number_format($row['journal_sale_order_item_price']) ?></td>
                    <td><?php echo number_format($row['journal_sale_order_item_pv']) ?></td>
                    <td><?php echo number_format($row['journal_sale_order_item_quantity']) ?></td>
                    <td><?php echo number_format($row['journal_sale_order_item_price']*$row['journal_sale_order_item_quantity']) ?></td>
                    <td><?php echo number_format($row['journal_sale_order_item_pv']*$row['journal_sale_order_item_quantity']) ?></td>
                  </td>
                </tr>
                <?php echo form_close(); ?>
                <?php $i++; $amount += $row['journal_sale_order_item_price']*$row['journal_sale_order_item_quantity'];
                            $pv += $row['journal_sale_order_item_pv']*$row['journal_sale_order_item_quantity'];
               endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php if ($InvoiceDetail[0]['accounting_status']==2): ?>
        <?php //$this->debuger->prevalue($InvoiceDetail); ?>
        <?php if (count($InvoiceDetail)>0): ?>
          <div class="col-md-4 text-center">
            <div class="row">
              <div class="col-md-12">
                <p>ราคารวม <?php echo number_format($amount) ?> บาท</p>
                <p>ราคารวม <?php echo number_format($pv) ?> แต้ม</p>
                <a href="<?php echo site_url('Store/CancelPurchase/'.$InvoiceDetail[0]['journal_sale_order_detail_id']);  ?>" class="btn btn-danger">
                  ยกเลิกการสั่งซื้อ
                </a>
              </div>
            </div>
            <hr>
            <div class="row">
              <?php echo form_open_multipart('Store/UploadFileSlip/'.$InvoiceDetail[0]['journal_sale_order_detail_id']); ?>
              <input type="hidden" name="shop_detail_code" value="<?php echo $InvoiceDetail[0]['journal_sale_order_detail_code'] ?>">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">หลักฐานการชำระเงิน</label>
                  <input type="file" class="form-control" name="journal_sale_order_detail_slip">
                  <p class="help-block">อัปโหลดไฟล์ยืนยันการชำระเงิน</p>
                </div>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-default">อัปโหลด</button>
              </div>
              <?php echo form_close(); ?>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <?php if ($InvoiceDetail[0]['journal_sale_order_detail_slip']!=''): ?>
                  <img src="<?php echo base_url('assets/image/slip/'.$InvoiceDetail[0]['journal_sale_order_detail_slip']); ?>" class="img-rounded img-responsive" >

                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>

      <?php elseif($InvoiceDetail[0]['accounting_status']==1): ?>
          <div class="col-md-4 text-center">
            <div class="row">
              <div class="col-md-12">
                <h3><span class="text text-success">ชำระแล้ว</span></h3>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <?php if ($InvoiceDetail[0]['journal_sale_order_detail_slip']!=''): ?>
                  <img src="<?php echo base_url('assets/image/slip/'.$InvoiceDetail[0]['journal_sale_order_detail_slip']); ?>" class="img-rounded img-responsive" >

                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php elseif($InvoiceDetail[0]['accounting_status']==0): ?>
          <div class="col-md-4 text-center">
            <div class="row">
              <div class="col-md-12">
                <h3><span class="text text-danger">ยกเลิก</span></h3>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <?php if ($InvoiceDetail[0]['journal_sale_order_detail_slip']!=''): ?>
                  <img src="<?php echo base_url('assets/image/slip/'.$InvoiceDetail[0]['journal_sale_order_detail_slip']); ?>" class="img-rounded img-responsive" >

                <?php endif; ?>
              </div>
            </div>
          </div>
      <?php endif; ?>


    </div>

  </div>
</div>
</div>
</section>
