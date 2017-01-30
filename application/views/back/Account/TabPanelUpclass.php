<!-- <div class="row" ng-app="HomePageApp"> -->
<div class="row" ng-controller="PanelUpclassCtrl">
  <div class="col-md-12" style="padding:20px" >
    <script type="text/javascript">
      var account_id = <?php echo $this->uri->segment(3); ?>;
    </script>
    Pv ปัจจุบัน : <?php echo $MyPv ?> || Pv ที่ต้องใช้ : xxx 
    <button type="button" class="btn bg-deep-orange" ng-click="AccountUpclass(<?php echo $Profile[0]['member_id'] ?>);">
      เพิ่มระดับ
    </button>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>PV</th>
          <th>วันที่</th>
          <th>ประเภท</th>
          <th>ผู้ทำรายการ</th>
          <th>รายละเอียด</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="row in ListUpclass">
          <td>{{$index+1}}</td>
          <td>{{row.point_value}}</td>
          <td>{{row.point_date}}</td>
          <td>{{row.point_type}}</td>
          <td>{{row.member_prefix}}{{row.member_firstname}} {{row.member_lastname}}</td>
          <td>{{row.point_detail}}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
