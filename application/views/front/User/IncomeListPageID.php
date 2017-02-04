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
            <h2>
              เกี่ยวกับบัญชีธุรกิจ รหัส <?php echo $Account[0]['account_team'].sprintf("%04d", $Account[0]['account_level']).sprintf("%04d", $Account[0]['account_code']); ?>
              <?php if (count($JounalExtendAccount)>0 && $JounalExtendAccount[0]['journal_extend_expired_date']<Date('Y-m-d')): ?>
                <span class="">(หมดอายุ)</span>
              <?php endif; ?>
            </h2>
          </div>
          <?php $this->load->view('back/Member/WidgetAccountID.php'); ?>

                <div class="row">
                  <div class="col-md-10">

                  </div>

                </div>
                <div class="body">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <!-- <li role="presentation" class="active"><a href="#AllDownline" data-toggle="tab" aria-expanded="true">ดาวน์ไลน์ทั้งหมด</a></li> -->
                    <li role="presentation" class="active"><a href="#Income" data-toggle="tab" aria-expanded="false">ค่าการตลาด</a></li>
                    <li role="presentation" class=""><a href="#ThreeDownline" data-toggle="tab" aria-expanded="false">ดาวน์ไลน์ติดตัว</a></li>
                    <li role="presentation" class=""><a href="#Adviser" data-toggle="tab" aria-expanded="false">แนะนำผู้อื่น</a></li>
                    <li role="presentation" class=""><a href="#Upline" data-toggle="tab" aria-expanded="false">อัปไลน์</a></li>
                    <!-- <li role="presentation" class=""><a href="#Bookbank" data-toggle="tab" aria-expanded="false">บัญชีธนาคาร</a></li> -->
                    <li role="presentation" class=""><a href="#Extend" data-toggle="tab" aria-expanded="false">การต่ออายุ</a></li>
                    <!-- <li role="presentation" class=""><a href="#Upclass" data-toggle="tab" aria-expanded="false">ระดับ</a></li> -->
                    <!-- <li role="presentation" class=""><a href="#takeid" data-toggle="tab" aria-expanded="false">โอนกรรมสิทธิ์</a></li> -->
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade active in" id="Income">
                      <?php $this->load->view('front/User/TabPanelIncome'); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="ThreeDownline">
                      <?php $this->load->view('front/User/TabPanelThreeDownline'); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Adviser">
                      <?php $this->load->view('front/User/TabPanelAdviser'); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Upline">
                      <?php $this->load->view('front/User/TabPanelUpline'); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Extend">
                      <?php $this->load->view('front/User/TabPanelExtend'); ?>
                    </div>

                    <!-- <div role="tabpanel" class="tab-pane fade" id="Upclass">
                    <?php //$this->load->view('back/Account/TabPanelUpclass'); ?>
                  </div> -->

                  <!-- <div role="tabpanel" class="tab-pane fade" id="takeid">
                  <?php $this->load->view('back/Account/TabPanelTakeid'); ?>
                </div> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
