<section id="extra-features" class="separator top">
  <div class="container" style="min-height: 410px;">
    <div class="row">
      <div class="col-md-12">
        <p>คุณ..</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2" style="font-size:13px;">
        <div class="bs-example" data-example-id="simple-nav-stacked">
          <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
            <li role="presentation" class="active"><a href="#">เครือข่าย</a></li>
            <li role="presentation"><a href="#">เงินปันผล</a></li>
            <li role="presentation"><a href="<?php echo site_url('home_controller/profile');?>">กลับไปยังโปรไฟล์</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-10" style="font-size:13px;">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>รหัสบัญชี</th>
            <th>อัพไลน์</th>
              <th>ผู้แนะนำ</th>
              <th>สถานะ</th>
              <!-- <th>ตัวเลือก</th> -->
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($Result['AccountList'] as $AccountList): ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $AccountList['account_team'].sprintf("%04d", $AccountList['account_level']).sprintf("%04d", $AccountList['account_code']); ?></td>
                <td><?php echo $AccountList['adviser'][0]['account_team'].sprintf("%04d", $AccountList['adviser'][0]['account_level']).sprintf("%04d", $AccountList['adviser'][0]['account_code']); ?></td>
                <td><?php echo $AccountList['upline'][0]['account_team'].sprintf("%04d", $AccountList['upline'][0]['account_level']).sprintf("%04d", $AccountList['upline'][0]['account_code']); ?></td>
                <td>
                  <?php if ($AccountList['account_status']==0): ?>
                    ยังไม่เปิดใช้งาน
                  <?php elseif($AccountList['account_status']==1): ?>
                  เปิดใช้งาน
                  <?php else: ?>
                    รอดำเนินการ
                  <?php endif; ?>

                </td>
                  <!-- <td>
                    <a href="<?php echo site_url('/AccountController/AccountDetailPage/'.$AccountList['account_id']); ?>"
                      class="btn btn-info">รายละเอียด</a>
                    </td> -->
                </tr>
                <?php $i++; endforeach; ?>
              </tbody>
            </table>
      </div>
    </div>
  </div>
</div>
</section>
