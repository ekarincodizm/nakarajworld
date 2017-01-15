<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>เอกสารการเงินธุรกิจเครือข่าย</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>รายการเอกสารการเงิน</h2>
          </div>
          <div class="body table-responsive">
            <table class="table js-table" style="font-size:11px;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>เลขเอกสาร</th>
                  <th>วันที่</th>
                  <th>รายการ</th>
                  <th>ยอดเงิน</th>
                  <th>ผู้เกี่ยวข้อง</th>
                  <th>อ้างอิง</th>
                  <th>สถานะ</th>
                  <th>ตัวเลือก</th>
                </tr>
              </thead>
              <tbody>

                <?php
                // $this->debuger->prevalue($AllAccounting);
                $i=1; foreach ($AllAccounting as $Accounting): ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo "IN".sprintf("%05d", $Accounting['accounting_id']); ?></td>
                    <td><?php echo $this->thaidate->FullDate($Accounting['accounting_date']); ?></td>
                    <td>
                      <?php if ($Accounting['accounting_system_note']!=''): ?>
                        <?php echo $Accounting['accounting_system_note']; ?>
                        <?php else: ?>
                        <?php echo $Accounting['journals_name']; ?>
                      <?php endif; ?>
                    </td>
                    <td><?php echo $Accounting['accounting_amount']; ?></td>
                    <td>
                      <?php echo $Accounting['member_prefix'].$Accounting['member_firstname']." ".$Accounting['member_lastname']; ?>
                    </td>
                    <td>
                      <?php if ($Accounting['accounting_source_id']!='' && $Accounting['accounting_source_id']!=0): ?>
                        <?php //echo $Accounting['accounting_source_id']." --- " ?>
                        <?php echo $Accounting['account_team'].sprintf("%04d", $Accounting['account_level']).sprintf("%04d", $Accounting['account_code']); ?>
                        <?php else: ?>
                          ไม่มี
                      <?php endif; ?>
                    </td>
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
                        <a href="<?php echo site_url('Accounting/Payment/'.$Accounting['accounting_id']); ?>" class="btn btn-xs bg-orange waves-effect" style="font-size: 13px;">ชำระเงิน</a>
                      <?php elseif($Accounting['accounting_status']==1): ?>
                        <a href="<?php echo site_url('SaleOrder/Payment/'.$Accounting['accounting_id']); ?>" target="_blank" class="btn btn-xs bg-info waves-effect" style="font-size: 13px;">พิมพ์ใบเสร็จ</a>
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
