<!DOCTYPE html>
<html lang="en" data-ng-app="HomePageApp">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>นว ดรากอน เวลท์ เน็ตเวิร์ค</title>
	<script type="text/javascript">
	var BASE_URL = "<?php echo base_url(); ?>";
	var SITE_URL = "<?php echo site_url(); ?>";
	</script>
	<?php
	// $this->debuger->front_load_css('ui-bootstrap-custom-2.3.1-csp');
	$this->debuger->front_load_css('bootstrap.min');
	$this->debuger->front_load_css('jquery-ui-1.10.4.custom.min');
	$this->debuger->front_load_css('font-awesome.min');
	$this->debuger->front_load_css('owl.carousel');
	$this->debuger->front_load_css('style');
	$this->debuger->front_load_css('thsarabunnew');
	// $this->debuger->front_load_css('bootstrap-datetimepicker.min');
	$this->debuger->front_load_css('datepicker');

	$this->debuger->front_load_js('angular.min');
	$this->debuger->front_load_js('angular-locale_th');
	$this->debuger->front_load_js('angular-animate');
	$this->debuger->front_load_js('angular-sanitize');


	$this->debuger->front_load_js('jquery.min');
	$this->debuger->front_load_js('moment-with-locales.min');
	$this->debuger->front_load_js('transition');
	$this->debuger->front_load_js('collapse');
	$this->debuger->front_load_js('bootstrap.min');
	$this->debuger->front_load_js('bootstrap-datepicker');
	$this->debuger->front_load_js('bootstrap-datepicker-thai');
	$this->debuger->front_load_js('locale/bootstrap-datepicker.th');
	// $this->debuger->front_load_js('locale/th');

	// <!-- Jquery DataTable Plugin Js -->
	$this->debuger->load_back_plugins('jquery-datatable/jquery.dataTables');
	$this->debuger->load_back_plugins('jquery-datatable/skin/bootstrap/js/dataTables.bootstrap');

	?>

	<style media="screen">
	h1, h2, h3, h4, h5, h6 {
		font-family: 'THSarabunNew', sans-serif !important;
	}

	body {
		font-family: 'THSarabunNew', sans-serif;
	}
	</style>
</head>
<body >
	<?php $this->load->view('front/Template/UserTopMenu'); ?>
