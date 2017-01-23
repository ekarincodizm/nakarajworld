<?php if (!isset($_SESSION['ADMIN_ID'])) {
			redirect('/Admin');
		} else { $MEMBER_ID = $_SESSION['ADMIN_ID']; ?>
			<script>
				var MEMBER_ID = "<?php echo $MEMBER_ID ?>";
			</script>
	<?php } ?>

	<!doctype html>
	<html lang="en" ng-app="HomePageApp">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>นว ดรากอน เวลท์ เน็ตเวิร์ค</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />

		<?php
		$this->debuger->load_back_plugins_css('bootstrap/css/bootstrap');
		$this->debuger->front_load_css('bootstrap-datetimepicker.min');
		$this->debuger->load_back_plugins_css('node-waves/waves.min');
		$this->debuger->load_back_plugins_css('animate-css/animate.min');
		$this->debuger->load_back_plugins_css('morrisjs/morris');
		$this->debuger->load_back_css('iconfont/material-icons');
		$this->debuger->load_back_plugins_css('bootstrap-select/css/bootstrap-select');
		$this->debuger->front_load_css('thsarabunnew');
		$this->debuger->load_back_plugins_css('jquery-datatable/skin/bootstrap/css/dataTables.bootstrap');
		$this->debuger->load_back_css('style');
		$this->debuger->load_back_css('themes/theme-cyan.min');
		?>
<script type="text/javascript">
	var SITE_URL = "<?php echo site_url(); ?>"
</script>
<style media="screen">
	table{
		font-family: 'tahoma';
		font-size: 11px;
	}
</style>
	</head>
	<body class="theme-cyan">
 <?php $this->load->view('back/template/menu'); ?>
