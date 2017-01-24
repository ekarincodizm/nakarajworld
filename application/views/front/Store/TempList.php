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
            <h3>ตะกร้าสินค้า</h3>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>รหัสสินค้า</th>
                  <th>ชื่อสินค้า</th>
                  <th>PV</th>
                  <th>ราคา</th>
                  <th style="width:15%">จำนวน</th>
                  <th>ราคารวม</th>
                  <th>PV รวม</th>
                  <th>ตัวเลือก</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; $amount=0; $pv=0; foreach ($TempList as $row): ?>
                  <?php echo form_open('Store/UpdateQuantityShopTemp/'.$row['shop_temp_id']); ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['products_code'] ?></td>
                    <td><?php echo $row['products_name'] ?></td>
                    <td><?php echo $row['products_pv'] ?></td>
                    <td><?php echo number_format($total = $row['products_price_narmal']-($row['products_price_narmal']*$row['products_price_discount']/100)) ?></td>
                    <td>
                      <input name="shop_temp_quantity" type="number" min="1" class="form-control" value="<?php echo $row['shop_temp_quantity']?>" onchange="this.form.submit();">

                    </td>
                    <td><?php echo number_format($total*$row['shop_temp_quantity']) ?></td>
                    <td><?php echo number_format($row['products_pv']*$row['shop_temp_quantity']) ?></td>
                    <td><a href="<?php echo site_url('Store/DelItemShopTemp/'.$row['shop_temp_id'])  ?>" class="btn btn-danger">หยิบออก</a>
                    </td>
                  </tr>
                  <?php echo form_close(); ?>
                  <?php $i++; $amount += $total*$row['shop_temp_quantity']; $pv += $row['products_pv']*$row['shop_temp_quantity']; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php if (count($TempList)>0): ?>
          <div class="col-md-4 text-center">
            <p>ราคารวม <?php echo number_format($amount) ?> บาท</p>
            <p>PV รวม <?php echo number_format($pv) ?> แต้ม</p>
            <a href="<?php echo site_url('Store/CheckOut/'.$_SESSION['MEMBER_ID']);  ?>" class="btn btn-success">
              ยืนยันการสั่งซื้อ
            </a>
          </div>
        <?php endif; ?>

    </div>

    </div>
  </div>
</div>
</section>
