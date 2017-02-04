<!-- <div class="row" ng-app="HomePageApp"> -->
<div class="row" ng-controller="PanelExtendCtrl">
  <div class="col-md-12" style="padding:20px" >
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>วันที่ต่ออายุ</th>
          <th>วันที่หมดอายุ</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td>1</td>
            <td><?php echo $JounalExtendAccount[0]['journal_extend_start_date'] ?></td>
            <td><?php echo $JounalExtendAccount[0]['journal_extend_expired_date'] ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
