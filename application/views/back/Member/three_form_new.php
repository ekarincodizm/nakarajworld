
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <h1>ยืนยันการเพิ่มบัญชี</h1>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <!-- <h5>ผู้แนะนำ</h5>
                                <p>
                                    นายหกดหกดหก หกดหกดหกดห <br>
                                    รหัส A0001A0001 <br>
                                </p> -->
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">

                                <a href="<?php echo site_url('/admin_controller/add_account/'.$Result['NewAccount'][0]['member_id']."/".$Result['Upline'][0]['member_id']); ?>" class="btn btn-success btn-lg">ยืนยัน</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
