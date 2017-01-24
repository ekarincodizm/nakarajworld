<div class="row clearfix">
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>
              เจ้าของบัญชีนักธุรกิจอิสระ
            </h2>
          </div>
          <div class="body">
            ชื่อ: <?php echo $Profile[0]['member_firstname'] ?><br>
            นามสกุล: <?php echo $Profile[0]['member_lastname'] ?><br>
            โทรศัพท์: <?php echo $Profile[0]['member_phone'] ?><br>
            ที่อยู่: <?php echo $Profile[0]['member_address'] ?><br>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>
              สรุปภาพรวม
            </h2>
          </div>
          <div class="body">
            ระดับบัญชีนักธุรกิจอิสระ: <br>
            ดาวน์ไลน์ทั้งหมด: <?php echo count($AllDownline); ?> รหัส<br>
            ดาวน์ไลน์ติดตัว: <?php echo count($ThreeDownline); ?> รหัส<br>
            แนะนำผู้อื่น: <?php echo count($AdviserList); ?> รหัส<br>
            <!-- สถานะบัญชีนักธุรกิจอิสระ: <br> -->
			<hr><center>
            <font color="red">โอนกรรมสิทธิ์บัญชีนี้ </font> ให้แก่ <br>
            <?php echo form_open('/Account/AccountPermission'); ?>
            <input type="hidden" name="account_id" value="<?php echo $Account[0]['account_id']?>">
              <select name="member_id">
                <option value=" ">-เลือก-</option>
                <?php foreach ($member as $row): ?>
                  <option value="<?php echo $row['member_id'] ?>"><?php echo $row['member_prefix']."".$row['member_firstname']." ".$row['member_lastname'] ?></option>
                <?php endforeach; ?>
              </select>
              <hr>
              <p class="text-center"><button type="submit" class="btn btn-fill btn-xs btn-danger">ตกลง</button></p>
            <?php echo form_close(); ?>
          </center>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>
              บัญชีธนาคาร
            </h2>
          </div>
          <div class="body">
            <?php if ($BookbankDetail!='false'): ?>
              ธนาคาร: <?php echo $BookbankDetail[0]['bank_name'] ?><br>
              สาขา: <?php echo $BookbankDetail[0]['bookbank_bank_branch'] ?><br>
              ชื่อบัญชี: <?php echo $BookbankDetail[0]['bookbank_account'] ?><br>
              เลขที่บัญชี: <?php echo $BookbankDetail[0]['bookbank_number'] ?><br>
            <?php endif; ?>

            <div class="row">
              <div class="col-md-12 text-right">
                <button type="button" class="btn btn-block btn-info btn-lg waves-effect m-r-20" data-toggle="modal" data-target="#SelectBookBank">ตั้งค่า</button>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="SelectBookBank" tabindex="-1" role="dialog" style="display: none;" ng-app="HomePageApp">
  <div class="modal-dialog modal-lg" role="document"  ng-controller="AddBookBankCtrl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="largeModalLabel">เลือกบัญชีธนาคาร</h4>
      </div>
      <div class="modal-body">
        <div class="row clearfix">
          <form class="form-inline" ng-submit="FormSubmit()">
            <?php //echo form_open('/Member/AddBookbank/'.$Profile[0]['member_id']); ?>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
              <div class="form-group">
                <label class="form-label">ธนาคาร</label>

                <div class="form-line">

                  <select class="form-control show-tick" ng-model="BookBankObject.bank_id">
                    <option value="">ราชื่อบัญชีธนาคาร</option>
                    <?php foreach ($BankList as $row): ?>
                      <option value="<?php echo $row['bank_id'] ?>" ><?php echo $row['bank_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
              <div class="form-group">
                <label class="form-label">สาขา</label>

                <div class="form-line">
                  <input type="text" class="form-control text-center" ng-model="BookBankObject.bookbank_bank_branch">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
              <div class="form-group">
                <label class="form-label">ชื่อบัญชี</label>

                <div class="form-line">
                  <input type="text" class="form-control text-center" ng-model="BookBankObject.bookbank_account">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
              <div class="form-group">
                <label class="form-label">หมายเลขบัญชี</label>

                <div class="form-line">
                  <input oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" type="text" class="form-control text-center" ng-model="BookBankObject.bookbank_number">
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
              <input type="hidden" ng-model="BookBankObject.member_id" ng-init="BookBankObject.member_id=<?php echo $Profile[0]['member_id'] ?>">
              <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">บันทึก</button>
            </div>
            <?php //echo form_close(); ?>
          </form>
        </div>
        <hr>
        <div class="row clearfix">
          <script type="text/javascript">
          var member_id = <?php echo $Profile[0]['member_id']; ?>;
          </script>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>ธนาคาร</th>
                <th>สาขา</th>
                <th>ชื่อบัญชี</th>
                <th>เลขที่บัญชี</th>
                <!-- <th>สถานะ</th> -->
                <th>ตัวเลือก</th>
                <th>ลบ</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="row in ListBookBank">
                <input type="hidden" name="bookbank_id" value="{{row.bookbank_id}}">
                <td>{{$index+1}}</td>
                <td>{{row.bank_name}}</td>
                <td>{{row.bookbank_bank_branch}}</td>
                <td>{{row.bookbank_account}}</td>
                <td>{{row.bookbank_number}}</td>
                <td>
                  <a href="<?php echo site_url('/Member/SaveBookbankToAccount/'.$Account[0]['account_id']."/"."{{row.bookbank_id}}"); ?>" class="btn btn-xs btn-info" style="font-size: 15px;"><i class="material-icons"  style="font-size: 15px;">account_box</i> เลือก</a>
                </td>
                <td>
                  <button ng-click="DeleteBookBank(<?php echo $Profile[0]['member_id'] ?>,row.bookbank_id);" class="btn btn-xs bg-red waves-effect" style="font-size: 13px;">ลบ</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
