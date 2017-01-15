<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BusinessSetting extends CI_Controller{
	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}
}
	public function LoadPage($value){
		$data = $value['Result'];
		$this->load->view('back/template/head', $data);
		$this->load->view($value['View']);
		$this->load->view('back/template/footer');
	}

	public function index() {
		$BusinessSetting = json_decode(json_encode($this->BusinessSettingModel->LoadBusinessSetting()), true);
		$PlanOneSetting = json_decode(json_encode($this->BusinessSettingModel->LoadPlanOneSetting()), true);
		// $this->debuger->prevalue($PlanOneSetting);
		$value = array(
			'Result' => array(
				'BusinessSetting' => $BusinessSetting,
				'PlanOneSetting' => $PlanOneSetting,
				// 'BusinessSetting' => $BusinessSetting,

			),
			'View' => 'back/BusinessSetting/BusinessSettingPage'
		);
		$this->LoadPage($value);
	}
	public function SavePlan()
	{
		date_default_timezone_set("Asia/Bangkok");
		$id = $this->uri->segment(3);
		$input = array(
			'income_percent_id' => $id,
			'income_percent_date' => Date('Y-m-d'),
			'income_percent_point' => $_POST['income_percent_point'],
			'income_percent_amount' => $_POST['income_percent_amount'],
		);
		$this->db->where('income_percent_id', $id)->update('mlm_income_percent_setting', $input);
		redirect($this->agent->referrer(), 'refresh');

	}
	public function SaveFee()
	{
		date_default_timezone_set("Asia/Bangkok");

		$input = array(
			'setting_date' => Date('Y-m-d'),
			'setting_adviser_income' => $_POST['setting_adviser_income'],
			'setting_register_fee' => $_POST['setting_register_fee'],
		);
		$this->db->where('setting_id', 1)->update('mlm_fee_setting', $input);
		redirect($this->agent->referrer(), 'refresh');

	}
	}
