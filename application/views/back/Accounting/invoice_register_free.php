<section class="content">
  <div class="container-fluid">

    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>รายการค่าธรรมเนียม</h2>
          </div>
          <div class="body table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>รายการ</th>
                  <th>ผู้ชำระเงิน</th>
                  <th>สถานะ</th>
                  <th>ตัวเลือก</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($Result['AllAccounting'] as $Accounting): ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php //echo $Accounting['member_citizen_id']; ?>
                      ค่าธรรมเนียมสมาชิกแรกเข้า
                    </td>
                    <td><?php echo $Accounting['member_prefix'].$Accounting['member_firstname']." ".$Accounting['member_lastname']; ?></td>
                    <td>
                      <?php if ($Accounting['member_status']==0): ?>
                        <span class="label bg-deep-orange">ค้างชำระ</span>
                      <?php elseif($Accounting['member_status']==1): ?>
                        <span class="label bg-green">ชำระแล้ว</span>
                      <?php else: ?>
                        <span class="label bg-blue-grey">รอดำเนินการ</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($Accounting['member_status']==0): ?>
                        <a href="<?php echo site_url('/MemberController/member_edit/'.$Accounting['member_id']); ?>" class="btn btn-xs bg-orange waves-effect" style="font-size: 13px;">ชำระเงิน</a>
                      <?php elseif($Accounting['member_status']==1): ?>
                        <a href="<?php echo site_url('/MemberController/MemberProfilePage/'.$Accounting['member_id']); ?>" class="btn  btn-xs btn-info" style="font-size: 13px;">พิมพ์ใบเสร็จ</a>
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
