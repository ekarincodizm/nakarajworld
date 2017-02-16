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
				<h6>แก้ไขรหัสผ่าน</h6>
				<span class="title-separator"></span>
			</div>
		</div>
		<div class="row">
			<center>
			<div class="col-lg-8 col-lg-offset-2" ng-hide="SendForm">

					<!-- <form class="form-horizontal form" novalidate ng-submit="SubmitProfile()"> -->
					<?php echo form_open_multipart('/HomePage/SubmitEditPassword'); ?>
					<input type="hidden" name="member_id" value="<?php echo $Profile[0]['member_id']  ?>">
					<!-- <input type="hidden" name="old_pass_check" value="<?php //echo base64_encode($user[0]['member_id'])?>"> -->
					<div class="row">
						<div class="col-md-offset-2 col-md-4">
							<label for="name">รหัาผ่านเก่า</label>
							<div class="form-group">
								<input required class="form-control" name="old_pass" type="password" placeholder="" autocomplete="off" value=""/>
							</div>
						</div>
						<div class="col-md-4">
							<label for="name">รหัสผ่านใหม่</label>
							<div class="form-group">
								<input required class="form-control" name="new_pass"  type="password" autocomplete="off"  value=""/>
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
				</center>

				</div>
			</div>
		</div>
	</div>
</section>
