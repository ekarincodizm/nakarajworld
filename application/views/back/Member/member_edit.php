<section class="content">
	<div class="container-fluid">
		
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="header">
					<h2>แก้ไขข้อมูลสมัครสมาชิก</h2>

				</div>
					<div class="body">
						<?php echo form_open('/MemberController/member_save'); ?>

						<input  name="member_id" type="hidden" value="<?php echo $Result['member'][0]['member_id'] ?>" />
						<input  name="member_id_card_type" type="hidden" value="<?php echo $Result['member'][0]['member_id_card_type'] ?>" />
						<div class="row">

							<div class="col-md-2">
								<label >คำนำหน้า</label>

								<select class="form-control show-tick" name="member_prefix">
									<option value="นาย">นาย</option>
									<option value="นาง">นาง</option>
									<option value="นางสาว">นางสาว</option>
								</select>

							</div>
							<div class="col-md-4">
								<label >ชื่อ</label>
								<div class="form-group">
									<div class="form-line">

										<input class="form-control" name="member_firstname" value="<?php echo $Result['member'][0]['member_firstname'] ?>" type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<label >นามสกุล</label>
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="member_lastname" value="<?php echo $Result['member'][0]['member_lastname'] ?>" type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">

								<?php if($Result['member'][0]['member_id_card_type']==0): ?>
									<label >เลขประจำตัวประชาชน</label>
								<?php elseif ($Result['member'][0]['member_id_card_type']==1): ?>
									<label >Passport</label>
								<?php elseif($Result['member'][0]['member_id_card_type']==2): ?>
									<label >Work Permit</label>
								<?php endif; ?>

								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="member_citizen_id" type="text" value="<?php echo $Result['member'][0]['member_citizen_id'] ?>"/>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<label >วันเกิด</label>
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="member_born" value="<?php echo $Result['member'][0]['member_born'] ?>" type="date" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<label >อายุ</label>
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="member_age" value="<?php echo $Result['member'][0]['member_age'] ?>"  type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
							<!-- </div>
							<div class="row"> -->

							<div class="col-md-8">
								<label >อีเมล</label>
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="member_email" value="<?php echo $Result['member'][0]['member_email'] ?>" type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label >ที่อยู่</label>
								<div class="form-group">
									<div class="form-line">
										<textarea class="form-control"  name="member_address" value="<?php echo $Result['member'][0]['member_address'] ?>" rows="" style="height: 50px;"></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<label >เบอร์โทรศัพท์</label>
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="member_phone" value="<?php echo $Result['member'][0]['member_phone'] ?>" type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label >Line ID</label>
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="member_line_id" value="<?php echo $Result['member'][0]['member_line_id'] ?>" type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label >Skype</label>
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="member_skype" value="<?php echo $Result['member'][0]['member_skype'] ?>" type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label >What App</label>
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="member_whatapp" value="<?php echo $Result['member'][0]['member_whatapp'] ?>" type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label >อื่นๆ / etc.</label>
								<div class="">
									<div class="form-group">
										<div class="form-line">
											<input class="form-control" name="member_contact_etc" value="<?php echo $Result['member'][0]['member_contact_etc'] ?>"  type="text" placeholder="ช่องทาง" autocomplete="off"/>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4 col-md-offset-4 text-center">
								<div class="form-group">

										<button type="submit" name="button" class="btn btn-success btn-lg">บันทึกการแก้ไข</button>

								</div>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
