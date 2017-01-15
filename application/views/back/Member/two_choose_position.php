
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-3">
                <div class="card">

                    <div class="body bg-cyan">
                        <div class='row '>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <img alt="140x140" data-src="holder.js/140x140" class="img-circle" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTg4MDQwZjU1ZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ODgwNDBmNTVlIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 140px; height: 140px;"/>
                            </div>

                        </div>
                        <div class='row '>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <h5>
                                    <?php //echo $Result['Upline'][0]['account_name']; ?>
                                </h5>
                                <h5>
                                    รหัส <?php echo $Result['Upline'][0]['account_team'].sprintf("%04d", $Result['Upline'][0]['account_level']).sprintf("%04d", $Result['Upline'][0]['account_code']); ?>
                                </h5>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <div class='col-md-9'>
                <div class="col-md-12">
                    <div class="alert bg-teal text-center">
                        เลือกตำแหน่งว่าง
                    </div>

                </div>
                <div class='row '>

                    <div class="col-md-12">
                        <?php foreach ($Result['Downline'] as $Downline): ?>
                            <div class="col-md-4">
                                <div class="card">

                                    <div class="body">
                                        <div class='row '>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                <img alt="140x140" data-src="holder.js/140x140" class="img-circle" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTg4MDQwZjU1ZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ODgwNDBmNTVlIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 100px; height: 100px;"/>
                                            </div>

                                        </div>
                                        <div class='row '>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                <h5>
                                                    <?php //echo $Downline['account_name']; ?>
                                                </h5>
                                                <h5>
                                                    รหัส <?php echo $Downline['account_team'].sprintf("%04d", $Downline['account_level']).$Downline['account_code']; ?>
                                                </h5>
                                            </div>


                                        </div>
                                        <div class='row '>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                <a href="<?php echo site_url('/Admin_controller/search_account_by_id/'.$Downline['account_id']); ?>" class="btn btn-info waves-effect">เพิ่มเติม</a>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php if (count($Result['Downline'])<3): ?>
                            <div class="col-md-4">
                                <div class="card bg-grey">

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
                                                <a href="<?php echo site_url('Admin_controller/three_form_new/'.$Result['Upline'][0]['account_id']); ?>" class="btn bg-pink waves-effect">เลือกตำแหน่งนี้</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>


            </div>
