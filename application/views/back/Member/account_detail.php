<section class="content">
  <div class="container-fluid">
    <!-- <div class="block-header">
    <h1>รายชื่อสมาชิก</h1>
  </div> -->
  <?php $this->load->view('back/member/widget_member_profile.php'); ?>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>
            เกี่ยวกับบัญชีธุรกิจ รหัส <?php echo $Result['MemberProfile'][0]['account_team'].sprintf("%04d", $Result['MemberProfile'][0]['account_level']).sprintf("%04d", $Result['MemberProfile'][0]['account_code']); ?>
            <!-- <small>Add quick, dynamic tab functionality to transition through panes of local content</small> -->
          </h2>

        </div>
        <div class="row">
          <div class="col-md-10">

          </div>
          <!-- <?php $id = $Result['AccountDetail'][0]['account_id']; ?> -->
          <!-- <div class="col-md-2">
            <?php if(count($Result['BookbankDetail'])==0): ?>
            <a href="<?php echo site_url('/AccountController/bank_add'); ?>">เพิ่มบัญชีธนาคาร <?php echo $Result['AccountDetail']; ?> </a>
          <?php endif; ?>
          </div> -->
        </div>
        <div class="body">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="true">บัญชีธนาคาร</a></li>
            <li role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="false">ใบแจ้งหนี้</a></li>
            <!-- <li role="presentation" class=""><a href="#messages" data-toggle="tab" aria-expanded="false">MESSAGES</a></li>
            <li role="presentation" class=""><a href="#settings" data-toggle="tab" aria-expanded="false">SETTINGS</a></li> -->
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="home">
              ธนาคาร: <br>
              สาขา: <br>
              ชื่อบัญชี: <br>
              หมายเลขบัญชี: <br>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="profile">
              <div class="row">
                <div class="col-md-12 table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>วันที่ต่ออายุ</th>
                        <th>วันที่หมดอายุ</th>
                        <th>สถานะ</th>
                        <th>ตัวเลือก</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($Result['AccountHistory'] as $AccountHistory): ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $AccountHistory['account_history_register_date'];?></td>
                          <td><?php echo $AccountHistory['account_history_expired_date'];?></td>
                          <td>
                            <?php if ($AccountHistory['account_history_status']==2): ?>
                              <span class="label bg-deep-orange">ยังไม่เปิดใช้งาน</span>
                            <?php elseif($AccountHistory['account_history_status']==1): ?>
                              <span class="label bg-green">เปิดใช้งาน</span>
                            <?php else: ?>
                              <span class="label bg-blue-grey">รอดำเนินการ</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if ($AccountHistory['account_history_status']==2): ?>
                              <a href="<?php echo site_url('/AccountController/ProcessEnableAccount/'.$AccountHistory['account_history_id']); ?>"
                                class="btn btn-info">ชำระค่าสมัคร</a>
                              <?php elseif($AccountHistory['account_history_status']==1): ?>
                                <a target="_blank" href="<?php echo site_url('/AccountController/PrintAccountInvoice/'.$AccountHistory['account_history_id']); ?>"
                                  class="btn btn-info">พิมพ์ใบแจ้งหนี้</a>
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


                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
