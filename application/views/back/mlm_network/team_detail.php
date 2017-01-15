<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>ทีม <?php echo $Result['Member'][0]['member_team']; ?></h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>
              รายละเอียดทีม <?php echo $Result['Member'][0]['member_team']; ?><small> จำนวน สมาชิกทั้งหมด</small>
            </h2>

          </div>
          <div class="body table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>รหัสสมาชิก</th>
                  <th>ชื่อ - สกุล</th>
                </tr>
              </thead>
              <tbody>
                <?php $item = 1; foreach ($Result['Member'] as $Member): ?>
                  <tr>
                    <th scope="row"><?php echo $item; ?></th>
                    <td><a href="<?php echo site_url('/Admin_controller/user_detail_by_id/'.$Member['member_id']); ?>"><?php echo $Member['member_team'].sprintf("%04d", $Member['member_level']).$Member['member_code']; ?></a></td>
                    <td><?php echo $Member['member_name']; ?></td>
                  </tr>
                  <?php $item++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
