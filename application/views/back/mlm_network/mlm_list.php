<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>เครือข่าย</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-6">
        <div class="card">
          <div class="body">
            <ul class="list-group">
              <a class="list-group-item" href="javascript:void(0);">
                <div class="row clearfix">
                  <div class="col-md-12" style="margin:0px;">
                    <div class="media" style="margin:0px;">
                      <div class="media-left"> <img class="media-object" src="http://placehold.it/64x64" height="64" width="64"> </div>
                      <div class="media-body">
                        <h4 class="media-heading"> บริษัท</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </ul>
          </div>
        </div>
        <div class="card">
          <div class="body">
            <ul class="list-group">
              <?php $ii = 1; for ($char = 1; $char <= 3; $char++): ?>
                <a class="list-group-item" href="javascript:void(0);">
                  <div class="row clearfix">
                    <div class="col-md-1 text-center" style="margin:0px;">
                      <small>อันดับ</small>
                      <h3 style="margin-top:10px;"><span class="label label-info"><?php echo $ii; ?></span></h3>
                    </div>
                    <div class="col-md-11" style="margin:0px;">
                      <div class="media" style="margin:0px;">
                        <div class="media-left"> <img class="media-object" src="http://placehold.it/64x64" height="64" width="64"> </div>
                        <div class="media-body">
                          <h4 class="media-heading">ทีม <?php echo $char; ?></h4>

                        </div>
                      </div>
                    </div>

                  </div>
                </a>
                <?php $ii++; endfor; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">

            <div class="body">
              <ul class="list-group">
                <?php $i = 1; for ($char = 'A'; $char <= 'I'; $char++): ?>
                  <a class="list-group-item" href="<?php echo site_url('/Admin_controller/team_detail/'.$char); ?>">
                    <div class="row clearfix">
                      <div class="col-md-1 text-center" style="margin:0px;">
                        <small>อันดับ</small>
                        <h3 style="margin-top:10px;"><span class="label label-info"><?php echo $i; ?></span></h3>
                      </div>
                      <div class="col-md-11" style="margin:0px;">
                        <div class="media" style="margin:0px;">
                          <div class="media-left"> <img class="media-object" src="http://placehold.it/64x64" height="64" width="64"> </div>
                          <div class="media-body">
                            <h4 class="media-heading">ทีม <?php echo $char; ?></h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php $i++; endfor; ?>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
