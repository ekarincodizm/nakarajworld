<div class="row" ng-app="HomePageApp">
  <div class="col-md-12" style="padding:20px" ng-controller="PanelExtendCtrl">
    <table class="table table-hover js-table">
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
        <?php //$i=1; foreach ($HistoryAccount as $HistoryAccount): ?>

          <tr ng-repeat="row in ListExtend">
            <td>{{$index+1}}</td>
            <td><?php echo $this->thaidate->FullDate('{{row.account_history_register_date}}');?></td>
            <td><?php echo $this->thaidate->FullDate('{{row.account_history_expired_date}}');?></td>
            <td>
              <?php if ('{{row.account_history_expired_date}}'<Date('Y-m-d')): ?>
                <span class="label bg-deep-orange">หมดอายุ</span>
                <?php else: ?>
                  <?php if ('{{row.account_history_status}}'==2): ?>
                    <span class="label bg-deep-orange">ยังไม่เปิดใช้งาน</span>
                  <?php elseif('{{row.account_history_status}}'==1): ?>
                    <span class="label bg-green">เปิดใช้งาน</span>
                  <?php else: ?>
                    <span class="label bg-blue-grey">รอดำเนินการ</span>
                  <?php endif; ?>
              <?php endif; ?>

            </td>
            <td>
              <?php if ('{{row.account_history_status}}'==2): ?>
                <a href="<?php echo site_url('/AccountController/ProcessEnableAccount/'.'{{row.account_history_id}}'); ?>"
                  class="btn btn-info">ชำระค่าสมัคร</a>
                <?php elseif('{{row.account_history_status}}'==1): ?>
                  <a target="_blank" href="<?php echo site_url('/AccountController/PrintAccountInvoice/'.'{{row.account_history_id}}'); ?>"
                    class="btn btn-info">พิมพ์ใบแจ้งหนี้</a>
                  <?php else: ?>
                    <span class="label bg-blue-grey">รอดำเนินการ</span>
                  <?php endif; ?>
                  <!-- Start button Continue Extend -->
                    <?php ?>
                <?php
                $datenow = date("Y-m-d");
                if($datenow>='{{row.account_history_expired_date}}'){
                ?>
                <a target="_blank" href="<?php //echo site_url('/AccountController/PrintAccountInvoice/'.$HistoryAccount['account_history_id']); ?>"
                  class="btn btn-success">ต่ออายุสมาชิก</a>
                <button ng-click="MemberExtend(<?php echo $Profile[0]['member_id'] ?>);" class="btn btn-success">ต่ออายุสมาชิก</button>
                <?php } ?>
                  <!-- End button Continue Extend -->
                </td>
              </tr>

              <?php //$i++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
