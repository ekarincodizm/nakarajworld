<!-- <section class="content">
<div class="container-fluid">
<div class="row clearfix">
<div class="col-md-12">
<button type="button" class="btn bg-blue-grey waves-effect">ค้นหาใหม่</button>
</div>
</div>
</div>
</div>
</section> -->

<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="card">
                <div class="header bg-light-blue">
                    <h2>
                        เกี่ยวกับบัญชีใหม่
                        <!-- <small>Description text here...</small> -->
                    </h2>

                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>ดาวน์ไลน์ใหม่</h5>
                            <div class="media">
                                <div class="media-left">

                                        <img class="media-object" class="img-circle" src="http://placehold.it/64x64" width="64" height="64">

                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo "คุณ".$Result['Member'][0]['member_firstname']." ".$Result['Member'][0]['member_firstname']; ?></h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>ผู้แนะนำ</h5>
                            <div class="media">
                                <div class="media-left">
                                        <img class="media-object" class="img-circle"  src="http://placehold.it/64x64" width="64" height="64">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo "คุณ".$Result['Adviser'][0]['member_firstname']." ".$Result['Adviser'][0]['member_firstname']; ?></h4>
                                    รหัส <?php echo $Result['Adviser'][0]['account_team'].sprintf("%04d", $Result['Adviser'][0]['account_level']).sprintf("%04d", $Result['Adviser'][0]['account_code']); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
          <div class="card">
              <div class="header bg-light-blue">
                  <h2>
                      เลือกตำแหน่งสำหรับดาวน์ไลน์
                      <!-- <small>Description text here...</small> -->
                  </h2>

              </div>
              <div class="body">
                  <div class='row '>

                      <div class="col-md-12">
                          <div class="col-md-3">
                              <div class="card">
                                  <div class="header bg-light-blue">
                                      <h2>
                                          อัพไลน์
                                          <!-- <small>Description text here...</small> -->
                                      </h2>

                                  </div>
                                  <div class="body bg-cyan">

                                      <div class='row '>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                              <img alt="140x140" data-src="holder.js/140x140" class="img-circle" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTg4MDQwZjU1ZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ODgwNDBmNTVlIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 140px; height: 140px;"/>
                                          </div>

                                      </div>
                                      <div class='row '>
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                              <h5>
                                                  <?php echo "คุณ".$Result['Upline'][0]['member_firstname']." ".$Result['Upline'][0]['member_firstname']; ?>
                                              </h5>
                                              <h5>
                                                  รหัส <?php echo $Result['Upline'][0]['account_team'].sprintf("%04d", $Result['Upline'][0]['account_level']).sprintf("%04d", $Result['Upline'][0]['account_code']); ?>
                                              </h5>
                                          </div>


                                      </div>

                                  </div>
                              </div>
                          </div>
                          <?php foreach ($Result['Downline'] as $Downline): ?>
                              <div class="col-md-3">
                                  <div class="card">
                                      <div class="header bg-light-blue">
                                          <h2>
                                              ดาวน์ไลน์
                                              <!-- <small>Description text here...</small> -->
                                          </h2>

                                      </div>
                                      <div class="body">
                                          <div class='row '>

                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <img alt="140x140" data-src="holder.js/140x140" class="img-circle" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTg4MDQwZjU1ZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ODgwNDBmNTVlIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 100px; height: 100px;"/>
                                              </div>

                                          </div>
                                          <div class='row '>
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <h5>
                                                      <?php echo "คุณ".$Downline['member_firstname']." ".$Downline['member_firstname']; ?>
                                                  </h5>
                                                  <h5>
                                                      รหัส <?php echo $Downline['account_team'].sprintf("%04d", $Downline['account_level']).sprintf("%04d", $Downline['account_code']); ?>
                                                  </h5>
                                              </div>


                                          </div>
                                          <div class='row '>
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <a href="<?php echo site_url('/AccountController/ResultAccountByUplineID/'.$Downline['account_id']."/".$Result['Member'][0]['member_id']); ?>" class="btn btn-info waves-effect">เพิ่มเติม</a>
                                              </div>


                                          </div>

                                      </div>
                                  </div>
                              </div>
                          <?php endforeach; ?>
                          <?php if (count($Result['Downline'])<3): ?>
                              <div class="col-md-3">
                                  <div class="card bg-grey">
                                      <div class="header bg-light-blue">
                                          <h2>
                                              ว่าง
                                              <!-- <small>Description text here...</small> -->
                                          </h2>

                                      </div>
                                      <div class="body">
                                          <div class='row '>

                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <img class="img-circle" src="<?php echo base_url('assets/img/user.png'); ?>" style="width: 100px; height: 100px;"/>
                                              </div>

                                          </div>
                                          <div class='row '>
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <h5>
                                                      ตำแหน่งว่าง
                                                  </h5>
                                              </div>
                                          </div>
                                          <div class='row '>
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <a href="<?php echo site_url('AccountController/ConfirmAccountPage/'.$Result['Upline'][0]['account_id']."/".$Result['Member'][0]['member_id']); ?>" class="btn bg-pink waves-effect">เลือกตำแหน่งนี้</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <?php endif; ?>

                      </div>
                  </div>
              </div>
          </div>
        </div>
