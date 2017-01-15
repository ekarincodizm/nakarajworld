<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}
}
	public function LoadPage($value){
		// $data['Result'] = $value['Result'];
		$this->load->view('back/template/head');
		$this->load->view($value['View']);
		$this->load->view('back/template/footer');
	}

	public function index() {
		$value = array(
			// 'Result' => array
			// 	'' => ,
			// );
			'View' => 'back/blank'
		);
		$this->LoadPage($value);
	}
	}
