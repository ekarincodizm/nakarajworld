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

	public function AddBookBank_post()
  {
		$input =  $this->post();
		print_r($input);
		// $this->db->insert('admin', $input);
		//
    // $member_id = $this->uri->segment(3);
    // $input = array(
    //   'bank_id' => $_POST['bank_id'],
    //   'bookbank_account' => $_POST['bookbank_account'],
    //   'bookbank_number' => $_POST['bookbank_number'],
    //   'bookbank_bank_branch' => $_POST['bookbank_bank_branch'],
    //   'member_id' =>$member_id,
    // );
    $this->db->insert('mlm_bookbank', $input);
    //redirect($this->agent->referrer(), 'refresh');

  }


}
