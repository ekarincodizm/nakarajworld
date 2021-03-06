<div class="row">
  <div class="col-md-12 text-center" style="padding:20px">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          ธนาคาร: <?php echo $BookbankDetail[0]['bank_name'] ?>

        </div>
        <div class="col-md-3">
          สาขา: <?php echo $BookbankDetail[0]['bookbank_bank_branch'] ?>

        </div>
        <div class="col-md-3">
          ชื่อบัญชี: <?php echo $BookbankDetail[0]['bookbank_account'] ?>

        </div>
        <div class="col-md-3">
          เลขที่บัญชี: <?php echo $BookbankDetail[0]['bookbank_number'] ?>

        </div>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-md-12">
    <button type="button" class="btn btn-info btn-lg waves-effect m-r-20" data-toggle="modal" data-target="#SelectBookBank">เลือกบัญชีธนาคาร</button>
    <div class="modal fade" id="SelectBookBank" tabindex="-1" role="dialog" style="display: none;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">เลือกบัญชีธนาคาร</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row clearfix">
                            <?php echo form_open('/Member/AddBookbank/'.$Profile[0]['member_id']); ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                              <div class="form-group">
                                <label class="form-label">ธนาคาร</label>

                                <div class="form-line">
                                  <!-- <input type="text" class="form-control"> -->
                                  <select name="bank_id" class="form-control show-tick">
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
                                  <input name="bookbank_bank_branch" type="text" class="form-control text-center">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                              <div class="form-group">
                                <label class="form-label">ชื่อบัญชี</label>

                                <div class="form-line">
                                  <input name="bookbank_account" type="text" class="form-control text-center">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                              <div class="form-group">
                                <label class="form-label">หมายเลขบัญชี</label>

                                <div class="form-line">
                                  <input name="bookbank_number" type="text" class="form-control text-center">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                              <!-- <input type="checkbox" id="remember_me_5" class="filled-in">
                              <label for="remember_me_5">Remember Me</label> -->
                              <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">บันทึก</button>
                            </div>
                            <?php echo form_close(); ?>
                          </div>
                          <hr>
                          <div class="row clearfix">
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
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1; foreach ($BookbankList as $row): ?>
                                  <?php echo form_open('/Member/SaveBookbankToAccount/'.$Account[0]['account_id']); ?>
                                  <input type="hidden" name="bookbank_id" value="<?php echo $row['bookbank_id']; ?>">
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['bank_name']; ?></td>
                                    <td><?php echo $row['bookbank_bank_branch']; ?></td>
                                    <td><?php echo $row['bookbank_account']; ?></td>
                                    <td><?php echo $row['bookbank_number']; ?></td>
                                    <td>
                                      <button type="submit" class="btn btn-xs btn-info" style="font-size: 15px;">
                                        <i class="material-icons"  style="font-size: 15px;">account_box</i> เลือก</button>
                                    </td>
                                  </tr>
                                  <?php echo form_close(); ?>
                                <?php $i++; endforeach; ?>

                              </tbody>
                            </table>
                          </div>

                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-link waves-effect"></button> -->
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
  </div>
</div>
  </div>
</div>
