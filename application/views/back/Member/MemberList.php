<section class="content" ng-controller="MemberCtrl">
  <div class="container-fluid">
    <div class="block-header">
      <h1>สมาชิก</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>
              รายชื่อสมาชิก
            </h2>
            <ul class="header-dropdown">
              <li>
                <a href="<?php echo site_url('/Member/NewMember/'); ?>">
                  <i class="material-icons">person_add</i>
                </a>
              </li>
            </ul>
          </div>
          <div class="body table-responsive">
            <table class="table table-striped js-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ประเภทบัตร</th>
                  <th>เลขบัตรประจำตัว</th>
                  <th>ชื่อ-สกุล</th>
                  <th>สถานะ</th>
                  <th class="noExport">ตัวเลือก</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($MemberList as $row): ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                      <?php  if ($row['member_id_card_type']==1): ?>
                        <span >บัตรประชาชน</span>
                      <?php  elseif ($row['member_id_card_type']==2):?>
                        <span >Passport</span>
                      <?php  elseif ($row['member_id_card_type']==3):?>
                        <span >Work Permit</span>
                      <?php  endif  ?>
                    </td>
                    <td><?php echo $row['member_citizen_id'] ?></td>
                    <td><?php echo $row['member_prefix'].$row['member_firstname']." ".$row['member_lastname'] ?></td>
                    <td>
                      <?php  if ($row['member_status']==1): ?>
                        <span class="font-bold col-teal">เปิดการใช้งาน</span>
                      <?php  elseif ($row['member_status']==2):?>
                        <span class="font-bold col-orange">รอการยืนยัน</span>
                      <?php  elseif ($row['member_status']==0):?>
                        <span class="font-bold col-pink">ปิดการใช้งาน</span>
                      <?php  endif  ?>
                    </td>
                    <td>
                      <a href="<?php echo site_url('/Member/MemberProfile/'.$row['member_id']); ?>" class="btn btn-xs btn-info" style="font-size: 15px;">
                        <i class="material-icons"  style="font-size: 15px;">account_box</i>
                        รายละเอียด
                      </a>
                    </td>
                  </tr>
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>


            </div>
          </div>

        </div>
      </section>
