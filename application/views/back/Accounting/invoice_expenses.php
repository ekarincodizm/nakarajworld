<section class="content">
  <div class="container-fluid">

    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>รายการค่าใช้จ่าย</h2>
            <small>รายจ่ายเงินปันผล</small>
          </div>
          <div class="body table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>รายการ</th>
                  <th>ผู้รับเงิน</th>
                  <th>สถานะ</th>
                  <th>ตัวเลือก</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($Result['AllExpenses'] as $Expenses): ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                      เงินปัญผล
                    </td>
                    <td><?php echo $Expenses['member_prefix'].$Expenses['member_firstname']." ".$Expenses['member_lastname']; ?></td>
                    <td>
                      <?php if ($Expenses['accounting_status']==0): ?>
                        <span class="label bg-deep-orange">ค้างชำระ</span>
                      <?php elseif($Expenses['accounting_status']==1): ?>
                        <span class="label bg-green">ชำระแล้ว</span>
                      <?php else: ?>
                        <span class="label bg-blue-grey">รอดำเนินการ</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($Expenses['member_status']==0): ?>
                        <a href="<?php echo site_url('/MemberController/member_edit/'.$Expenses['accounting__id']); ?>" class="btn btn-xs bg-orange waves-effect" style="font-size: 13px;">ชำระเงิน</a>
                      <?php elseif($Expenses['member_status']==1): ?>
                        <a href="<?php echo site_url('/MemberController/MemberProfilePage/'.$Expenses['accounting__id']); ?>" class="btn  btn-xs btn-info" style="font-size: 13px;">พิมพ์ใบเสร็จ</a>
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
