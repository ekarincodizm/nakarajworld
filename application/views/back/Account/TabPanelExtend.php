<!-- <div class="row" ng-app="HomePageApp"> -->
<div class="row" ng-controller="PanelExtendCtrl">
  <div class="col-md-12" style="padding:20px" >
    <script type="text/javascript">
      var account_id = <?php echo $this->uri->segment(3); ?>;
    </script>
    <button ng-if="LastListExtend.account_history_expired_date > date_now" type="button" class="btn bg-deep-orange" ng-click="MemberExtend(<?php echo $Profile[0]['member_id'] ?>);">
      ต่ออายุ
    </button>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>วันที่ต่ออายุ</th>
          <th>วันที่หมดอายุ</th>
          <th>สถานะ</th>
          <th>ตัวเลือก</th>
        </tr>
      </thead>
      <tbody>
          <tr ng-repeat="row in ListExtend">
            <?php $datenow = '{{row.account_history_register_date}}'; ?>
            <td>{{$index+1}}</td>
            <td>{{row.account_history_register_date | date:'dd MMMM yyyy'}}</td>
            <td>{{row.account_history_expired_date | date:'dd MMMM yyyy'}}</td>
            <td>
              <span ng-if="row.account_history_expired_date < date_now" class="label bg-deep-orange">หมดอายุ</span>
              <!-- <div ng-if="row.account_history_status == 2"> -->
                <span ng-if="row.account_history_status == 2" class="label bg-deep-orange">ยังไม่เปิดใช้งาน</span>
                <span ng-if="row.account_history_status == 1" class="label bg-green">เปิดใช้งาน</span>
              <!-- </div> -->
            </td>
            <td>
              <a ng-if="row.account_history_status == 1" target="_blank" href="<?php echo site_url('/AccountController/PrintAccountInvoice/'.'{{row.account_history_id}}'); ?>"
                class="btn btn-info">พิมพ์ใบแจ้งหนี้</a>
                <a ng-if="row.account_history_status == 2" href="<?php echo site_url('/AccountController/ProcessEnableAccount/'.'{{row.account_history_id}}'); ?>"
                  class="btn btn-info">ชำระค่าสมัคร</a>
                <span ng-if="row.account_history_status == 0" class="label bg-blue-grey">รอดำเนินการ</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
