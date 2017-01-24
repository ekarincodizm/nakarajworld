<section id="register" class="separator top" data-ng-controller="CheckRegisCtrl">
	<div class="container" style="min-height: 460px;">
		<div class="row text-center">
			<div class="col-lg-12" style="padding-top:20px">
				<h6>สมัครสมาชิก</h6>
				<span class="title-separator"></span>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
				<div class="contactform form">
					<?php echo form_open('/HomePage/CheckRegis'); ?>
					<!-- , ส่วนที่เอาออก array('id' => "FindUser", 'name' => "FindUser", 'novalidate'=>'') -->
					<!-- <form name="FindUser" class="form-horizontal" novalidate ng-submit="CheckRegis()"> -->
						<div class="row">
							<div class="col-md-12 text-center">
								<label for="name">หมายเลขประจำตัวประชาชน/เลขบัตรประจำตัวอื่นๆ</label>
								<div class="form-group">
									<select name="member_id_card_type" class="form-control input-lg text-center" ng-model="member_id_card_type">
										<option value="1">เลขบัตรประจำตัวประชาชน</option>
										<option value="2">Passport</option>
										<option value="3">Work Permit</option>
									</select>
								</div>
								<div class="form-group">
									<input class="form-control input-lg text-center" ng-model="member_citizen_id" name="member_citizen_id" id="member_citizen_id" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" autocomplete="off" required ng-model="member_citizen_id"/>
									<!-- <span style="color:red;" ng-show="FindUser.member_citizen_id.$error.required" class="help-inline">กรุณากรอกหมายเลขประจำตัว</span> -->
								</div>
							</div>

							<div class="col-md-12 text-center" ng-hide="find">
								<div class="form-group">
									<button type="submit" class="btn btn-lg btn-success" ng-disabled="FindUser.citizen_id.$error.required">ตรวจสอบ</button>
								</div>
							</div>
						</div>
					<!-- </form> -->
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
