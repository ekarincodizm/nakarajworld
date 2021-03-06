<section class="content" ng-controller="">
  <div class="container-fluid">
    <div class="block-header">
      <h1>สินค้า</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header bg-cyan">
            <h2>
              เพิ่มสินค้า
            </h2>

          </div>
          <div class="body">
            <?php echo form_open_multipart('/Products/SaveProducts'); ?>
            <input type="hidden" name="products_code" value="<?php echo $ProductsDetail[0]['products_code'] ?>">
            <input type="hidden" name="products_id" value="<?php echo $ProductsDetail[0]['products_id'] ?>">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">ชื่อสินค้า</label>
                  <div class="form-line">
                    <input name="products_name" type="text" class="form-control input-lg" value="<?php echo $ProductsDetail[0]['products_name'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">ค่า PV</label>
                  <div class="form-line">
                    <input name="products_pv" type="text" class="form-control input-lg" value="<?php echo $ProductsDetail[0]['products_pv'] ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">รายละเอียด</label>
                  <div class="form-line">
                    <textarea name="products_detail" rows="8" cols="80" class="form-control input-lg"><?php echo $ProductsDetail[0]['products_detail'] ?></textarea>
                    <!-- <input name="products_detail" type="text" class="form-control input-lg"> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">ราคาปกติ</label>
                  <div class="form-line">
                    <input name="products_price_narmal" type="number" class="form-control input-lg" value="<?php echo $ProductsDetail[0]['products_price_narmal'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">ส่วนลด (%)</label>
                  <div class="form-line">
                    <input name="products_price_discount" type="number" step="any" class="form-control input-lg" value="<?php echo $ProductsDetail[0]['products_price_discount'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">ราคาขาย</label>
                  <div class="form-line">
                    <input disabled type="text" class="form-control input-lg" value="<?php echo $ProductsDetail[0]['products_price_narmal']-($ProductsDetail[0]['products_price_narmal']*$ProductsDetail[0]['products_price_discount']/100) ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- <div class="col-sm-4">
                <div class="form-group">
                  <label for="">สินค้าคงคลัง</label>
                  <div class="form-line">
                    <input name="products_stock" type="number" class="form-control input-lg" value="<?php echo $ProductsDetail[0]['products_stock'] ?>">
                  </div>
                </div>
              </div> -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">หน่วยนับ</label>
                  <div class="form-line">
                    <input name="products_unit" type="text" class="form-control input-lg" value="<?php echo $ProductsDetail[0]['products_unit'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">รูปสินค้า</label>
                  <div class="form-line">
                    <input type="hidden" name="products_image_old" value="<?php echo $ProductsDetail[0]['products_image']; ?>">
                    <input name="products_image" type="file" class="form-control input-lg" >
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-lg btn-success">
                  บันทึก
                </button>
                <?php if ($ProductsDetail[0]['products_status'] == 0): ?>
                  <a href="<?php echo site_url('Products/Editstatus/'.$ProductsDetail[0]['products_id'].'/'.$ProductsDetail[0]['products_status']); ?>" type="submit" class="btn btn-lg btn-info" >
                    เปิดการใช้งานสินค้านี้
                  </a>
                <?php else: ?>
                  <a href="<?php echo site_url('Products/Editstatus/'.$ProductsDetail[0]['products_id'].'/'.$ProductsDetail[0]['products_status']); ?>" type="submit" class="btn btn-lg btn-danger">
                    ปิดการใช้งานสินค้านี้
                  </a>
                <?php endif; ?>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
