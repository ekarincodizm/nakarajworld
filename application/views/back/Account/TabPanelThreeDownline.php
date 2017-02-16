  <div class="row">
  <div class="col-md-12" style="padding:20px">
    <table class="table js-table" >
      <thead>
        <tr>
          <th>#</th>
          <th>บัญชีนักธุรกิจอิสระ</th>
          <th>ระดับ</th>
          <th>ใต้สายงานทั้งหมด</th>
          <th>ใต้สายงาน</th>
          <th>แนะนำตรง</th>
          <th>สถานะ</th>
          <!-- <th class="noExport">ตัวเลือก</th> -->
        </tr>
      </thead>
      <tbody>
        <?php $i=1; foreach ($ThreeDownline as $row): ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['account_team'].sprintf("%04d", $row['account_level']).sprintf("%04d", $row['account_code']); ?></td>

            <?php if ($row['account_class_id']==1): ?>
              <td class="text-center">
                ทั่วไป
              </td>
            <?php elseif ($row['account_class_id']==2): ?>
              <td class="text-center">
                General
              </td>
            <?php elseif ($row['account_class_id']==3): ?>
              <td class="text-center">
                Bronz
              </td>
            <?php elseif ($row['account_class_id']==4): ?>
              <td class="text-center">
                Silver
              </td>
            <?php elseif ($row['account_class_id']==5): ?>
              <td class="text-center">
                Gold
              </td>
            <?php elseif ($row['account_class_id']==6): ?>
              <td class="text-center">
                Diamond
              </td>
            <?php elseif ($row['account_class_id']==7): ?>
              <td class="text-center">
                Star
              </td>

            <?php endif; ?>
            <td><?php echo $row['count_downline'] ?> รหัส</td>

            <td>
              <?php if ($row['count_three_downline']==3): ?>
                <span class="font-bold col-teal" style="font-size: 15px;">
                  <?php echo $row['count_three_downline'] ?> รหัส</span>
                <?php else: ?>
                  <?php echo $row['count_three_downline'] ?> รหัส
                <?php endif; ?>
              </td>
              <td>
                <?php if ($row['count_adviser']>=3): ?>
                  <span class="font-bold col-teal" style="font-size: 15px;">
                    <?php echo $row['count_adviser'] ?>  รหัส</span>
                  <?php else: ?>
                    <?php echo $row['count_adviser'] ?> รหัส
                  <?php endif; ?>

                </td>
                <td>
                  <?php if ($row['account_status']==1): ?>
                    <span class="font-bold col-teal">เปิดการใช้งาน</span>
                  <?php elseif ($row['account_status']==2): ?>
                    <span class="font-bold col-orange">รอการยืนยัน</span>
                  <?php elseif ($row['account_status']==3): ?>
                    <span class="font-bold col-pink">ปิดการใช้งาน</span>
                  <?php endif; ?>
                </td>

                <!-- <td>
                  <a href="<?php echo site_url('/AccountController/AccountDetailPage/'.$row['account_id']); ?>" class="btn btn-info" style="font-size: 15px;"><i class="material-icons" style="font-size: 15px;">extension</i> รายละเอียด</a>
                </td> -->
              </tr>
              <?php $i++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
