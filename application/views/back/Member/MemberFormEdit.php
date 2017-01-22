<?php

$this->debuger->front_load_js('jquery.min');
$this->debuger->front_load_js('moment-with-locales.min');
$this->debuger->front_load_js('transition');
$this->debuger->front_load_js('collapse');
$this->debuger->front_load_js('bootstrap.min');
$this->debuger->front_load_js('bootstrap-datetimepicker');
 ?>
 <script type="text/javascript">
 function readIMG(input) {
 	if (input.files && input.files[0]) {
 	var reader = new FileReader();
 		reader.onload = function (e)
 		{
 			$('#imgShow').attr('src', e.target.result);
 		}
 		reader.readAsDataURL(input.files[0]);
 		}
 	}
 $(function(){
 		$('#member_photo').change(function(){
 			var f = this.files[0];

 			var fty=new Array(".gif",".jpg",".jpeg",".png");
         	var a=document.SubmitRegister.member_photo.value;
 			var permiss=0;
 			a=a.toLowerCase();
 			if(a !=""){
 				for(i=0;i<fty.length;i++){
 					if(a.lastIndexOf(fty[i])>=0){
 						permiss=1;
 						break;
 					}else{
 						continue;
 					}
 				}
 				if(permiss==0){
 					alert("อัพโหลดได้เฉพาะไฟล์ gif jpg jpeg png");
 					document.getElementById("btnUpdate").disabled = true;
 				}else{
           document.getElementById("btnUpdate").disabled = false;
         }
 			}
 		})
 	})

 $(":member_photo").filestyle({buttonText: "Find file"});
 </script>
<section class="content" ng-controller="MemberCtrl">
  <div class="container-fluid">
    <div class="block-header">
      <h1>สมาชิก</h1>
    </div>
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h2>
              แก้ไขสมาชิก
            </h2>
          </div>
          <div class="body">
            <?php echo form_open_multipart('/Member/SubmitProfile', array('id' => "SubmitRegister", 'name' => "SubmitRegister", 'novalidate'=>'')); ?>
            <input type="hidden" name="member_id" value="<?php echo $Profile[0]['member_id']  ?>">

            <div class="row">
              <div class="col-md-2">
                <label for="name">คำนำหน้า</label>
                <div class="form-group">
                  <select id="member_prefix" name="member_prefix" required class="form-control" >
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                  </select>
                  <script type="text/javascript">
                    $("#member_prefix").val("<?php echo $Profile[0]['member_prefix'] ?>");
                  </script>
                </div>
              </div>
              <div class="col-md-4">
                <label for="name">ชื่อ</label>
                <div class="form-group">
                  <div class="input-group input-group-lg">
                    <div class="form-line">
                      <input class="form-control" name="member_firstname" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_firstname']  ?>"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="name">นามสกุล</label>
                <div class="form-group">
                  <div class="input-group input-group-lg">
                    <div class="form-line">
                      <input class="form-control" name="member_lastname" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_lastname']  ?>"/>
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-md-2">
                  <label for="name">คำนำหน้า</label>
                  <div class="form-group">
                    <select name="member_prefix_eng" required class="form-control" id="member_prefix_eng">
                      <option value="Mr.">Mr.</option>
                      <option value="Mrs.">Mrs.</option>
                      <option value="Miss">Miss</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="name">ชื่อ (ภาษาอังกฤษ)</label>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <div class="form-line">
                    <input class="form-control" name="member_firstname_eng" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_firstname_eng']  ?>"/>
                  </div>
                </div>
              </div>
            </div>
                <div class="col-md-6">
                  <label for="name">นามสกุล (ภาษาอังกฤษ)</label>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <div class="form-line">
                    <input class="form-control" name="member_lastname_eng" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_lastname_eng']?>"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-md-3">
                <label for="name">ประเภทบัตร</label>
                <select id="member_id_card_type" name="member_id_card_type" required class="form-control text-center">
                  <option value="1">เลขบัตรประจำตัวประชาชน</option>
                  <option value="2">Passport</option>
                  <option value="3">Work Permit</option>
                </select>
                <script type="text/javascript">
                  $("#member_id_card_type").val("<?php echo $Profile[0]['member_id_card_type'] ?>");
                </script>
              </div>
              <div class="col-md-3">

                <label for="name">เลขบัตร</label>
                <div class="form-group">
                  <div class="input-group input-group-lg">
                    <div class="form-line">
                      <input class="form-control" name="member_citizen_id" required type="text" value="<?php echo $Profile[0]['member_citizen_id']  ?>" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <label for="name">วันเกิด</label>
                <div class="form-group">
                  <div class='input-group date bootstrap-datepicker form-line' id='member_born_datepicker'>
                    <input name="member_born" type='datetime' required class="form-control"  value="<?php echo $Profile[0]['member_born']  ?>" >
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label for="name">อีเมล</label>
                <div class="form-group ">
                  <div class="input-group form-line">
                    <input class="form-control" name="member_email" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_email']  ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <label for="name">ที่อยู่</label>
                <div class="form-group">
                  <div class="input-group form-line">
                    <textarea class="form-control" name="member_address" required style="height:60px;"><?php echo $Profile[0]['member_address'] ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <label for="name">ที่อยู่สำรอง กรณีติดต่อไม่ได้</label>
                <div class="form-group">
                  <div class="input-group form-line">
                    <textarea class="form-control" name="member_address2" required style="height:60px;"><?php echo $Profile[0]['member_address2'] ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label for="name">เบอร์โทรศัพท์</label>
                <div class="form-group">
                  <div class="input-group form-line">
                    <input class="form-control" name="member_phone" required type="text" placeholder="" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" autocomplete="off" value="<?php echo $Profile[0]['member_phone']  ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label for="name">Line ID</label>
                <div class="form-group">
                  <div class="input-group form-line">

                    <input class="form-control" name="member_line_id" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_line_id']  ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label for="name">Skype</label>
                <div class="form-group">
                  <div class="input-group form-line">

                    <input class="form-control" name="member_skype" required type="text" placeholder="" autocomplete="off"  value="<?php echo $Profile[0]['member_skype']  ?>"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label for="name">What App</label>
                <div class="form-group">
                  <div class="input-group form-line">

                    <input class="form-control input-lg" name="member_whatapp" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_whatapp']  ?>" />
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label for="name">ช่องทางการติดต่ออื่นๆ / etc.</label>
                <div class="form-group">
                  <div class="input-group form-line">

                    <input class="form-control input-lg" name="member_contact_etc" required type="text" autocomplete="off"  value="<?php echo $Profile[0]['member_contact_etc']  ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label for="name">รูปโปรไฟล์</label>
                <div class="form-group">
                  <div class="input-group form-line">
                    <input type="file" class="filestyle" name="member_photo" id="member_photo" OnChange="readIMG(this)"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-md-offset-4 text-center">
                <div class="form-group">
                  <button type="submit" id="btnUpdate" class="btn btn-lg bg-light-green waves-effect">บันทึก</button>
                  <!-- <button type="submit" class="button green rounded">ลงทะเบียน</button> -->
                </div>
              </div>
            </div>
            <!-- </form> -->
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
