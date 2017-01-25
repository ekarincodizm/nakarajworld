<?php  $var = $AccountingDetail[0]; ?>
<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>เอกสารการบัญชี</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2><?php echo "เลขที่บัญชี ".$var['accounting_no']." ".$var['journals_detail'] ?> </h2>
          </div>
          <div class="body">
            <div class="row">
              <div class="col-md-6">
                <h5>เกี่ยวกับเอกสาร</h5>
                <p>
                  วันที่ : <?php echo $this->thaidate->FullDate($var['accounting_date']); ?><br>
                  ต้นฉบับ : : <?php echo $var['source_code']; ?><br>
                  สถานะ : <?php if ($var['accounting_status']==0): ?>
                    <span class="label bg-deep-orange">ค้างชำระ</span>
                  <?php elseif($var['accounting_status']==1): ?>
                    <span class="label bg-green">ชำระแล้ว</span>
                  <?php else: ?>
                    <span class="label bg-blue-grey">รอดำเนินการ</span>
                  <?php endif; ?>
                </p>
              </div>
              <div class="col-md-6">
                <h5>ผู้เกี่ยวข้อง</h5>
                <?php echo $var['member']['member_prefix'].$var['member']['member_firstname']." ".$var['member']['member_lastname']; ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>รายการ</th>
                      <th class="text-right">จำนวน</th>
                      <th class="text-right">ราคาต่อหน่วย</th>
                      <th class="text-right">ยอดรวม</th>
                    </tr>
                  </thead>
                  <tbody>

                      <tr>
                        <td>1</td>
                        <td><?php echo $var['journals_detail'] ?></td>
                        <td class="text-right">1</td>
                        <td class="text-right"><?php echo $var['source_amount'] ?></td>
                        <td class="text-right"><?php echo $var['source_amount'] ?></td>
                      </tr>

                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 text-right">

              </div>
              <div class="col-md-6 text-right">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>ราคา</td>
                      <td>300</td>
                      <td>บาท</td>
                    </tr>
                    <tr>
                      <td>ภาษี(7%)</td>
                      <td>ไม่มี</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>ราคาสุทธิ</td>
                      <td>300</td>
                      <td>บาท</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>

        </div>
      </section>
