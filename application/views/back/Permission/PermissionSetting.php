
<?php $this->debuger->load_back_plugins('jquery/jquery.min'); ?>

<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>กำหนดสิทธิ์การใช้งาน</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">

          <div class="body">

            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ตำแหรน่ง</th>
                      <th>ชื่อผู้ใช้งาน</th>
                      <th>รหัสผ่าน</th>
                      <th>ตัวเลือก</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo form_open('/Permission/SaveAdmin/SuperAdmin'); ?>
                    <input type="hidden" name="admin_id" value="<?php echo $SuperAdmin[0]['admin_id'] ?>">
                    <tr>
                      <td>ผู้ดูแลระบบ</td>
                      <td>
                        <div class="input-group input-group-lg">
                          <div class="form-line">
                            <input id="SuperAdmin" type="text" class="form-control" name="admin_username" value="<?php echo $SuperAdmin[0]['admin_username'] ?>" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
                          </div>
                        </div>
                      </td>
                        <td>
                          <div class="input-group input-group-lg">
                            <div class="form-line">
                              <input id="passwordAdmin" type="password" class="form-control" name="admin_password"
                              value="<?php echo base64_decode($SuperAdmin[0]['admin_password']) ?>" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
                            </div>
                            <span class="input-group-addon">
                              <input id="showAdmin" type="checkbox" class="filled-in" id="ig_checkbox">
                              <label for="showAdmin" style="font-size:15px">แสดง</label>
                            </span>
                          </div>
                          <script type="text/javascript">

                          $("#showAdmin").change( function() {
                            if($(this).prop('checked')==true){
                              $("#passwordAdmin").prop("type", "text");
                            } else {
                              $("#passwordAdmin").prop("type", "password");

                            }
                          });
                          </script>
                        </td>
                        <td><button type="submit" class="btn btn-success">บันทึก</button></td>
                      </tr>
                      <?php echo form_close(); ?>

                    <?php foreach ($TeamAdmin as $row): ?>
                      <?php echo form_open('/Permission/SaveAdmin/Admin/'); ?>
                      <input type="hidden" name="admin_id" value="<?php echo $row['admin_id'] ?>">
                      <tr>
                        <td>หัวหน้าทีม <?php echo $row['admin_team'] ?></td>
                        <td>
                          <div class="input-group input-group-lg">
                            <div class="form-line">
                              <input type="text" class="form-control" name="admin_username" value="<?php echo $row['admin_username'] ?>"></td>
                            </div>
                          </div>

                          <td>

                            <div class="input-group input-group-lg">
                              <div class="form-line">
                                <input id="password<?php echo $row['admin_team'] ?>" type="password" class="form-control" name="admin_password" value="<?php echo base64_decode($row['admin_password']) ?>">
                              </div>
                              <span class="input-group-addon">
                                <input id="show<?php echo $row['admin_team'] ?>" type="checkbox" class="filled-in" id="ig_checkbox">
                                <label for="show<?php echo $row['admin_team'] ?>" style="font-size:15px">แสดง</label>
                              </span>
                            </div>

                            <script type="text/javascript">

                            $("#show<?php echo $row['admin_team'] ?>").change( function() {
                    
                              if($(this).prop('checked')==true){
                                $("#password<?php echo $row['admin_team'] ?>").prop("type", "text");
                              } else {
                                $("#password<?php echo $row['admin_team'] ?>").prop("type", "password");

                              }
                            });
                            </script>
                          </td>

                          <td><button type="submit" class="btn btn-success">บันทึก</button></td>
                        </tr>
                        <?php echo form_close(); ?>
                    <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
