
<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="card">
                <div class="header bg-light-blue">
                    <h2>
                        สร้างบัญชีนักธุรกิจอิสระใหม่
                    </h2>

                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>ดาวน์ไลน์ใหม่</h5>
                            <div class="media">
                                <!-- <div class="media-left">

                                        <img class="media-object" class="img-circle" src="http://placehold.it/64x64" width="64" height="64">

                                </div> -->
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo "คุณ".$Member[0]['member_firstname']." ".$Member[0]['member_lastname']; ?></h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>ผู้แนะนำ</h5>
                            <div class="media">
                                <!-- <div class="media-left">
                                        <img class="media-object" class="img-circle"  src="http://placehold.it/64x64" width="64" height="64">
                                </div> -->
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo "คุณ".$AccountAdviser[0]['member_firstname']." ".$AccountAdviser[0]['member_lastname']; ?></h4>
                                    รหัส <?php echo $AccountAdviser[0]['account_team'].sprintf("%04d", $AccountAdviser[0]['account_level']).sprintf("%04d", $AccountAdviser[0]['account_code']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>อัปไลน์</h5>
                            <div class="media">
                                <!-- <div class="media-left">
                                        <img class="media-object" class="img-circle"  src="http://placehold.it/64x64" width="64" height="64">
                                </div> -->
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo "คุณ".$AccountUpline[0]['member_firstname']." ".$AccountUpline[0]['member_lastname']; ?></h4>
                                    รหัส <?php echo $AccountUpline[0]['account_team'].sprintf("%04d", $AccountUpline[0]['account_level']).sprintf("%04d", $AccountUpline[0]['account_code']); ?>
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

                                      <!-- <div class='row '>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                              <img alt="140x140" data-src="holder.js/140x140" class="img-circle" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTg4MDQwZjU1ZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ODgwNDBmNTVlIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 140px; height: 140px;"/>
                                          </div>

                                      </div> -->
                                      <div class='row '>
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                              <h5>
                                                  <?php echo "คุณ".$AccountUpline[0]['member_firstname']." ".$AccountUpline[0]['member_firstname']; ?>
                                              </h5>
                                              <h5>
                                                  รหัส <?php echo $AccountUpline[0]['account_team'].sprintf("%04d", $AccountUpline[0]['account_level']).sprintf("%04d", $AccountUpline[0]['account_code']); ?>
                                              </h5>
                                          </div>


                                      </div>
                                      <div class='row '>
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                              <?php if ($AccountUpline[0]['account_id']==$AccountAdviser[0]['account_id']): ?>
                                                   <button type="button" class="btn btn-default" disabled="disabled">
                                                     ดูอัปไลน์
                                                   </button>
                                                   <?php else: ?>
                                                       <a href="<?php echo site_url('/Member/SelectUpline/'.$Member[0]['member_id']."/".$AccountAdviser[0]['account_id']."/".$AccountUpline[0]['account_upline_id']); ?>"
                                                           class="btn btn-default waves-effect" >ดูอัปไลน์</a>
                                               <?php endif; ?>

                                          </div>


                                      </div>

                                  </div>
                              </div>
                          </div>
                          <?php foreach ($DownlineList as $row): ?>
                              <div class="col-md-3">
                                  <div class="card">
                                      <div class="header bg-light-blue">
                                          <h2>
                                              ดาวน์ไลน์
                                              <!-- <small>Description text here...</small> -->
                                          </h2>

                                      </div>
                                      <div class="body">
                                          <!-- <div class='row '>

                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <img alt="140x140" data-src="holder.js/140x140" class="img-circle" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTg4MDQwZjU1ZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ODgwNDBmNTVlIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 100px; height: 100px;"/>
                                              </div>

                                          </div> -->
                                          <div class='row '>
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <h5>
                                                      <?php echo "คุณ".$row['member_firstname']." ".$row['member_firstname']; ?>
                                                  </h5>
                                                  <h5>
                                                      รหัส <?php echo $row['account_team'].sprintf("%04d", $row['account_level']).sprintf("%04d", $row['account_code']); ?>
                                                  </h5>
                                              </div>
                                          </div>
                                          <div class='row '>
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <a href="<?php echo site_url('/Member/SelectUpline/'.$Member[0]['member_id']."/".$AccountAdviser[0]['account_id']."/".$row['account_id']); ?>"
                                                      class="btn bg-cyan waves-effect">
                                                      ดูดาวน์ไลน์
                                                     </a>
                                              </div>


                                          </div>

                                      </div>
                                  </div>
                              </div>
                          <?php endforeach; ?>
                          <?php if (count($DownlineList)<3): ?>
                              <div class="col-md-3">
                                  <div class="card">
                                      <div class="header bg-pink">
                                          <h2>
                                              ว่าง
                                              <!-- <small>Description text here...</small> -->
                                          </h2>

                                      </div>
                                      <div class="body">
                                          <!-- <div class='row '>

                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <img class="img-circle" src="<?php echo base_url('assets/img/user.png'); ?>" style="width: 100px; height: 100px;"/>
                                              </div>

                                          </div> -->
                                          <div class='row '>
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <h5>
                                                      ตำแหน่งว่าง
                                                  </h5>
                                                  <h5>
                                                      สามารถเลือกได้
                                                  </h5>
                                              </div>
                                          </div>
                                          <div class='row '>
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                  <a href="<?php echo site_url('Account/SaveAccount/'.$Member[0]['member_id']."/".$AccountAdviser[0]['account_id']."/".$AccountUpline[0]['account_id']); ?>" class="btn bg-pink waves-effect">เลือกตำแหน่งนี้</a>
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
