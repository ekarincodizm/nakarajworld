<?php if ($Result['MemberProfile'][0]['member_status']!=1): ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <a class="btn btn-lg btn-success" href="<?php echo site_url('/MemberController/ApprovedMember/'.$this->uri->segment(3)); ?>">อนุมัติและชำระค่าธรรมเนียม</a>
        </div>
      </div>

  </div>
  </section>
<?php else: ?>
<section class="content">
  <div class="container-fluid">
    <!-- <div class="block-header">
    <h1>รายชื่อสมาชิก</h1>
  </div> -->
  <?php $this->load->view('back/member/widget_member_profile.php'); ?>
  <div class="row clearfix">
    <div class="col-md-12">
      <div class="card">
        <div class="header">
          <h2>บัญชีสมาชิก</h2>
          <ul class="header-dropdown">
            <li>
              <a href="<?php echo site_url('/AccountController/SearchAccountByUplineCodePage/'.$Result['MemberProfile'][0]['member_id']); ?>">
                <i class="material-icons">person_add</i>
              </a>
            </li>
          </ul>
        </div>
        <div class="body table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>รหัสบัญชี</th>
              <th>อัพไลน์</th>
                <th>ผู้แนะนำ</th>
                <th>สถานะ</th>
                <th>ตัวเลือก</th>
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
                    <td>
                      <a href="<?php echo site_url('/AccountController/AccountDetailPage/'.$AccountList['account_id']); ?>"
                        class="btn btn-info">รายละเอียด</a>
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
<?php endif; ?>
