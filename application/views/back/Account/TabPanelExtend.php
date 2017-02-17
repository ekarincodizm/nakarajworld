<!-- <div class="row" ng-app="HomePageApp"> -->
<div class="row" ng-controller="PanelExtendCtrl">
  <div class="col-md-12" style="padding:20px" >
    <script type="text/javascript">
      var account_id = <?php echo $this->uri->segment(3); ?>;
    </script>

    <div ng-if="LastListExtend.journal_extend_expired_date < date_now" class="row">
      <div class="col-md-12 text-center">
        <p class="col-pink">บัญชีนักธุรกิจอิสระนี้ หมดอายุการใช้งานแล้ว</p>
        <button  type="button" class="btn bg-pink" ng-click="MemberExtend(<?php echo $Profile[0]['member_id'] ?>);">
          ต่ออายุ
        </button>
      </div>
    </div>
    <div ng-if="LastListExtend.accounting_status != 1" class="row">
      <div class="col-md-12 text-center">
        <p class="col-cyan">บัญชีนักธุรกิจอิสระนี้ มีเอกสารต่ออายุที่ค้างชำระ</p>
        <a class="btn bg-cyan" href="<?php echo site_url('/Accounting/AccountingDetail/{{accounting_id}}'); ?>">
          ชำระเงิน
        </a>
      </div>
    </div>



    <!-- <span ng-if="LastListExtend.journal_extend_expired_date < date_now" class="label bg-deep-orange">หมดอายุ</span>
    <span ng-if="LastListExtend.accounting_status == 2" class="label bg-deep-orange">ยังไม่เปิดใช้งาน</span>
    <span ng-if="LastListExtend.accounting_status == 1" class="label bg-green">เปิดใช้งาน</span> -->
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>วันที่ต่ออายุ</th>
          <th>วันที่หมดอายุ</th>
        </tr>
      </thead>
      <tbody>
          <tr ng-repeat="row in ListExtend">
            <?php $datenow = '{{row.journal_extend_start_date}}'; ?>
            <td>{{$index+1}}</td>
            <td>{{row.journal_extend_start_date | date:'dd MMMM yyyy'}}</td>
            <td>{{row.journal_extend_expired_date | date:'dd MMMM yyyy'}}</td>
            <td>
              <a ng-if="row.accounting_status == 1" target="_blank" href="<?php echo site_url('/AccountController/PrintAccountInvoice/'.'{{row.journal_extend_id}}'); ?>"
                class="btn btn-info">พิมพ์ใบแจ้งหนี้</a>
                <a ng-if="row.accounting_status == 2" href="<?php echo site_url('/AccountController/ProcessEnableAccount/'.'{{row.journal_extend_id}}'); ?>"
                  class="btn btn-info">ชำระค่าสมัคร</a>
                <span ng-if="row.accounting_status == 0" class="label bg-pink">ค้างชำระ</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
