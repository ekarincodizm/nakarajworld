<!-- <div class="row" ng-app="HomePageApp"> -->
<div class="row" ng-controller="PanelUpclassCtrl">
  <!-- <?php// echo count($PlanOneDownline);?> -->
  <?php //if (count($PlanOneDirectAdviser)>=3 && count($PlanOneDownline)>=243): ?>
    <?php if ($CheckFreePV!='1'): ?>

    <div class="row">
      <div class="col-md-12 text-center">
        <div class="alert bg-teal">
          <h4>โบนัสฟรี <span class="label bg-pink">4,000 PV</span> เมื่อมีสมาชิกครบ 243 บัญชี และแนะนำด้วยตัวเอง 3 บัญชี</h4>
          <a href="<?php echo site_url('/Member/AddFreePV/'.$Account[0]['account_id']."/".$MyPv[0]['member_id'])?>" class="btn bg-pink">รับทันที</a>
        </div>
      </div>
    </div>
        <?php endif; ?>
  <?php  //endif; ?>


  <div class="row">
    <div class="col-md-12 text-center">
      <div class="col-md-12 text-center">
        <!-- ระดับ ปัจจุบัน และ ระดับ ถัดไป -->
        <?php echo $this->debuger->GenerateClass($Account[0]['account_class_id']); ?>
      </div>
      <script type="text/javascript">
      var account_id = <?php echo $this->uri->segment(3); ?>;
      </script>
      <p>ต้องใช้ <?php echo $NextClass[0]['account_class_pv'] ?> PV เพื่อเลื่อนระดับ</p>
      <?php $pv = $MyPv[0]['temp_total_pv']-$MyPv[0]['temp_total_used_pv'];?>
      <p>PV รวมปัจจุบัน <font color="blue"><?php echo $pv ?> </font>PV</p>
      <?php if (($pv-$NextClass[0]['account_class_pv'])<0): ?>
        <p class="text-danger">ขาด <?php echo $pv-$NextClass[0]['account_class_pv'] ?> PV</p>
        <?php else: ?>
          <p>คงเหลือ <?php echo $pv-$NextClass[0]['account_class_pv'] ?> PV</p>
          <button type="button" class="btn bg-deep-orange" ng-click="AccountUpclass(<?php echo $Profile[0]['member_id'] ?>);">
            เพิ่มระดับ
          </button>
      <?php endif; ?>

    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>วันที่</th>
            <th>ประเภท</th>
            <th>PV</th>
            <th>ผู้ทำรายการ</th>
            <th>รายละเอียด</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="row in ListUpclass">
            <td>{{$index+1}}</td>
            <td>{{row.point_date}}</td>
            <td ng-if="row.point_type == 1">รับ</td>
            <td ng-if="row.point_type == 0">ใช้</td>
            <td>{{row.point_value}}</td>
            <td>{{row.member_prefix}}{{row.member_firstname}} {{row.member_lastname}}</td>
            <td>{{row.point_detail}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>
