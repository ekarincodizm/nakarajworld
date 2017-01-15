<section id="extra-features" class="separator top">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h6>รหัสสินค้า <?php echo $ProductsDetail[0]['products_code'] ?></h6>
        <h2><?php echo $ProductsDetail[0]['products_name'] ?></h2>
        <span class="title-separator left"></span>
        <p>รายละเอียด : <?php if ($ProductsDetail[0]['products_detail']=='') {
          echo "ไม่มีข้อมูล";
        } else {
          echo $ProductsDetail[0]['products_detail'];
        }
        ?></p>
        <p>อัปเดตล่าสุด : <?php echo $this->thaidate->ShortDate($ProductsDetail[0]['products_update_date']); ?></p>
        <span class="title-separator bottom left"></span>
        <p class="category">
          <?php if ( $ProductsDetail[0]['products_price_discount']>0): ?>
            ราคาปกติ <strike><?php echo  $ProductsDetail[0]['products_price_narmal'] ?></strike> .- <br>ลดเหลือ
          <?php else: ?>
            ราคา
          <?php endif; ?>
          <?php echo  $ProductsDetail[0]['products_price_narmal']-( $ProductsDetail[0]['products_price_narmal']* $ProductsDetail[0]['products_price_discount']/100) ?>.-</p>
          <?php if (isset($_SESSION['MEMBER_ID'])): ?>
            <a href="<?php echo site_url('/Store/AddShopTemp/'.$ProductsDetail[0]['products_id']); ?>" class="btn btn-primary">หยิบใส่ตะกร้า</a>
          <?php else: ?>
            <code class="">เข้าสู่ระบบเพื่อซื้อสินค้า</code>
          <?php endif; ?>
        </div>
        <div id="counter-bg" class="col-lg-6 text-center clearfix">
          <div class="counter-box">
            <img src="<?php echo base_url('assets/image/products/'.$ProductsDetail[0]['products_image']); ?>" class="img-rounded" style="max-height:350px;">
          </div>
        </div>

      </div>
    </div>
  </section>
