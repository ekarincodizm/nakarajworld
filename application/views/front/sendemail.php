
<div id="wrapper"  >
	<div id="top">
		<section id="intro" class="separator bottom" data-speed="2" data-type="background">
			<div class="container text-center">
				<div class="row">
					<div class="col-md-12">
					<h6 style="color:red;">ส่งข้อความเรียบร้อยแล้ว</h6>
					<h6>ยินดีต้อนรับ</h6>
					<div class="col-md-12">
						<img src="<?php echo base_url('assets/image/'.$Config[0]['mlm_config_logo'])?>" class="shadow" alt="Shadow">
					</div>
					<h1>นว ดรากอน</h1>
					<!-- <h2>Great <strong>template</strong> for offering a rural <strong>products</strong> and <strong>services</strong>!</h2> -->
					<!-- <a class="button green rounded margin-20" href="#contact">Contact Us</a> -->
					</div>
					</div>
				</div>
		</section>
	</div>

	<section id="intro-features" class="direction-arrow">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-12">
					<h6>อีเมล	<?php echo $Config[0]['mlm_config_email'] ?></h6>
					<h2>เบอร์โทร	<?php echo $Config[0]['mlm_config_tel'] ?></h2>
					<span class="title-separator"></span>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 col-lg-push-1 text-center">
					<p>
						ชื่อร้านค้า <br>
						<?php echo $Config[0]['mlm_config_name'] ?><br>
						รายละเอียดร้านค้า<br>
						<?php echo $Config[0]['mlm_config_detail'] ?><br>
					</p>
					<span class="title-separator bottom"></span>
					<!-- <a class="button brown rounded" href="#top">More Info</a> -->
				</div>
			</div>
		</div>
	</section>

	<?php if (count($ProductsList)>0): ?>
		<section id="gallery" class="separator top" style="margin-bottom:100px">
			<span class="arrow-separator"></span>
			<div class="container-fluid">
				<div class="row no-padding">
					<div class="col-lg-12">
						<div id="owl-demo" class="owl-carousel">
							<?php foreach ($ProductsList as $row): ?>
								<figure>
									<div class="overlay">
										<div class="content">
											<a class="category" href="<?php echo site_url('/Store/ProductsDetail/'.$row['products_id']); ?>">
												<?php if ($row['products_price_discount']>0): ?>
													ราคาปกติ <strike><?php echo $row['products_price_narmal'] ?></strike> .- <br>ลดเหลือ
													<?php else: ?>
														ราคา
												<?php endif; ?>
												 <?php echo $row['products_price_narmal']-($row['products_price_narmal']*$row['products_price_discount']/100) ?>.- <br>PV : <?php echo $row['products_pv']?></a>
											<h3><a href="<?php echo site_url('/Store/ProductsDetail/'.$row['products_id']); ?>" class="white"><?php echo $row['products_name'] ?></a></h3>
										</div>
									</div>
									<img class="img-responsive" src="<?php echo base_url('assets/image/products/'.$row['products_image'])?>" alt="<?php echo $row['products_name'] ?>">
								</figure>
							<?php endforeach; ?>


						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section id="contact" class="separator top">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-12">
					<h6>ติดต่อเรา</h6>
					<h2>สอบถาม หรือแสดงความคิดเห็น</h2>
					<span class="title-separator"></span>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="contactform form">
						<!-- <form method="post" action="contact-form.php" name="contactform" id="contactform"> -->
						<?php echo form_open('/HomePage/SendMailTo'); ?>
							<div class="row">
								<div class="col-md-4">
									<label for="name">ชื่อ-สกุล</label>
									<div class="form-group">
										<input class="form-control" required name="mailName" type="text" id="name" placeholder="กรุณากรอกชื่อ-นามสกุล" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-4">
									<label for="subject">เรื่อง</label>
									<div class="form-group">
										<input class="form-control" required name="mailSubject" type="text" id="subject" placeholder="กรุณากรอกหัวข้อเรื่อง" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-4">
									<label for="email">อีเมล</label>
									<div class="form-group">
										<input class="form-control"  required name="mailFrom" type="email" id="email" placeholder="กรุณากรอกที่อยู่ E-mail ของท่าน" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-12">
									<label for="comments">ข้อความ</label>
									<div class="form-group">
										<textarea class="form-control" required name="mailContent" cols="40" rows="3" id="comments" placeholder="กรุณากรอกข้อความ"></textarea>
									</div>
									<div id="message"></div>
									<div>
										<input type="submit" class="button green rounded" id="submit" value="Send Message" />
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

</div>
