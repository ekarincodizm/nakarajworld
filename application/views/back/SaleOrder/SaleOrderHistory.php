<?php
$this->debuger->front_load_js('jquery.min');
$this->debuger->front_load_js('moment-with-locales.min');
$this->debuger->front_load_js('transition');
$this->debuger->front_load_js('collapse');
$this->debuger->front_load_js('bootstrap.min');
$this->debuger->front_load_js('bootstrap-datetimepicker');
 ?>

<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>ระบบการขาย</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>
              สรุปการขายสินค้า
            </h2>
            <?php echo form_open('/SaleOrderHistory') ?>

            <div class="col-md-3">

              <div class="form-group">
                <label for="name">ตั้งแต่วันที่</label>
                <div class='input-group date bootstrap-datepicker form-line' id='search_for_datepicker'>
                  <input name="for_date" type='datetime' class="form-control" >
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>

            </div>
            <div class="col-md-3">
              <label for="name">ถึงวันที่</label>
              <div class="form-group">
                <div class='input-group date bootstrap-datepicker form-line' id='search_to_datepicker'>
                  <input name="to_date" type='datetime' class="form-control" >
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>

            </div>

              <button type="submit" class="btn btn-info">ค้นหา</button>
            <?php echo form_close(); ?>
          </div>
          <div class="body">
            <div class="row">
              <div class="col-md-12">
                <div id="bar-sale-summary"></div>


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
                      <th>จำนวน</th>
                      <th>ยอดขาย</th>
                      <!-- <th>ตัวเลือก</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $labels = array(); $ykeys=array(); $json = array(); $json[0]['x']='สินค้า'; $p='y'; $color = array(); $j=0; $i=1; foreach ($SaleOrderHistory as $row): ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['products_code'] ?></td>
                      <td><?php echo $row['products_name'] ?></td>
                      <td><?php echo $row['shop_total_quantity']." ".$row['products_unit'] ?> </td>
                      <td><?php echo $row['shop_total_price'] ?> บาท</td>

                      <!-- <td>
                        <a href="<?php echo site_url('Products/EditProducts/'.$row['products_id']); ?>" class="btn btn-info">
                          รายละเอียด
                        </a>
                      </td> -->
                      <?php

                      // $json[$j]['y'] = $row['products_code'];
                      // $json[$j]['a'] = $row['shop_total_price'];
                      $json[0][$p] = $row['shop_total_price'];

                      $random_color = '#'.substr(md5(rand()), 0, 6);
                      array_push($color, $random_color);

                      array_push($ykeys, $p);
                      array_push($labels, $row['products_code']);

                      ?>
                    </tr>
                  <?php $i++; $j++; $p++; endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url('assets/theme/back-end/plugins/raphael/raphael.min.js')  ?>"></script>
    <script src="<?php echo base_url('assets/theme/back-end/plugins/morrisjs/morris.js') ?>"></script>

    <script type="text/javascript">
    Morris.Bar({
        element: 'bar-sale-summary',
        data: <?php echo json_encode($json) ?>,
        xkey: 'x',
        ykeys: <?php echo json_encode($ykeys) ?>,
        labels: <?php echo json_encode($labels) ?>,
        barColors: <?php echo json_encode($color) ?>,


    });
    </script>
