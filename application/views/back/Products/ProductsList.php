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
                <a href="<?php echo site_url('/Products/NewProducts'); ?>" class="btn btn-lg btn-info">
                  เพิ่มสินค้า
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>รหัสสินค้า</th>
                      <th>ชื่อสินค้า</th>
                      <th>ราคาขาย</th>
                      <th>PV</th>
                      <th>สินค้าคงเหลือ</th>
                      <th>สถานะ</th>
                      <!-- <th>ตัวเลือก</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($ProductsList as $row): ?>
                    <tr style="cursor: pointer;" onclick="document.location = '<?php echo site_url('Products/EditProducts/'.$row['products_id']); ?>';">
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['products_code'] ?></td>
                      <td><?php echo $row['products_name'] ?></td>
                      <td><?php echo $row['products_price_narmal']-($row['products_price_narmal']*$row['products_price_discount']/100) ?></td>
                      <td><?php echo $row['products_pv'] ?></td>
                      <td><?php echo $row['products_stock']." ".$row['products_unit'] ?></td>
                      <td>
                        <?php if ($row['products_status']==1): ?>
                          เปิดใช้งาน
                        <?php elseif ($row['products_status']==0): ?>
                            ปิดการใช้งาน
                        <?php endif; ?>

                      </td>
                      <!-- <td>
                        <a href="<?php //echo site_url('Products/EditProducts/'.$row['products_id']); ?>" class="btn btn-info">
                          รายละเอียด
                        </a>
                      </td> -->
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
