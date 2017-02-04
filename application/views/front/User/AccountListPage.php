<?php $this->load->view('front/User/UserID'); ?>

<section id="extra-features" class="separator top">
  <div class="container" >

    <div class="row">
      <div class="col-md-2">
        <?php $this->load->view('front/Template/UserMenu'); ?>
      </div>
      <div class="col-md-10" style="font-size:13px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1><?php echo $Profile[0]['member_prefix'].$Profile[0]['member_firstname']." ".$Profile[0]['member_lastname']?></h1>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
              <li role="presentation" class="active text-center" style="font-size: 18px;" ><a href="#TeamA" data-toggle="tab" >ทีม A</a></li>
              <?php for ($i="B"; $i <= "I"; $i++): ?>
                <li role="presentation" class=" text-center" style="font-size: 18px;"><a href="#Team<?php echo $i;?>" data-toggle="tab">ทีม <?php echo $i;?></a></li>
              <?php endfor ?>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="padding:20px">
              <!-- <div class="row">

              <div class="col-md-12" > -->
              <?php for ($t="A"; $t <= "I"; $t++): ?>
                <?php if ($t=="A"): ?>
                  <div role="tabpanel" class="tab-pane fade in active" id="TeamA">
                  <?php else: ?>
                    <div role="tabpanel" class="tab-pane fade" id="Team<?php echo $t;?>">
                    <?php endif; ?>
                    <div class="">
                      <table class="table js-table" >
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>บัญชีนักธุรกิจอิสระ</th>
                            <!-- <th>เจ้าของบัญชี</th> -->
                            <th>ดาวน์ไลน์ทั้งหมด</th>
                            <th>ดาวน์ไลน์ติดตัว</th>
                            <th>แนะนำผู้อื่น</th>
                            <th>สถานะ</th>
                            <th class="noExport">ตัวเลือก</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1; foreach ($AccountList as $row): ?>
                            <?php if ($row['account_team']==$t): ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['account_team'].sprintf("%04d", $row['account_level']).sprintf("%04d", $row['account_code']); ?></td>
                                <td><?php echo $row['count_downline'] ?> รหัส</td>
                                <td>
                                  <?php if ($row['count_three_downline']==3): ?>
                                    <span class="label label-success" >
                                      <?php echo $row['count_three_downline'] ?>  รหัส</span>
                                    <?php else: ?>
                                      <?php echo $row['count_three_downline'] ?> รหัส
                                    <?php endif; ?>
                                  </td>
                                  <td>
                                    <?php if ($row['count_adviser']>=3): ?>
                                      <span class="label label-success" >
                                        <?php echo $row['count_adviser'] ?>  รหัส</span>
                                      <?php else: ?>
                                        <?php echo $row['count_adviser'] ?> รหัส
                                      <?php endif; ?>

                                    </td>
                                    <td>
                                      <?php if ($row['account_status']==1): ?>
                                        <span class="font-bold col-teal">เปิดการใช้งาน</span>
                                      <?php elseif ($row['account_status']==2): ?>
                                        <span class="font-bold col-orange">รอการยืนยัน</span>
                                      <?php elseif ($row['account_status']==3): ?>
                                        <span class="font-bold col-pink">ปิดการใช้งาน</span>
                                      <?php endif; ?>
                                    </td>
                                    <td>
                                      <a href="<?php echo site_url('/HomePage/IncomeListByID/'.$row['account_id']); ?>" class="btn btn-info"> รายละเอียด</a>
                                    </td>
                                  </tr>
                                <?php endif; ?>
                                <?php $i++; endforeach; ?>
                              </tbody>
                            </table>

                          </div>
                        </div>
                      <?php endfor ?>

                      <!-- </div> -->
                    </div>
                  </div>
                <!-- </div>
              </div> -->

                </div>
              </div>


            </div>
          </div>
        </div>
        <!-- </div> -->
      </section>
