

<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>เอกสารการบัญชี</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>ค้นหารายการบัญชี</h2>
          </div>
          <div class="body">
            <div class="row clearfix">
              <?php echo form_open('/Accounting/SearchAccountingList'); ?>
              <div class="col-md-2 col-md-offset-3">
                <div class="form-group">
                  <div class="form-line">
                    <label>จากวันที่ </label>
                    <input id="dateFrom"  class="form-control input-medium" type="text"  data-provide="datepicker" data-date-language="th-th" required>
      							<input id="setDateFrom" type="text" name="fromDate" style="display:none">

                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="form-line">
                    <label>ถึงวันที่ </label>

                    <input id="dateTo"  class="form-control input-medium" type="text"  data-provide="datepicker" data-date-language="th-th" required>
      							<input id="setDateTo" type="text" name="toDate" style="display:none">
                  </div>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <div class="form-line">
                    <button type="submit" class="btn btn-block btn-lg btn-info">ค้นหา</button>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>

            </div>
            <div class="row">
            <?php if ($fromDate != "" && $toDate != ""): ?>
              <div class="col-md-12 text-center">
                <p class="col-pink font-bold">ผลการค้นหา จากวันที่ <?php echo $this->thaidate->FullDate($fromDate); ?> ถึงวันที่ <?php echo $this->thaidate->FullDate($toDate); ?></p>
                <p class="col-pink font-bold">ข้อมูลที่พบ <?php echo count($AccountingList); ?> รายการ</p>
              </div>
            <?php endif; ?>
            </div>
          </div>
        </div>

      </div>
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
                    <?php echo ellipsize($row['accounting_no'], 7); ?>
                  </td>
                  <td>
                    <?php echo $this->thaidate->ShortDate($row['accounting_date']); ?>
                  </td>
                  <td>
                    <?php echo $row['journals_detail']; ?>
                  </td>
                  <td class="text-right">
                    <?php if ($row['source_amount']==0): ?>
                      <strong class="text-muted">-</strong>
                    <?php else: ?>
                      <?php if ($row['journals_type']==4 || $row['member']['member_id']==1): ?>
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
    </div>
  </section>
