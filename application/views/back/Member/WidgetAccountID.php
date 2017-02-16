<div class="row clearfix">
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h3>
              เจ้าของบัญชีนักธุรกิจอิสระ
            </h3>
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
            <h3>
              สรุปภาพรวม
            </h3>
          </div>
          <div class="body">
            <!-- ระดับบัญชีนักธุรกิจอิสระ: <br> -->
            ใต้สายงานทั้งหมด: <?php echo count($AllDownline); ?> รหัส<br>
            ใต้สายงานติดตัว: <?php echo count($ThreeDownline); ?> รหัส<br>
            แนะนำผู้อื่น: <?php echo count($AdviserList); ?> รหัส<br>
            <!-- สถานะบัญชีนักธุรกิจอิสระ: <br> -->
            <!-- <hr><center>
            <font color="red">โอนกรรมสิทธิ์บัญชีนี้ </font> ให้แก่ <br>
            <?php echo form_open('/Account/AccountPermission'); ?>
            <input type="hidden" name="account_id" value="<?php echo $Account[0]['account_id']?>">
            <input type="hidden" name="bookbank_id" value="0">
            <select required name="member_id">
            <option value="">-เลือก-</option>
            <?php foreach ($member as $row): ?>
            <option value="<?php echo $row['member_id'] ?>"><?php echo $row['member_prefix']."".$row['member_firstname']." ".$row['member_lastname'] ?></option>
          <?php endforeach; ?>
        </select>
        <hr>
        <p class="text-center"><button type="submit" class="btn btn-fill btn-xs btn-danger">ตกลง</button></p>
        <?php echo form_close(); ?>
      </center> -->
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
          <h3>
            บัญชีธนาคาร
          </h3>
        </div>
        <div class="body">
          <?php if ($BookbankDetail=='false'): ?>
            ธนาคาร: ไม่ระบุ<br>
            สาขา: ไม่ระบุ<br>
            ชื่อบัญชี: ไม่ระบุ<br>
            เลขที่บัญชี: ไม่ระบุ<br>
          <?php else: ?>
            <?php if (count($BookbankDetail)>0): ?>
              ธนาคาร: <?php echo $BookbankDetail[0]['bank_name'] ?><br>
              สาขา: <?php echo $BookbankDetail[0]['bookbank_bank_branch'] ?><br>
              ชื่อบัญชี: <?php echo $BookbankDetail[0]['bookbank_account'] ?><br>
              เลขที่บัญชี: <?php echo $BookbankDetail[0]['bookbank_number'] ?><br>
            <?php endif; ?>

          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
<hr>
