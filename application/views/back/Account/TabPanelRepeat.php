<!-- <div class="row" ng-app="HomePageApp"> -->
<div class="row">
  <div class="col-md-offset-0 col-md-12 ">
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
      <!-- <li role="presentation" class=""><a href="#1" data-toggle="tab" aria-expanded="false">Normal(ทดสอบ)</a></li> -->
      <li role="presentation" class=""><a href="#" data-toggle="tab" aria-expanded="false">ระดับ : </a></li>
      <li role="presentation" class=""><a href="#2" data-toggle="tab" aria-expanded="false">General</a></li>
      <li role="presentation" class=""><a href="#3" data-toggle="tab" aria-expanded="false">Bronz</a></li>
      <li role="presentation" class=""><a href="#4" data-toggle="tab" aria-expanded="false">Silver</a></li>
      <li role="presentation" class=""><a href="#5" data-toggle="tab" aria-expanded="false">Gold</a></li>
      <li role="presentation" class=""><a href="#6" data-toggle="tab" aria-expanded="false">Diamond</a></li>
      <li role="presentation" class=""><a href="#7" data-toggle="tab" aria-expanded="false">Star</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <!-- GENERAL -->
      <?php $i=1;?>
      <?php foreach ($Class as $row): ?>

          <!-- Panel -->
          <div role="tabpanel" class="tab-pane fade" id="<?php echo $i;?>">
              <?php if ($Account[0]['account_class_id']>=$i): ?>
              <!-- Head -->
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $row['account_class'];?>
                <p>ต้องใช้ <?php echo $row['account_class_pv'] ?> PV เพื่อเลื่อนระดับ</p>
                <?php $pv = $MyPv[0]['temp_total_pv']-$MyPv[0]['temp_total_used_pv'];?>
                <p>PV รวมปัจจุบัน <font color="blue"><?php echo $pv ?> </font>PV</p>
                <?php if (($pv-$row['account_class_pv'])<0): ?>
                  <p class="text-danger">ขาด <?php echo $pv-$row['account_class_pv'] ?> PV</p>
                <?php else: ?>
                  <p>คงเหลือ <?php echo $pv-$row['account_class_pv'] ?> PV</p>
                  <!-- <button type="button" class="btn bg-deep-orange" ng-click="AccountUpclass(<?php //echo $Profile[0]['member_id'] ?>);"> -->
                  <a href="<?php echo site_url('/Account/RepeatAccount/'.$Account[0]['account_id']."/".$row['account_class_id']."/".$Profile[0]['member_id'])?>" class="btn bg-blue">ซื้อซ้ำ</a>
                <?php endif; ?>
              </div>
            </div>
            <!-- End Head -->

            <!-- Body -->
            <div class="row">
              <div class="col-md-offset-2 col-md-8">
                <table class="table table">
                  <thead>
                    <tr>
                      <th class="text-center">วันที่</th>
                      <th class="text-center">ระดับ</th>
                      <th class="text-center">รอบที่ซื้อ</th>
                    </thead>
                    <tbody>
                      <?php foreach ($AccountRepeat as $row2): ?>
                        <?php if ($row2['account_repeat_class']==$i): ?>
                          <tr>
                            <td class="text-center"><?php echo $row2['account_repeat_date']?></td>
                            <td class="text-center"><?php echo $row['account_class']?></td>
                            <td class="text-center"><?php echo $row2['account_repeat_round']?></td>
                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php else: ?>
                <h1>ระดับของบัญชีไม่เพียงพอ</h1>
            <?php endif; ?>
              <!-- End Body -->
            </div>
            <!-- End Panel -->

          <?php $i++; endforeach; ?>
        </div>
      </div>
    </div>
