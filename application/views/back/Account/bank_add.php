<section class="content">
	<div class="container-fluid">

		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="header">
					<h2>เพิ่มข้อมูลธนาคาร</h2>

				</div>
					<div class="body">
						<?php echo form_open('/AccountController/bank_save'); ?>

						<input  name="bookbank_id" type="hidden" value="<?php echo $Result['AccountDetail'][0]['bookbank_id'] ?>" />

						<div class="row">

							<div class="col-md-2">
								<label >ธนาคาร</label>

								<select class="form-control show-tick" name="bank_id">
									<?php  foreach ($Result['BankDetail'] as $BankList): ?>
										<option value="<?php echo $BankList['bank_id'] ?>"><?php echo $BankList['bank_name'] ?></option>
										<?php  endforeach; ?>
									<!-- <option value="นาย">นาย</option>
									<option value="นาง">นาง</option>
									<option value="นางสาว">นางสาว</option> -->
								</select>

							</div>
							<div class="col-md-4">
								<label >สาขา</label>
								<div class="form-group">
									<div class="form-line">

										<input class="form-control" name="bookbank_bank_branch" value="" type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<label>บัญธนาคาร</label>
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="bookbank_account" value="" type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-8">

							</div>
							<div class="col-md-8">
								<label >หมายเลขบัญชีธนาคาร</label>
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" name="bookbank_number" value="" type="text" placeholder="" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>



						<div class="row">
							<div class="col-md-4 col-md-offset-4 text-center">
								<div class="form-group">

										<button type="submit" name="button" class="btn btn-success btn-lg">บันทึกข้อมูล</button>

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
