<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>เอกสารการบัญชี</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>รายการเอกสารการเงิน</h2>
          </div>
          <div class="body table-responsive">
            <table class="table js-table table-hover">
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
                  <!-- <th>ตัวเลือก</th> -->
                </tr>
              </thead>
              <tbody>

                <?php
                // $this->debuger->prevalue($AccountingList);
                $i=1; foreach ($AccountingList as $row): ?>
                  <tr style="cursor: pointer;" onclick="document.location = '<?php echo site_url('/Accounting/AccountingDetail/'.$row['accounting_id']); ?>';">
                    <td><?php echo $i; ?></td>
                    <td>
                      <?php echo $row['accounting_no']; ?></td>
                    <td>
                        <?php echo $this->thaidate->ShortDate($row['accounting_date']); ?>
                    </td>
                    <td>
                      <?php echo $row['journals_detail']; ?>
                    </td>
                    <td>
                      <?php if ($row['source_amount']==0): ?>
                        <strong class="text-muted"><?php echo number_format($row['source_amount']); ?></strong>
                        <?php else: ?>
                          <?php if ($row['journals_type']==4): ?>
                            <strong class="text-success"><?php echo number_format($row['source_amount']); ?></strong>
                          <?php elseif ($row['journals_type']==5): ?>
                            <strong class="text-danger"><?php echo number_format($row['source_amount']); ?></strong>
                          <?php endif; ?>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php echo $row['member']['member_firstname']; ?>
                    </td>
                    <td>
                      <?php echo $row['source_code']; ?>
                    </td>
                    <td>
                      <h4>
                      <?php if ($row['accounting_status']==0): ?>
                        <span class="label bg-deep-orange">ค้างชำระ</span>
                      <?php elseif($row['accounting_status']==1): ?>
                        <span class="label bg-green">ชำระแล้ว</span>
                      <?php else: ?>
                        <span class="label bg-blue-grey">รอดำเนินการ</span>
                      <?php endif; ?>
                      </h4>
                    </td>
                  </tr>
                  <?php $i++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
