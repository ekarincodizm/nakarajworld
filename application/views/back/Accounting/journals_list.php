<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>รายการบัญชี</h2>
          </div>
          <div class="body table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <!-- <th>เลขเอกสาร</th> -->
                  <th>วันที่</th>
                  <th>รายการ</th>
                  <th>ยอดเงิน</th>
                  <th>ผู้เกี่ยวข้อง</th>
                  <th>เกี่ยวข้อง</th>
                  <th>สถานะ</th>
                  <th>ตัวเลือก</th>
                </tr>
              </thead>
              <tbody>
               <?php $i=1; foreach ($Result['AllFee'] as $Fee): ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <!-- <td><?php //echo $Accounting['accounting_no']; ?></td> -->
                    <td><?php echo $Fee['accounting_date']; ?></td>
                    <td><?php echo $Fee['journals_name']; ?></td>
                    <td><?php echo $Fee['accounting_amount']; ?></td>
                    <td><?php echo $Fee['member_prefix'].$Fee['member_firstname']." ".$Fee['member_lastname']; ?></td>
                    <td>-</td>
                    <td>
                      <?php if ($Fee['accounting_status']==0): ?>
                        <span class="label bg-deep-orange">ค้างชำระ</span>
                      <?php elseif($Fee['accounting_status']==1): ?>
                        <span class="label bg-green">ชำระแล้ว</span>
                      <?php else: ?>
                        <span class="label bg-blue-grey">รอดำเนินการ</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($Fee['accounting_status']==0): ?>
                        <a href="<?php echo site_url('/AccountingController/Payment/'.$Fee['accounting_id']); ?>" class="btn btn-xs bg-orange waves-effect" style="font-size: 13px;">ชำระเงิน</a>
                      <?php elseif($Fee['accounting_status']==1): ?>
                        <a href="<?php echo site_url('/AccountingController/PrintPayment/'.$Fee['accounting_id']); ?>" class="btn  btn-xs btn-info" style="font-size: 13px;">พิมพ์ใบเสร็จ</a>
                      <?php else: ?>
                        <span class="label bg-blue-grey">รอดำเนินการ</span>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php $i++; endforeach; ?>
                <?php $i=1; foreach ($Result['AllAccounting'] as $Accounting): ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <!-- <td><?php //echo $Accounting['accounting_no']; ?></td> -->
                    <td><?php echo $Accounting['accounting_date']; ?></td>
                    <td><?php echo $Accounting['journals_name']; ?></td>
                    <td><?php echo $Accounting['accounting_amount']; ?></td>
                    <td><?php echo $Accounting['member_prefix'].$Accounting['member_firstname']." ".$Accounting['member_lastname']; ?></td>
                    <td><?php echo $Accounting['account_team'].sprintf("%04d", $Accounting['account_level']).sprintf("%04d", $Accounting['account_code']); ?></td>
                    <td>
                      <?php if ($Accounting['accounting_status']==0): ?>
                        <span class="label bg-deep-orange">ค้างชำระ</span>
                      <?php elseif($Accounting['accounting_status']==1): ?>
                        <span class="label bg-green">ชำระแล้ว</span>
                      <?php else: ?>
                        <span class="label bg-blue-grey">รอดำเนินการ</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($Accounting['accounting_status']==0): ?>
                        <a href="<?php echo site_url('/AccountingController/Payment/'.$Accounting['accounting_id']); ?>" class="btn btn-xs bg-orange waves-effect" style="font-size: 13px;">ชำระเงิน</a>
                      <?php elseif($Accounting['accounting_status']==1): ?>
                        <a href="<?php echo site_url('/AccountingController/PrintPayment/'.$Accounting['accounting_id']); ?>" class="btn  btn-xs btn-info" style="font-size: 13px;">พิมพ์ใบเสร็จ</a>
                      <?php else: ?>
                        <span class="label bg-blue-grey">รอดำเนินการ</span>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php $i++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
