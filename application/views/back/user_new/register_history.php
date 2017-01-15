<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>รายชื่อสมาชิก</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <!-- <div class="header">
          <h2>TASK INFOS</h2>

        </div> -->
        <div class="body table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>เลขประจำตัว</th>
                <th>ชื่อ-สกุล</th>
                <th>สถานะ</th>
                <th>ตัวเลือก</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($Result['MemberList'] as $MemberList): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $MemberList['member_citizen_id']; ?></td>
                  <td><?php echo $MemberList['member_prefix'].$MemberList['member_firstname']." ".$MemberList['member_lastname']; ?></td>
                  <td>
                    <?php if ($MemberList['member_status']==2): ?>
                      <span class="label bg-deep-orange">ยังไม่เปิดใช้งาน</span>
                    <?php elseif($MemberList['member_status']==1): ?>
                        <span class="label bg-green">เปิดใช้งาน</span>
                      <?php else: ?>
                          <span class="label bg-blue-grey">รอดำเนินการ</span>
                    <?php endif; ?>
                    <?php //echo $MemberList['member_status']; ?></td>
                  <td><button type="button" name="button" class="btn btn-info">เพิ่มเติม</button></td>
                </tr>
                <?php $i++; endforeach; ?>
              </tbody>
            </table>
        </div>
      </div>

      </div>
    </section>
