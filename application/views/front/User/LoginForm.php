<section id="LoginCtrl" class="separator top" ng-controller="LoginCtrl">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-12" style="padding-top:20px">
					<h6>เข้าสู่ระบบ</h6>
					<span class="title-separator"></span>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-lg-offset-4" ng-hide="SendForm">
					<div class="contactform form">
							<?php echo form_open('/HomePage/SubmitLogin/'); ?>
							<form class="form-horizontal form" novalidate ng-submit="SubmitLogin()">
							<div class="row">
								<div class="col-md-12">
									<label for="name">หมายเลขประจำตัว</label>
									<div class="form-group">
										<input class="form-control input-lg" name="user_name" type="text"  ng-model="user_name"/>
									</div>
								</div>
								<div class="col-md-12">
									<label for="password">รหัสผ่าน</label>
									<div class="form-group">
										<input class="form-control input-lg" name="user_pass" type="password" ng-model="user_pass"/>
									</div>
								</div>
								<div class="col-md-12 text-center">
									<div class="form-group">
									<button type="submit" class="button green rounded">เข้าสู่ระบบ</button>
									<a href="<?php echo site_url('HomePage/CheckRegisPage'); ?>" class="button rounded">ลงทะเบียน</a>
								</div>
								</div>
							</div>
						</form>
						<?php echo form_close(); ?>
					</div>
				</div>
				<!-- <div class="col-md-12 text-center" ng-show="Loading">
					<div class="loading"><img src="<?php //echo base_url('/assets/image/spin.gif'); ?>" style="height: 51px;">
					</div>
				</div>
				<div class="col-md-12 text-center" ng-show="LoginFail">
					ผิดพลาด
				</div> -->
			</div>
		</div>
	</section>
