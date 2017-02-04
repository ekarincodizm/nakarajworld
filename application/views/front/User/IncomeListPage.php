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
                  <th>วันที่</th>
                  <th>เลขที่เอกสาร</th>
                  <th>รายการ</th>
                  <th class="text-right">ยอดเงิน</th>
                  <th class="text-center">ระดับ</th>
                  <th class="text-center">สถานะ</th>

                </tr>
              </thead>
              <tbody>
                <?php //echo "55555".$IncomeAccounting[0]['source_detail'][0]['journal_dividend_code'] ?>
                <?php
                // $this->debuger->prevalue($AccountingList);
                $i=1; foreach ($IncomeAccounting as $row): ?>
                <!-- <tr style="cursor: pointer;" onclick="document.location = '<?php echo site_url('/Accounting/AccountingDetail/'.$row['accounting_id']); ?>';"> -->
                  <td><?php echo $i; ?></td>
                  <td>
                    <?php echo $this->thaidate->Shortdate($row['accounting_date']); ?>
                  </td>
                  <td>
                    <?php echo $row['source_code']; ?>
                  </td>
                  <td>
                    <?php echo $row['journals_detail']; ?>
                  </td>
                  <td class="text-right">
                    <?php if ($row['source_amount']==0): ?>
                      <strong class="text-muted">-</strong>
                    <?php else: ?>
                      <strong class="text-success"><?php echo number_format($row['source_amount']); ?></strong>
                    <?php endif; ?>
                  </td>

                  <!-- แปลงระดับ -->
                  <?php if ($row['source_detail'][0]['journal_dividend_class']==1): ?>
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
                            สามารถรับเงินได้
                        <?php elseif ($row['accounting_status']==1): ?>
                          <span class="label bg-green ">รับเงินแล้ว</span>
                        <?php elseif ($row['accounting_status']==0): ?>
                            ยังไม่ได้รับเงิน
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
      </div>
    </div>
  </div>
</div>
</div>
</section>
