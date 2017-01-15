<div id="counter-bg" class="col-lg-12 text-center clearfix">
  <div class="col-sm-6 col-md-6 col-lg-6">
    <div class="counter-box">
      <div class="number">
        <img class="pull-left" src="<?php echo base_url('assets/theme/front-end/images/laurel-wreath-left.png')?>" alt="Laurel Wreath" width="35" height="73">

        <h4 class="timer pull-left"><?php echo count($AccountList); ?></h4>

        <img class="pull-left" src="<?php echo base_url('assets/theme/front-end/images/laurel-wreath-right.png')?>" alt="Laurel Wreath" width="35" height="73">
      </div>
      <p class="lead">บัญชีนักธุรกิจอิสระ</p>
      <a href="<?php echo site_url('HomePage/AccountList'); ?>" class="button green rounded">ดูบัญชีทั้งหมด</a>
    </div>
  </div>

</div>
