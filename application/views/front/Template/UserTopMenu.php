<header class="nav-down">
	<nav class="navbar">
				<div class="container">
					<div class="row">
						<div class="logo">
							<img src="<?php echo base_url('assets/theme/front-end/images/logo.png')?>" class="shadow" alt="Shadow" style="height: 60px;">

						</div>
						<div class="navbar-header">
							<a class="mobile-toggle navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<div class="bar-1"></div>
								<div class="bar-2"></div>
								<div class="bar-3"></div>
							</a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right text-center">
								<li><a href="<?php echo site_url();?>">หน้าแรก</a></li>
								<?php if (!isset($_SESSION['MEMBER_ID'])): ?>
								<li><a href="<?php echo BASE_URL('Member_Register.pdf');?>" target="_blank">แบบฟอร์มสมัครสมาชิก</a></li>
							<?php endif; ?>

								<?php if (isset($_SESSION['MEMBER_ID'])): ?>
								<li><a href="<?php echo site_url('Store/TempList');?>" class="">ตะกร้าสินค้า </a></li>
							<?php //endif; ?>
								<!-- <li><a href="#testimonials">คำยืนยัน</a></li>
								<li><a href="#extra-features">ใบรับรอง</a></li> -->
								<?php //if (!isset($_SESSION['MEMBER_ID'])): ?>
									<!-- <li><a class="button green border light rounded" href="<?php echo site_url('homepage/LoginPage');?>">เข้าสู่ระบบ</a></li> -->
									<?php //else: ?>
										<li><a class="button green border light rounded" href="<?php echo site_url('homepage/Profile');?>">ข้อมูลส่วนตัว</a></li>
										<li><a class="button red rounded" href="<?php echo site_url('homepage/Logout');?>">ออกจากระบบ</a></li>
								<?php endif; ?>

							</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				</div><!-- /.container-fluid -->
			</nav>
</header>
