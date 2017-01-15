<?php

defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

require APPPATH . '/libraries/REST_Controller.php';

class HomePageService extends REST_Controller {

	function __construct() {
		parent::__construct();
		if(!isset($_SESSION)) {
			session_start();
		}
		$this->methods[ 'LoadSetting_get' ][ 'limit' ] = 500; // 500 requests per hour per user/key
		$this->methods[ 'CheckRegis_post' ][ 'limit' ] = 500; // 500 requests per hour per user/key
		$this->methods[ 'SubmitRegister_post' ][ 'limit' ] = 500; // 500 requests per hour per user/key
		$this->methods[ 'SubmitLogin_post' ][ 'limit' ] = 500; // 500 requests per hour per user/key
	}

	public function LoadSetting_get() {
		$this->response( $this->HomePageModel->LoadSetting() );
	}

	public function CheckRegis_post() {
		$data = $this->post();
		$this->response($this->HomePageModel->CheckRegis( $data ));
	}

	public function SubmitProfile_post() {
		$data = $this->post();

		if (!empty($data['member_id'])) {
			$Member = $this->HomePageModel->UpdateMember( $data );
		} else {
			$Member = $this->HomePageModel->AddMember( $data );
			$MemberArr = json_decode(json_encode($Member), true);
	    $value = array(
				'user_name' => $MemberArr[0]['member_citizen_id'],
				'user_pass' => $MemberArr[0]['member_phone'],
				'member_id' => $MemberArr[0]['member_id'],
			);
			$User = $this->HomePageModel->AddUser( $value );

			$_SESSION['MEMBER_ID'] = $MemberArr[0]['member_id'];

			$this->response($Member);
		}

	}
	public function SubmitLogin_post()
	{
		$data = $this->post();
		$User = $this->HomePageModel->AuthenUser( $data );
		if (empty($User))
		{
			$this->response(array('status' => false, 'error_message' => 'ไม่พบข้อมูลในระบบ'));
		} else {
			$UserArr = json_decode(json_encode($User), true);
			$_SESSION['MEMBER_ID'] = $UserArr[0]['member_id'];
			$this->response(array('status' => true, 'User' => $User));
		}
	}
	public function LoadProfile_post()
	{
		$id = $this->post('id');
		$Profile = $this->HomePageModel->LoadProfile( $id );
		$ProfileArr = json_decode(json_encode($Profile), true);
		$this->response(array('status' => $ProfileArr[0]['member_status'], 'Profile' => $Profile));
	}
}
