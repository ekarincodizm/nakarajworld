<section class="content">
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
            <table class="table table-striped js-table table-hover">
              <thead>
                <tr>
                  <th>ประเภทบัตร</th>
                  <th>เลขบัตรประจำตัว</th>
                  <th>ชื่อ-สกุล</th>
                  <!-- <th>PV</th> -->
                  <th>สถานะ</th>
                  <!-- <th class="noExport">ตัวเลือก</th> -->
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($MemberList as $row): ?>
                  <tr style="cursor: pointer;" onclick="document.location='<?php echo site_url('/Member/MemberProfile/'.$row['member_id']); ?>';">
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
                    <td><?php echo $row['member_prefix'].$row['member_firstname']." ".$row['member_lastname']." <font color='blue'>(PV:".number_format($row['total_pv']-$row['total_used_pv']).")</font>" ?></td>
                    <!-- <td><?php echo $PV ?> </td> -->
                    <td>
                      <?php  if ($row['member_status']==1): ?>
                        <span class="font-bold col-teal">เปิดการใช้งาน</span>
                      <?php  elseif ($row['member_status']==2):?>
                        <span class="font-bold col-orange">รอการยืนยัน</span>
                      <?php  elseif ($row['member_status']==0):?>
                        <span class="font-bold col-pink">ปิดการใช้งาน</span>
                      <?php  endif  ?>
                    </td>

                  </tr>
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>


            </div>
          </div>

        </div>
      </section>
