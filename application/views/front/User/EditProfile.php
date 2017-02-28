<?php $this->load->view('front/User/UserID'); ?>

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
<section id="register" class="separator top" ng-controller="EditProfileCtrl">
	<div class="container" style="min-height: 460px;">
		<div class="row text-center">
			<div class="col-lg-12" style="padding-top:20px">
				<h6>แก้ไขข้อมูลส่วนตัว</h6>
				<span class="title-separator"></span>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 col-lg-offset-2" ng-hide="SendForm">

					<!-- <form class="form-horizontal form" novalidate ng-submit="SubmitProfile()"> -->
					<?php echo form_open_multipart('/HomePage/SubmitEditProfile'); ?>
					<input type="hidden" name="member_id" value="<?php echo $Profile[0]['member_id']  ?>">
						<div class="row">
							<div class="col-md-2">
								<label for="name">คำนำหน้า</label>
								<div class="form-group">
									<select name="member_prefix" required class="form-control" id="member_prefix">
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
								<label for="name">ชื่อ (ภาษาไทย) </label>
								<div class="form-group">
									<input class="form-control" name="member_firstname" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_firstname']?>"/>
								</div>
							</div>
							<div class="col-md-6">
								<label for="name">นามสกุล (ภาษาไทย)</label>
								<div class="form-group">
									<input class="form-control" name="member_lastname" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_lastname']?>"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label for="name">คำนำหน้า</label>
								<div class="form-group">
									<select name="member_prefix_eng" required class="form-control" id="member_prefix_eng">
										<option value="Mr.">Mr.</option>
										<option value="Mrs.">Mrs.</option>
										<option value="Miss">Miss</option>
									</select>
									<script type="text/javascript">
										$("#member_prefix_eng").val("<?php echo $Profile[0]['member_prefix_eng'] ?>");
									</script>
								</div>
							</div>
							<div class="col-md-4">
								<label for="name">ชื่อ (ภาษาอังกฤษ)</label>
								<div class="form-group">
									<input class="form-control" name="member_firstname_eng" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_firstname_eng']  ?>"/>
								</div>
							</div>
							<div class="col-md-6">
								<label for="name">นามสกุล (ภาษาอังกฤษ)</label>
								<div class="form-group">
									<input class="form-control" name="member_lastname_eng" required type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_lastname_eng']?>"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label for="name"><?php echo $Profile[0]['member_id_card_type_name'] ?></label>
								<input type="hidden" value="{{member_id_card_type}}">
								<div class="form-group">
									<input class="form-control" name="member_citizen_id" type="text" readonly value="<?php echo $Profile[0]['member_citizen_id']?>"/>
								</div>
							</div>
							<div class="col-md-3">

								<label for="name">วันเกิด </label>
								<div class="form-group">
									<div class='input-group date bootstrap-datepicker' id='member_born_datepicker' >
	                    <input  type='datetime' class="form-control" name="member_born" required  value="<?php echo $Profile[0]['member_born']?>">

	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>

									<!-- <div class="input-group">
										<input type="text" class="form-control datepicker" name="material_po_detail_start" value="{{member_born}}">

									</div> -->
								</div>
								<div class="form-group">

								<input id="inputWithDatePicer"  class="form-control input-medium" type="text"  data-provide="datepicker" data-date-language="th-th">
								<input id="getDatePicer" type="text" name="member_born" style="display:none" value="<?php echo $Profile[0]['member_born']?>">
								<script type="text/javascript">
									$("#inputWithDatePicer").change(function() {
										var born = $('#inputWithDatePicer').data('datepicker').date;
										var born_date = ( born.getDate() < 10 ? "0" : "" ) + born.getDate();
										var born_month =  born.getMonth()+1;
												born_month =  ( born_month < 10 ? "0" : "" ) + born_month;
										var born_year = born.getFullYear();
										var db_born = born_year+"-"+born_month+"-"+born_date;
										console.log(db_born);

										$("#getDatePicer").val(db_born);
									});



								</script>
							</div>
							</div>
							<div class="col-md-6">
								<label for="name">อีเมล</label>
								<div class="form-group">
									<input class="form-control" name="member_email" required type="email" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_email']?>"/>
								</div>
							</div>
						</div>
						<div class="row">
              <div class="col-md-8">
                <label for="name">ที่อยู่</label>
                <div class="form-group">
                    <textarea class="form-control" name="member_address" required style="height:60px;"><?php echo $Profile[0]['member_address'] ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <label for="name">ที่อยู่สำรอง กรณีติดต่อไม่ได้่</label>
                <div class="form-group">
                    <textarea class="form-control" name="member_address2"  style="height:60px;"><?php echo $Profile[0]['member_address2'] ?></textarea>
                </div>
              </div>
            </div>
					<div class="row">
						<div class="col-md-4">
							<label for="name">เบอร์โทรศัพท์</label>
							<div class="form-group">
								<input class="form-control" name="member_phone" type="text" max="10" placeholder="" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" autocomplete="off" value="<?php echo $Profile[0]['member_phone']?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">Line ID</label>
							<div class="form-group">
								<input class="form-control" name="member_line_id" type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_line_id']?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">Skype</label>
							<div class="form-group">
								<input class="form-control" name="member_skype" type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_skype']?>"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label for="name">What App</label>
							<div class="form-group">
								<input class="form-control" name="member_whatapp" type="text" placeholder="" autocomplete="off" value="<?php echo $Profile[0]['member_whatapp']?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">ช่องทางการติดต่ออื่นๆ / etc.</label>
							<div class="form-group">
								<input class="form-control" name="member_contact_etc"  type="text" autocomplete="off"  value="<?php echo $Profile[0]['member_contact_etc']?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">รูปโปรไฟล์</label>
							<div class="form-group">
								<input type="file" class="filestyle" name="member_photo"  id="member_photo" OnChange="readIMG(this)"/>
							</div>
						</div>
					</div>

					</div>

					<div class="row">
					<div class="col-md-12 text-center ">
						<div class="form-group">
							<button type="submit" id="btnUpdate" class="button green rounded">บันทึก</button>
							<a href="<?php echo $this->agent->referrer(); ?>" class="button rounded">ยกเลิก</a>
						</div>
					</div>
				</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
