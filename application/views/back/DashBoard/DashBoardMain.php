
<?php
$this->debuger->front_load_js('jquery.min');
$this->debuger->front_load_js('moment-with-locales.min');
$this->debuger->front_load_js('transition');
$this->debuger->front_load_js('collapse');
$this->debuger->front_load_js('bootstrap.min');
$this->debuger->front_load_js('bootstrap-datetimepicker');
 ?>


<section class="content" ng-controller="MemberCtrl">
        <?php
        $colorArr = array(
                '0' => 'teal',
                '1' => 'cyan',
                '2' => 'green',
                '3' => 'orange',
                '4' => 'blue-grey',
                '5' => 'pink',
                '6' => 'light-blue',
                '7' => 'light-green',
                '8' => 'amber',
        );
        // $this->debuger->prevalue($colorArr);
         ?>

        <div class="container-fluid">
            <!-- No Header Card -->
            <div class="block-header text-center">
                <h1>ภาพรวมธุรกิจเครือข่าย</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                              <div id="line-network-summary"></div>

                            </div>
                        </div>
                    </div>
                </div>
                </div>

            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-offset-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-red">
                            <div class="row">
                              <div class="col-md-12 text-center">
                                  <h5>NAVA DRAGON WEALTH NETWORK</h5>
                              </div>
                              <div class="col-md-12 text-center">
                                  <h3><?php echo $Group['Group1'] ?> รหัส</h3>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="body bg-red">
                                <div class="row">
                                  <div class="col-md-12 text-center">
                                      <h5>NAVA DRAGON WEALTH NETWORK</h5>
                                      <h5>A - B - C</h5>

                                  </div>
                                  <div class="col-md-12 text-center">
                                          <h4><?php echo $Group['Group2'] ?> รหัส</h4>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="body bg-red">
                                <div class="row">
                                  <div class="col-md-12 text-center">
                                      <h5>NAVA DRAGON WEALTH NETWORK</h5>
                                      <h5>D - E - F</h5>

                                  </div>
                                  <div class="col-md-12 text-center">
                                      <h4><?php echo $Group['Group3'] ?> รหัส</h4>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="body bg-red">
                                <div class="row">
                                  <div class="col-md-12 text-center">
                                      <h5>NAVA DRAGON WEALTH NETWORK</h5>
                                      <h5>G - H - I</h5>

                                  </div>
                                  <div class="col-md-12 text-center">
                                          <h4><?php echo $Group['Group4'] ?> รหัส</h4>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <hr>
            <div class="row">
                    <?php $json = array(); $c=0; for ($i='A'; $i <='I' ; $i++):?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="body bg-<?php echo $colorArr[$c] ?>">
                                        <div class="row">
                                          <div class="col-md-4 text-center">
                                              <h3>ทีม <?php echo $i ?></h3>
                                          </div>
                                          <div class="col-md-8 text-right">
                                              <h3><?php echo $CodeTeam[$i] ?> รหัส</h3>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $c++; ?>
                <?php endfor; ?>


            </div>
            <!-- #END# No Header Card -->
        </div>
    </section>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url('assets/theme/back-end/plugins/raphael/raphael.min.js')  ?>"></script>
    <script src="<?php echo base_url('assets/theme/back-end/plugins/morrisjs/morris.js') ?>"></script>
    
