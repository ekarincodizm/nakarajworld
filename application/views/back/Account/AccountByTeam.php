<div class="card">
  <div class="header">
    <h2>
      เครือข่ายแบ่งตามทีม
      <!-- <small>Add quick, dynamic tab functionality to transition through panes of local content</small> -->
    </h2>

  </div>
  <div class="body">


    <!-- Nav tabs -->
    <?php if ($_SESSION['ADMIN_TYPE']==1): ?>

      <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#TeamA" data-toggle="tab">ทีม A</a></li>
        <?php for ($i="B"; $i <= "I"; $i++): ?>
          <li role="presentation"><a href="#Team<?php echo $i;?>" data-toggle="tab">ทีม <?php echo $i;?></a></li>
        <?php endfor ?>
      </ul>

      <?php else: ?>

        <ul class="nav nav-tabs tab-nav-right" role="tablist">
          <li role="presentation" class="active"><a href="#Team<?php echo $_SESSION['ADMIN_TEAM']?>" data-toggle="tab">ทีม <?php echo $_SESSION['ADMIN_TEAM']?></a></li>
        </ul>

        <?php endif; ?>

    <!-- Tab panes -->
    <div class="tab-content">
      <?php for ($t="A"; $t <= "I"; $t++): ?>
        <?php if ($t=="A"): ?>
          <div role="tabpanel" class="tab-pane fade in active" id="TeamA">
          <?php else: ?>
            <div role="tabpanel" class="tab-pane fade" id="Team<?php echo $t;?>">
            <?php endif; ?>
            <div class="body table-responsive">
              <table class="table js-table" style="font-size:11px;">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>บัญชีนักธุรกิจอิสระ</th>
                    <th>เจ้าของบัญชี</th>
                    <th>ดาวน์ไลน์ทั้งหมด</th>
                    <th>ดาวน์ไลน์ติดตัว</th>
                    <th>แนะนำผู้อื่น</th>
                    <th>สถานะ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($AccountList as $row): ?>
                    <?php if ($row['account_team']==$t): ?>
                      <tr style="cursor: pointer;" onclick="document.location = '<?php echo site_url('/Member/AccountDetail/'.$row['account_id']); ?>';">

                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['account_team'].sprintf("%04d", $row['account_level']).sprintf("%04d", $row['account_code']); ?></td>
                        <!-- <td><?php //echo $row['adviser'][0]['account_team'].sprintf("%04d", $row['adviser'][0]['account_level']).sprintf("%04d", $row['adviser'][0]['account_code']); ?></td> -->
                        <!-- <td><?php //echo $row['upline'][0]['account_team'].sprintf("%04d", $row['upline'][0]['account_level']).sprintf("%04d", $row['upline'][0]['account_code']); ?></td> -->
                        <td><?php echo $row['member_prefix'].$row['member_firstname']." ".$row['member_lastname']?></td>
                        <td><?php echo $row['count_downline'] ?> รหัส</td>
                        <td>
                          <?php if ($row['count_three_downline']==3): ?>
                            <span class="font-bold col-teal">
                              <?php echo $row['count_three_downline'] ?>  รหัส</span>
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
                          </tr>
                        <?php endif; ?>
                        <?php $i++; endforeach; ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              <?php endfor ?>

            </div>
          </div>
        </div>
