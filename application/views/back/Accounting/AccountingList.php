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
            <table class="table js-table">
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
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo "IN".sprintf("%05d", $row['accounting_id']); ?></td>
                    <td><?php echo $this->thaidate->FullDate($row['accounting_date']); ?></td>
                    <td>
                      <?php echo $row['journals_detail']; ?>
                    </td>
                    <td><?php echo $row['source_amount']; ?></td>
                    <td>
                      <?php echo $row['member']['member_prefix'].$row['member']['member_firstname']." ".$row['member']['member_lastname']; ?>
                    </td>
                    <td>
                      <?php echo $row['source_code']; ?>
                    </td>
                    <td>
                      <?php if ($row['accounting_status']==0): ?>
                        <span class="label bg-deep-orange">ค้างชำระ</span>
                      <?php elseif($row['accounting_status']==1): ?>
                        <span class="label bg-green">ชำระแล้ว</span>
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
