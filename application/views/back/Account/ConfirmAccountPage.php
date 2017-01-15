
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
                            <div class="col-md-9 col-md-offset-3">
                                <h5>ผู้แนะนำ</h5>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="javascript:void(0);">
                                            <img class="media-object" src="http://placehold.it/64x64" width="64" height="64">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo "คุณ".$Result['Adviser'][0]['member_firstname']." ".$Result['Adviser'][0]['member_firstname']; ?></h4>
                                        ทีม <?php echo $Result['Adviser'][0]['account_team'] ?> <br>
                                        รหัส <?php echo $Result['Adviser'][0]['account_team'].sprintf("%04d", $Result['Adviser'][0]['account_level']).sprintf("%04d", $Result['Adviser'][0]['account_code']); ?>
                                    </div>
                                </div>
                                <h5>อัพไลน์</h5>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="http://placehold.it/64x64" width="64" height="64">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo "คุณ".$Result['Upline'][0]['member_firstname']." ".$Result['Upline'][0]['member_firstname']; ?></h4>
                                        ทีม <?php echo $Result['Upline'][0]['account_team'] ?> <br>
                                        รหัส <?php echo $Result['Upline'][0]['account_team'].sprintf("%04d", $Result['Upline'][0]['account_level']).sprintf("%04d", $Result['Upline'][0]['account_code']); ?>
                                        <h5>ดาวน์ไลน์ใหม่</h5>
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object" class="img-circle" src="http://placehold.it/64x64" width="64" height="64">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo "คุณ".$Result['Member'][0]['member_firstname']." ".$Result['Member'][0]['member_firstname']; ?></h4>
                                                ทีม <?php echo $Result['Upline'][0]['account_team']; ?> <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <a href="<?php echo site_url('/AccountController/ProcessSaveAccount/'.$Result['Upline'][0]['account_id']."/".$Result['Member'][0]['member_id']);?>" class="btn btn-success btn-lg">ยืนยัน</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
