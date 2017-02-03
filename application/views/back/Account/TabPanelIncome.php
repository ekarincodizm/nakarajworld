<div class="row">
  <div class="col-md-12" style="padding:20px">
    <table class="table js-table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>เลขที่เอกสาร</th>
          <!-- <th>วันที่</th> -->
          <th>รายการ</th>
          <th class="text-right">ยอดเงิน</th>
          <!-- <th>อ้างอิง</th> -->
          <th class="text-center">สถานะ</th>
          <!-- <th>ตัวเลือก</th> -->
        </tr>
      </thead>
      <tbody>

        <?php
        // $this->debuger->prevalue($AccountingList);
        $i=1; foreach ($DividendID as $row): ?>
        <tr style="cursor: pointer;" onclick="document.location = '<?php echo site_url('/Accounting/AccountingDetail/'.$row['accounting_id']); ?>';">
          <td><?php echo $i; ?></td>
          <td>
            <?php echo $row['journal_dividend_code']; ?>
          </td>
          <td>
            <?php echo "รายได้ ค่าการตลาด"; ?>
          </td>
          <td class="text-right">
            <?php if ($row['journal_dividend_amount']==0): ?>
              <strong class="text-muted">-</strong>
            <?php else: ?>
              <strong class="text-success"><?php echo number_format($row['journal_dividend_amount']); ?></strong>
            <?php endif; ?>
          </td>
          <td>
            <h4 class="text-center">
              <?php if ($row['journal_dividend_class']==0): ?>
                <span class="label bg-deep-orange ">ค้างชำระ</span>
              <?php elseif($row['journal_dividend_class']==1): ?>
                <span class="label bg-green ">ชำระแล้ว</span>
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
