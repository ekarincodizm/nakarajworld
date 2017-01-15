<?php

defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

require APPPATH . '/libraries/REST_Controller.php';

class MemberService extends REST_Controller {

	function __construct() {
		parent::__construct();
		if(!isset($_SESSION)) {
			session_start();
		}
		$this->methods[ 'MemberList_get' ][ 'limit' ] = 500; // 500 requests per hour per user/key

	}

	public function MemberList_get() {
		$this->response( $this->MemberModel->MemberList() );
	}
	public function LoadProfile_post()
	{
		$id = $this->post('id');
		$Profile = $this->HomePageModel->LoadProfile( $id );
		$AccountList = $this->AccountModel->LoadAccountByMember( $id );
		$this->response(array(
			'Profile' => $Profile,
			'AccountList' => $AccountList

		));
	}


}
