
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php echo $Result['Counselor'][0]['member_name']; ?> <span class="col-blue-grey">(รหัส <?php echo $Result['Counselor'][0]['member_code']; ?>)</span>
                            <small>ผู้แนะนำ </small>
                        </h2>

                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <b>ข้อมูลส่วนตัว</b>
                                <p>
                                    <?php echo $Result['Counselor'][0]['member_detail']; ?>
                                </p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <b>ข้อมูลเครือข่าย</b>
                                <p>
                                    เครือข่ายทั้งหมด <?php echo $Result['MemberCount']; ?> คน</br>
                                    เป้าหมาย 2 คน
                                </p>

                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            เครือข่าย
                        </h2>

                    </div>
                    <div class="body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รหัสสมาชิก</th>
                                    <th>ชื่อ - สกุล</th>
                                    <th>เครือข่าย</th>
                                    <th>เป้าหมาย</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>

                              <?php $item = 1; foreach ($Result['Member'] as $Member): ?>
                                <tr>
                                    <th scope="row"><?php echo $item; ?></th>
                                    <td><a href=""><?php echo $Member['member_code']; ?></a></td>
                                    <td><?php echo $Member['member_name']; ?></td>
                                    <?php $MemberCount = $this->db->where('member_counselor', $Member['member_code'])->get('mlm_member')->num_rows(); ?>     <!-- ดึงจำนวนเครือข่ายออกมา ค้นหาจาก $Member['member_code'] -->
                                    <td><?php echo $MemberCount; ?></td>
                                    <td><span class="badge bg-grey">3 คน</span></td>
                                    <td><span class="badge bg-green">ปกติ</span></td>

                                </tr>
                                  <?php $item++; endforeach; ?>

                                <!-- <tr>
                                    <th scope="row">1</th>
                                    <td>0000003</td>
                                    <td>นางสาวลีลาวดี สิงหา</td>
                                    <td>21 คน</td>
                                    <td><span class="badge bg-grey">3 คน</span></td>
                                    <td><span class="badge bg-green">ปกติ</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>0000004</td>
                                    <td>นายชูเมือง นาดี</td>
                                    <td>5 คน</td>
                                    <td><span class="badge bg-green">1 คน</span></td>
                                    <td><span class="badge bg-green">ปกติ</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>0000004</td>
                                    <td>นายชูเมือง นาดี</td>
                                    <td>5 คน</td>
                                    <td><span class="badge bg-pink">2 คน</span></td>
                                    <td><span class="badge bg-green">ปกติ</span></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
