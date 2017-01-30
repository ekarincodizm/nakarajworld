<div class="row">
  <div class="col-md-12" style="padding:20px">
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
      <p class="text-left"><button type="submit" class="btn btn-fill btn-xs btn-danger">ตกลง</button></p>
    <?php echo form_close(); ?>
</div>
</div>
