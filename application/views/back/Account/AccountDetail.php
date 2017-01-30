<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>
        เกี่ยวกับบัญชีธุรกิจ รหัส <?php echo $Account[0]['account_team'].sprintf("%04d", $Account[0]['account_level']).sprintf("%04d", $Account[0]['account_code']); ?>
        <?php if ($JounalExtendAccount[0]['journal_extend_expired_date']<Date('Y-m-d')): ?>
          <span class="">(หมดอายุ)</span>
            <?php endif; ?>
          </h1>
        </div>
        <?php $this->load->view('back/Member/WidgetAccount.php'); ?>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header">
                <h2>
                  เกี่ยวกับบัญชีธุรกิจ รหัส <?php echo $Account[0]['account_team'].sprintf("%04d", $Account[0]['account_level']).sprintf("%04d", $Account[0]['account_code']); ?>
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
              <!-- <li role="presentation" class="active"><a href="#AllDownline" data-toggle="tab" aria-expanded="true">ดาวน์ไลน์ทั้งหมด</a></li> -->
              <li role="presentation" class="active"><a href="#ThreeDownline" data-toggle="tab" aria-expanded="false">ดาวน์ไลน์ติดตัว</a></li>
              <li role="presentation" class=""><a href="#Adviser" data-toggle="tab" aria-expanded="false">แนะนำผู้อื่น</a></li>
              <li role="presentation" class=""><a href="#Upline" data-toggle="tab" aria-expanded="false">อัปไลน์</a></li>
              <!-- <li role="presentation" class=""><a href="#Bookbank" data-toggle="tab" aria-expanded="false">บัญชีธนาคาร</a></li> -->
              <li role="presentation" class=""><a href="#Extend" data-toggle="tab" aria-expanded="false">การต่ออายุ</a></li>
              <li role="presentation" class=""><a href="#Upclass" data-toggle="tab" aria-expanded="false">ระดับ</a></li>
              <li role="presentation" class=""><a href="#takeid" data-toggle="tab" aria-expanded="false">โอนกรรมสิทธิ์</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

              <div role="tabpanel" class="tab-pane fade active in" id="ThreeDownline">
                <?php $this->load->view('back/Account/TabPanelThreeDownline'); ?>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="Adviser">
                <?php $this->load->view('back/Account/TabPanelAdviser'); ?>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="Upline">
                <?php $this->load->view('back/Account/TabPanelUpline'); ?>
              </div>

              <div role="tabpanel" class="tab-pane fade" id="Extend">
                <?php $this->load->view('back/Account/TabPanelExtend'); ?>
              </div>

              <div role="tabpanel" class="tab-pane fade" id="Upclass">
                <?php $this->load->view('back/Account/TabPanelUpclass'); ?>
              </div>

              <div role="tabpanel" class="tab-pane fade" id="takeid">
                <?php $this->load->view('back/Account/TabPanelTakeid'); ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
