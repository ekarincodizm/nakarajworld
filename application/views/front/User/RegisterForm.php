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
					document.getElementById("btnRegis").disabled = true;
				}else{
          document.getElementById("btnRegis").disabled = false;
        }
			}
		})
	})

$(":member_photo").filestyle({buttonText: "Find file"});
</script>

<section id="register" class="separator top" data-ng-controller="RegisterCtrl">
	<div class="container" style="min-height: 460px;">
		<div class="row text-center">
			<div class="col-lg-12" style="padding-top:20px">
				<h6>สมัครสมาชิก</h6>
				<span class="title-separator"></span>
			</div>
		</div>
		<div class="row" id="RegisterForm" ng-hide="<?php echo $Registered ?>">
			<?php if ($Registered!="true"): ?>
				<div class="col-lg-8 col-lg-offset-2" >
					<!-- <form class="form-horizontal form" novalidate ng-submit="SubmitProfile()"> -->
					<?php echo form_open_multipart('/HomePage/SubmitProfile'); ?>

					<div class="row">
						<div class="col-md-2">
							<label for="name">คำนำหน้า</label>
							<div class="form-group">
								<select name="member_prefix" required class="form-control">
									<option value="">-เลือก-</option>
									<option value="นาย">นาย</option>
									<option value="นาง">นาง</option>
									<option value="นางสาว">นางสาว</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">ชื่อ (ภาษาไทย)</label>
							<div class="form-group">
								<input class="form-control" name="member_firstname" required type="text" placeholder="" autocomplete="off" ng-model="member_firstname"/>
							</div>
						</div>
						<div class="col-md-6">
							<label for="name">นามสกุล (ภาษาไทย)</label>
							<div class="form-group">
								<input class="form-control" name="member_lastname" required type="text" placeholder="" autocomplete="off" ng-model="member_lastname"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-2">
							<label for="name">คำนำหน้า</label>
							<div class="form-group">
								<select name="member_prefix_eng" required class="form-control">
									<option value="">-Select-</option>
									<option value="Mr.">Mr.</option>
									<option value="Mrs.">Mrs.</option>
									<option value="Miss">Miss</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">ชื่อ (ภาษาอังกฤษ)</label>
							<div class="form-group">
								<input class="form-control" name="member_firstname_eng" required type="text" placeholder="" autocomplete="off" ng-model="member_firstname_eng"/>
							</div>
						</div>
						<div class="col-md-6">
							<label for="name">นามสกุล (ภาษาอังกฤษ)</label>
							<div class="form-group">
								<input class="form-control" name="member_lastname_eng" required type="text" placeholder="" autocomplete="off" ng-model="member_lastname_eng"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">

							<!-- <label for="name">{{member_id_card_type_name}}</label> -->
							<label for="name"><?php echo $IDCard['member_id_card_type_name'] ?></label>

							<div class="form-group">
								<input name="member_id_card_type" type="hidden" readonly value="<?php echo $IDCard['member_id_card_type'] ?>"/>
								<input class="form-control" name="member_citizen_id" type="text" readonly value="<?php echo $IDCard['member_citizen_id'] ?>"/>
							</div>
						</div>
						<div class="col-md-3">
							<label for="name">วันเกิด</label>
							<div class="form-group">
								<div class='input-group date bootstrap-datepicker' id='member_born_datepicker'>
									<input name="member_born" required type='datetime' class="form-control"  value="{{member_born}}">

									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>

							</div>
						</div>

						<div class="col-md-6">
							<label for="name">อีเมล</label>
							<div class="form-group">
								<input class="form-control" name="member_email" required type="text" placeholder="" autocomplete="off" ng-model="member_email"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label for="name">ที่อยู่</label>
							<div class="form-group">
								<textarea class="form-control" name="member_address" required style="height:60px;" ng-model="member_address"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label for="name">ที่อยู่สำรอง กรณีติดต่อไม่ได้</label>
							<div class="form-group">
								<textarea class="form-control" name="member_address2" required style="height:60px;" ng-model="member_address2"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label for="name">เบอร์โทรศัพท์</label>
							<div class="form-group">
								<input class="form-control" name="member_phone" required type="text" placeholder="" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" autocomplete="off" ng-model="member_phone"/>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">Line ID</label>
							<div class="form-group">
								<input class="form-control" name="member_line_id" required type="text" placeholder="" autocomplete="off" ng-model="member_line_id"/>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">Skype</label>
							<div class="form-group">
								<input class="form-control" name="member_skype" required type="text" placeholder="" autocomplete="off" ng-model="member_skype"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label for="name">What App</label>
							<div class="form-group">
								<input class="form-control input-lg" name="member_whatapp" required type="text" placeholder="" autocomplete="off" ng-model="member_whatapp"/>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">ช่องทางการติดต่ออื่นๆ / etc.</label>
							<div class="form-group">
								<input class="form-control input-lg" name="member_contact_etc" required type="text" autocomplete="off"  ng-model="member_contact_etc"/>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">รูปโปรไฟล์</label>
							<div class="form-group">
								<input type="file" class="filestyle" name="member_photo" required id="member_photo" OnChange="readIMG(this)"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-md-offset-4 text-center">
							<div class="form-group">
								<button type="submit" id="btnRegis" class="button green rounded">ลงทะเบียน</button>
							</div>
						</div>
					</div>
					<!-- </form> -->
					<?php echo form_close(); ?>
				</div>
			<?php endif; ?>


		</div>
		<div class="row" id="RegisterStatus">
			<!-- <div class="col-md-12 text-center" ng-show="<?php echo $Registered ?>">
				<div class="loading"><img src="<?php echo base_url('/assets/image/spin.gif'); ?>" style="height: 51px;">
				</div>
			</div> -->
			<!-- <div class="col-md-12 text-center" ng-show="<?php echo $Registered ?>">
				ผิดพลาด
			</div> -->
			<?php if ($Registered=='true'): ?>
				<div class="col-md-12 text-center" >
					<p>สมาชิกใหม่ <br>
					<?php echo @$Member[0]['member_firstname']." ".@$Member[0]['member_lastname'] ?><br>
						รหัสผ่าน คือ เบอร์โทรศัพท์<br>
						คุณสามารถเปลี่ยนรหัสผ่านได้ ที่เมนูแก้ไขข้อมูลส่วนตัว
					</p>
					<div class="form-group">
						<a href="<?php echo site_url('/HomePage/Profile'); ?>" class="button green rounded">ดูโปรไฟล์</a>
						<a href="<?php echo site_url('/HomePage'); ?>" class="button rounded">กลับไปยังเว็บไซต์</a>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>

</section>
