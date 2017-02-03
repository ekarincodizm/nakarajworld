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
          <th class="text-center">ระดับ</th>
          <th class="text-center">สถานะ</th>
          <!-- <th>ตัวเลือก</th> -->
        </tr>
      </thead>
      <tbody>

        <?php
        // $this->debuger->prevalue($AccountingList);
        $i=1; foreach ($DividendID as $row): ?>
        <!-- <tr style="cursor: pointer;" onclick="document.location = '<?php echo site_url('/Accounting/AccountingDetail/'.$row['accounting_id']); ?>';"> -->
          <td><?php echo $i; ?></td>
          <td>
            <?php echo $row['source_detail'][0]['journal_dividend_code']; ?>
          </td>
          <td>
            <?php echo $row['journals_detail']; ?>
          </td>
          <td class="text-right">
            <?php if ($row['source_detail'][0]['journal_dividend_amount']==0): ?>
              <strong class="text-muted">-</strong>
            <?php else: ?>
              <strong class="text-success"><?php echo number_format($row['source_detail'][0]['journal_dividend_amount']); ?></strong>
            <?php endif; ?>
          </td>

          <!-- แปลงระดับ -->
          <?php if ($row['source_detail'][0]['journal_dividend_class']==1 || $row['source_detail'][0]['journal_dividend_class']==0): ?>
            <td class="text-center">
              ทั่วไป
            </td>
          <?php elseif ($row['source_detail'][0]['journal_dividend_class']==2): ?>
            <td class="text-center">
              General
            </td>
          <?php elseif ($row['source_detail'][0]['journal_dividend_class']==3): ?>
            <td class="text-center">
              Bronz
            </td>
          <?php elseif ($row['source_detail'][0]['journal_dividend_class']==4): ?>
            <td class="text-center">
              Silver
            </td>
          <?php elseif ($row['source_detail'][0]['journal_dividend_class']==5): ?>
            <td class="text-center">
              Gold
            </td>
          <?php elseif ($row['source_detail'][0]['journal_dividend_class']==6): ?>
            <td class="text-center">
              Diamond
            </td>
          <?php elseif ($row['source_detail'][0]['journal_dividend_class']==7): ?>
            <td class="text-center">
              Star
            </td>

          <?php endif; ?>


          <td>
            <h4 class="text-center">
              <?php if ($row['source_detail'][0]['journal_dividend_class'] <= $row['account'][0]['account_class_id']): ?>

                <?php if ($row['accounting_status']==2): ?>
                  <a class="btn btn-success" href="<?php echo site_url('/Accounting/ConfirmDividend/'.$row['accounting_id']); ?>">
                    ออกใบเสร็จ
                  </a>
                <?php elseif ($row['accounting_status']==1): ?>
                  <span class="label bg-green ">ชำระแล้ว</span>
                <?php elseif ($row['accounting_status']==0): ?>
                  <a class="btn btn-warning" href="<?php echo site_url('/Accounting/AccountingDetail/'.$row['accounting_id']); ?>">
                    ชำระเงิน
                  </a>
                <?php endif; ?>

              <?php else: ?>
              <span class="label bg-blue-grey">ไม่ตรงเงื่อนไข</span>
            <?php endif; ?>
            </h4>
          </td>
        </tr>
        <?php $i++; endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
