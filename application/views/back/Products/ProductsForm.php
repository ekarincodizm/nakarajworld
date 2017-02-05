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
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">ชื่อสินค้า</label>
                  <div class="form-line">
                    <input name="products_name" required type="text" class="form-control input-lg">
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">ค่า PV</label>
                  <div class="form-line">
                    <input name="products_pv" required type="text" class="form-control input-lg">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">รายละเอียด</label>
                  <div class="form-line">
                    <textarea name="products_detail" required rows="8" cols="80" class="form-control input-lg"></textarea>
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
                    <input name="products_price_narmal" required type="number" class="form-control input-lg">
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">ส่วนลด (%)</label>
                  <div class="form-line">
                    <input name="products_price_discount" type="number" step="any" class="form-control input-lg">
                  </div>
                </div>
              </div>
              <!-- <div class="col-sm-4">
                <div class="form-group">
                  <label for="">ราคาขาย</label>
                  <div class="form-line">
                    <input disabled type="text" class="form-control input-lg">
                  </div>
                </div>
              </div> -->
            </div>
            <div class="row">
              <!-- <div class="col-sm-4">
                <div class="form-group">
                  <label for="">สินค้าคงคลัง</label>
                  <div class="form-line">
                    <input name="products_stock" required type="number" class="form-control input-lg">
                  </div>
                </div>
              </div> -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">หน่วยนับ</label>
                  <div class="form-line">
                    <input name="products_unit" required type="text" class="form-control input-lg">
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">รูปสินค้า</label>
                  <div class="form-line">
                    <input name="products_image" required type="file" class="form-control input-lg">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-lg btn-success">
                  บันทึก
                </button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
