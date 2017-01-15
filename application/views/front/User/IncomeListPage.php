<?php $this->load->view('front/User/UserID'); ?>

<section id="extra-features" class="separator top">
  <div class="container" >
    <div class="row">
      <div class="col-md-2">
        <?php $this->load->view('front/Template/UserMenu'); ?>
      </div>
      <div class="col-md-10" style="font-size:13px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1><?php echo $Profile[0]['member_prefix'].$Profile[0]['member_firstname']." ".$Profile[0]['member_lastname']?></h1>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table js-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>เลขเอกสาร</th>
                  <th>วันที่</th>
                  <th>รายการ</th>
                  <th>ยอดเงิน</th>
                  <!-- <th>ผู้เกี่ยวข้อง</th> -->
                  <th>เกี่ยวข้อง</th>
                  <th>สถานะ</th>

                </tr>
              </thead>
              <tbody>

                <?php $i=1; foreach ($IncomeAccounting as $Accounting): ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo "IN".sprintf("%05d", $Accounting['accounting_id']); ?></td>
                    <td><?php echo $this->thaidate->FullDate($Accounting['accounting_date']); ?></td>
                    <td><?php echo $Accounting['journals_name']; ?></td>
                    <td><?php echo $Accounting['accounting_amount']; ?></td>
                    <!-- <td><?php echo $Accounting['member_prefix'].$Accounting['member_firstname']." ".$Accounting['member_lastname']; ?></td> -->
                    <td><?php echo $Accounting['account_team'].sprintf("%04d", $Accounting['account_level']).sprintf("%04d", $Accounting['account_code']); ?></td>
                    <td>
                      <?php if ($Accounting['accounting_status']==0): ?>
                        <span class="label label-warning">ค้างชำระ</span>
                      <?php elseif($Accounting['accounting_status']==1): ?>
                        <span class="label label-success">ชำระแล้ว</span>
                      <?php else: ?>
                        <span class="label label-default">รอดำเนินการ</span>
                      <?php endif; ?>
                    </td>

                  </tr>
                  <?php $i++; endforeach; ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
