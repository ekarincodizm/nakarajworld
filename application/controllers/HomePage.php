<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HomePage extends CI_Controller{
	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}
	}
	public function LoadUserPage($value){
		$data = $value['Result'];
		$this->load->view('front/Template/UserHead', $data);
		$this->load->view($value['View']);
		$this->load->view('front/Template/UserFooter');
	}
	public function LoadPage($value){
		$data = $value['Result'];
		$this->load->view('front/Template/head', $data);
		$this->load->view($value['View']);
		$this->load->view('front/Template/footer');
	}

	// public function index(){
	// 	$Setting['config'] = $this->SettingModel->Setting();
	// 	$this->load->view('HomePage',$Setting);
	// }

	public function index() {
		$ProductsList = $this->ProductsModel->ProductsList();
		// print_r($ProductsList);
		// exit();
		$ProductsList = json_decode(json_encode($ProductsList), true);

		$Config = $this->ConfigModel->Config();


		//new function config
		$Config = $this->ConfigModel->Config();
		//
		$value = array(
			'Result' => array(
				'ProductsList' => $ProductsList,
				'Config' => $Config,
			),
			'View' => 'front/HomePage',
		);
		$this->LoadPage($value);

	}
	public function LoginPage() {
		$value = array(
			'Result' => array(
			),
			'View' => 'front/User/LoginForm'
		);
		$this->LoadUserPage($value);
	}
	public function CheckRegisPage() {

		$value = array(
			'Result' => array(
				'Duplicate' => 'false'
			),
			'View' => 'front/User/CheckRegisForm'
		);
		$this->LoadUserPage($value);
	}
	public function CheckRegis(){

		$IDCard = $this->input->post();
		// $this->debuger->prevalue($IDCard);
		$duplicate = $this->HomePageModel->CheckRegis( $IDCard );
		$duplicate = json_decode(json_encode($duplicate), true);
		// $this->debuger->prevalue($duplicate);
		if ($IDCard['member_id_card_type']==1) {
			$IDCard['member_id_card_type_name'] = 'บัตรประชาชน';
		} elseif ($IDCard['member_id_card_type']==2) {
			$IDCard['member_id_card_type_name'] = 'Passport';
		} elseif ($IDCard['member_id_card_type']==3) {
			$IDCard['member_id_card_type_name'] = 'Work Permit';
		}

		if (count($duplicate)>0 || $IDCard=="") {
			$value = array(
				'Result' => array(
					'Registered'=> 'false',
					'Duplicate' => 'true'
				),
				'View' => 'front/User/CheckRegisForm'
			);
			$this->LoadUserPage($value);
		} elseif (count($duplicate)==0 && $IDCard!="") {

			$value = array(
				'Result' => array(
					'Registered'=> 'false',
					'IDCard' => $IDCard
				),
				'View' => 'front/User/RegisterForm'
			);
			$this->LoadUserPage($value);
		}
	}
	public function RegisterPage() {
		$value = array(
			'Result' => array(
				'Registered'=> 'false',
				'RegisStatus' =>1
			),
			'View' => 'front/User/RegisterForm'
		);
		$this->LoadUserPage($value);
	}
	public function SubmitEditProfile()
	{
		$RegisterForm = $this->input->post();
		// $this->debuger->prevalue($RegisterForm);
		if (!empty($RegisterForm['member_id'])) {

			$UpdateUser['member_id'] = $RegisterForm['member_id'];
			$UpdateUser['user_pass'] = base64_encode($RegisterForm['user_pass']);

			if($RegisterForm['user_pass']!='' && $RegisterForm['user_pass_confirm']!=''){
				$this->HomePageModel->UpdateUser( $UpdateUser );
			}

			unset($RegisterForm['user_pass'],$RegisterForm['user_pass_confirm']);

			$Member = $this->HomePageModel->UpdateMember( $RegisterForm );
			$member_id = $RegisterForm['member_id'];

		} else {
			$Member = $this->HomePageModel->AddMember( $RegisterForm );
			$Member = json_decode(json_encode($Member), true);
			$value = array(
				'user_name' => $Member[0]['member_citizen_id'],
				'user_pass' => base64_encode($Member[0]['member_phone']),
				'member_id' => $Member[0]['member_id'],
			);
			$User = $this->HomePageModel->AddUser( $value );
			$member_id = $Member[0]['member_id'];
		}

		if ($_FILES["member_photo"]["name"]!='' && $Member[0]['member_photo']!=='no_profile.png') {
			$ext = pathinfo($_FILES["member_photo"]["name"],PATHINFO_EXTENSION);
			$new_file = 'photo_'.$member_id.'.'.$ext;
			copy($_FILES["member_photo"]["tmp_name"],"assets/image/profile/".$new_file);
			$addPhoto['member_id'] = $member_id;
			$addPhoto['member_photo'] = $new_file;
			$this->HomePageModel->addPhoto( $addPhoto );
		}else{
			$addPhoto['member_id'] = $member_id;
			$addPhoto['member_photo'] = 'no_profile.png';
			$this->HomePageModel->addPhoto( $addPhoto );
		}

		redirect('HomePage/Profile');

	}
	public function SubmitEditPassword()
	{
		$PasswordForm = $this->input->post();
		$UpdateUser['member_id'] = $PasswordForm['member_id'];
		$UpdateUser['user_pass'] = base64_encode($PasswordForm['new_pass']);
		$this->HomePageModel->UpdateUser( $UpdateUser );
		$this->Logout();
	}
	public function SubmitProfile(){
		$RegisterForm = $this->input->post();
		// $this->debuger->prevalue($RegisterForm);
		$AddUser['user_pass'] = base64_encode($RegisterForm['user_pass']);
		unset($RegisterForm['user_pass']);

		$Member = $this->HomePageModel->AddMember( $RegisterForm );
		$Member = json_decode(json_encode($Member), true);
		$value = array(
			'user_name' => $Member[0]['member_citizen_id'],
			'user_pass' => $AddUser['user_pass'],
			'member_id' => $Member[0]['member_id'],
		);
		$User = $this->HomePageModel->AddUser( $value );

		$_SESSION['MEMBER_ID'] = $Member[0]['member_id'];
		$IDCard = array(
			'member_id_card_type' => $Member[0]['member_id_card_type'],
			'member_citizen_id' => $Member[0]['member_citizen_id'],

		);
		if ($IDCard['member_id_card_type']==1) {
			$IDCard['member_id_card_type_name'] = 'บัตรประชาชน';
		} elseif ($IDCard['member_id_card_type']==2) {
			$IDCard['member_id_card_type_name'] = 'Passport';
		} elseif ($IDCard['member_id_card_type']==3) {
			$IDCard['member_id_card_type_name'] = 'Work Permit';
		}
		$value = array(
			'Result' => array(
				'RegisterForm' => $RegisterForm,
				'Member' => $Member,
				'Registered'=> 'true',
				'IDCard' => $IDCard,
			),
			'View' => 'front/User/RegisterForm'
		);
		$member_id = $Member[0]['member_id'];
		$this->LoadUserPage($value);

		if ($_FILES["member_photo"]["name"]!='') {
			$ext = pathinfo($_FILES["member_photo"]["name"],PATHINFO_EXTENSION);
			$new_file = 'photo_'.$member_id.'.'.$ext;
			move_uploaded_file($_FILES["member_photo"]["tmp_name"],"assets/image/profile/".$new_file);
			$addPhoto['member_id'] = $member_id;
			$addPhoto['member_photo'] = $new_file;
			$this->HomePageModel->addPhoto( $addPhoto );
		}else{
			$addPhoto['member_id'] = $member_id;
			$addPhoto['member_photo'] = 'no_profile.png';
			$this->HomePageModel->addPhoto( $addPhoto );
		}
	}
	public function Profile() {
		$Profile = array();
		// $ProfileDateOfBirth = array();
		$AccountList = array();
		if (isset($_SESSION['MEMBER_ID'])) {
			$Profile = json_decode(json_encode($this->HomePageModel->LoadProfile( $_SESSION['MEMBER_ID'] )), true);
			// $ProfileDateOfBirth = json_decode(json_encode($this->HomePageModel->LoadProfileDateOfBirth( $_SESSION['MEMBER_ID'] )), true);
			$today = getdate();
			$d1 = new DateTime($today["year"].'-'.$today["mon"].'-'.$today["mday"]);
			$d2 = new DateTime($Profile[0]['member_born']);
			$diff = $d2->diff($d1);
			$Profile[0]['member_age'] = $diff->y;

			$AccountList = json_decode(json_encode($this->AccountModel->AccountByMember( $_SESSION['MEMBER_ID'])), true);
			//$Profile[0]['member_born'] = $ProfileDateOfBirth[0]['member_born'];
			if ($Profile[0]['member_id_card_type']==1) {
				$Profile[0]['member_id_card_type_name'] = 'บัตรประชาชน';
			} elseif ($Profile[0]['member_id_card_type']==2) {
				$Profile[0]['member_id_card_type_name'] = 'Passport';
			} elseif ($Profile[0]['member_id_card_type']==3) {
				$Profile[0]['member_id_card_type_name'] = 'Work Permit';
			}
		}
		// $this->debuger->prevalue($Profile);

		$pv = $this->HomePageModel->MemberPV($_SESSION['MEMBER_ID']);

		$value = array(
			'Result' => array(
				'Profile' => $Profile,
				'AccountList' => $AccountList,
				'PV' => $pv,
			),
			'View' => 'front/User/Profile'
		);
		// $this->debuger->prevalue($value);

		$this->LoadUserPage($value);
	}
	public function AccountList() {
		$Profile = array();
		$AccountList = array();
		if (isset($_SESSION['MEMBER_ID'])) {
			$Profile = json_decode(json_encode($this->HomePageModel->LoadProfile( $_SESSION['MEMBER_ID'] )), true);
			$AccountList = json_decode(json_encode($this->AccountModel->AccountByMember( $_SESSION['MEMBER_ID'])), true);
		}
		$value = array(
			'Result' => array(
				'Profile' => $Profile,
				'AccountList' => $AccountList,
			),
			'View' => 'front/User/AccountListPage'
		);
		$this->LoadUserPage($value);
	}
	public function IncomeList() {
		$Profile = array();
		$IncomeAccounting = array();
		if (isset($_SESSION['MEMBER_ID'])) {
			$Profile = json_decode(json_encode($this->HomePageModel->LoadProfile( $_SESSION['MEMBER_ID'] )), true);
			$IncomeAccounting = json_decode(json_encode($this->AccountingModel->IncomeAccounting( $_SESSION['MEMBER_ID'])), true);
			//$this->debuger->prevalue($IncomeAccounting);
		}
		$value = array(
			'Result' => array(
				'Profile' => $Profile,
				'IncomeAccounting' => $IncomeAccounting,
			),
			'View' => 'front/User/IncomeListPage'
		);
		$this->LoadUserPage($value);
	}
	public function IncomeListByID() {
		$Profile = array();
		$AccountList = array();
		if (isset($_SESSION['MEMBER_ID'])) {
			$Profile = json_decode(json_encode($this->HomePageModel->LoadProfile( $_SESSION['MEMBER_ID'] )), true);
		}
		$id = $this->uri->segment(3);
		$Account = json_decode(json_encode($this->AccountModel->AccountByID( $id )), true);
		$Profile2 = json_decode(json_encode($this->HomePageModel->LoadProfile( $Account[0]['member_id'] )), true);
		$AllDownline = json_decode(json_encode($this->AccountModel->AllDownlineByAccount( $id )), true);
		$ThreeDownline = json_decode(json_encode($this->AccountModel->ThreeDownline( $id )), true);
		$Upline = json_decode(json_encode($this->AccountModel->AccountByID( $Account[0]['account_upline_id'])), true);
		$Adviser = json_decode(json_encode($this->AccountModel->AccountByID( $Account[0]['account_adviser_id'])), true);
		$AdviserList = json_decode(json_encode($this->AccountModel->AdviserList( $Account[0]['account_id'])), true);
		$Account2 = json_decode(json_encode($this->MemberModel->MemberList()), true);
		$MyPv = json_decode(json_encode($this->HomePageModel->MemberPV( $Account[0]['member_id'])), true);
		$CheckFreePV = $this->HomePageModel->CheckFreePV($Account[0]['account_id']);


		//$this->debuger->prevalue($MyPv);

		$PlanOneDownline = $this->AccountModel->PlanOneDownline($id, $Account[0]['account_level']);
		$PlanOneDirectAdviser = $this->AccountModel->PlanOneDirectAdviser($id, $Account[0]['account_level']);
		// $this->debuger->prevalue($PlanOneDownline);

		$JounalExtendAccount = $this->AccountModel->JounalExtendAccount( $Account[0]['account_id']);
		// $this->debuger->prevalue($JounalExtendAccount);


		// $HistoryAccount = json_decode(json_encode($this->AccountModel->JounalExtendAccount( $Account[0]['account_id'])), true);

		if ($Account[0]['bookbank_id']!=0) {
			$BookbankDetail = json_decode(json_encode($this->AccountModel->BookbankDetail( $Account[0]['bookbank_id'])), true);
			// $this->debuger->prevalue($BookbankDetail);
		} else {
			$BookbankDetail = 'false';
		}
		// $BookbankList = $this->AccountModel->BookbankList( $Account[0]['member_id'] );
		// $this->debuger->prevalue($this->AccountModel->BookbankList( $Account[0]['member_id']));
		$next_account_class_id = $Account[0]['account_class_id']+1;
		$NextClass = array();
		if ($next_account_class_id!=8) {
			$NextClass = $this->AccountModel->NextClass($next_account_class_id);
		}

		$BankList = $this->db->get('mlm_bank')->result_array();


		$DividendID = $this->AccountingModel->DividendByID($id);
		// $this->debuger->prevalue($DividendID);

		$DivID = array();
		$i=0;
		foreach ($DividendID as $row) {
			if ($row['member']['member_id']==$_SESSION['MEMBER_ID']) {
				$DivID[$i]=$row;
				$i++;
			}
		}
		// $this->debuger->prevalue($DivID);

		$value = array(
			'Result' => array(
				'Profile' => $Profile,
				'Profile2' => $Profile2,
				'Account' => $Account,
				'AllDownline' => $AllDownline,
				'ThreeDownline' => $ThreeDownline,
				'Upline' => $Upline,
				'Adviser' => $Adviser,
				'AdviserList' => $AdviserList,
				'JounalExtendAccount' => $JounalExtendAccount,
				'BookbankDetail' => $BookbankDetail,
				'NextClass' => $NextClass,
				'BankList' => $BankList,
				'member' => $Account2,
				'PlanOneDownline' => $PlanOneDownline,
				'PlanOneDirectAdviser' => $PlanOneDirectAdviser,
				'MyPv' => $MyPv,
				'CheckFreePV' => $CheckFreePV,
				'DividendID' => $DivID,
			),
			'View' => 'front/User/IncomeListPageID'
		);
		// $this->debuger->prevalue($value);
		$this->LoadUserPage($value);
	}
	public function EditProfile() {
		$Profile = json_decode(json_encode($this->HomePageModel->LoadProfile( $_SESSION['MEMBER_ID'] )), true);
		if ($Profile[0]['member_id_card_type']==1) {
			$Profile[0]['member_id_card_type_name'] = 'บัตรประชาชน';
		} elseif ($Profile[0]['member_id_card_type']==2) {
			$Profile[0]['member_id_card_type_name'] = 'Passport';
		} elseif ($Profile[0]['member_id_card_type']==3) {
			$Profile[0]['member_id_card_type_name'] = 'Work Permit';
		}
		$value = array(
			'Result' => array(
				'Profile' => $Profile,

			),
			'View' => 'front/User/EditProfile'
		);
		$this->LoadUserPage($value);
	}
	public function EditPassword() {
		$UserPass = $this->HomePageModel->LoadUser( $_SESSION['MEMBER_ID'] );
		$Profile = json_decode(json_encode($this->HomePageModel->LoadProfile( $_SESSION['MEMBER_ID'] )), true);
		if ($Profile[0]['member_id_card_type']==1) {
			$Profile[0]['member_id_card_type_name'] = 'บัตรประชาชน';
		} elseif ($Profile[0]['member_id_card_type']==2) {
			$Profile[0]['member_id_card_type_name'] = 'Passport';
		} elseif ($Profile[0]['member_id_card_type']==3) {
			$Profile[0]['member_id_card_type_name'] = 'Work Permit';
		}
		$value = array(
			'Result' => array(
				'Profile' => $Profile,
				'User' => $UserPass,
			),
			'View' => 'front/User/EditPassword'
		);
		$this->LoadUserPage($value);
	}
	public function Logout() {
		session_destroy();
		redirect('/HomePage');
	}
	public function TemplatePrintRegister() {
		$this->load->view('front/User/TemplatePrintRegister');
	}
	public function TemplateRegistered() {
		$this->load->view('front/User/TemplateRegistered');
	}
	public function SubmitLogin()
	{
		$data = $this->input->post();
		$User = $this->HomePageModel->AuthenUser( $data );
		if (empty($User))
		{
			redirect($this->agent->referrer(), 'refresh');
			// $this->response(array('status' => false, 'error_message' => 'ไม่พบข้อมูลในระบบ'));
		} else {
			$UserArr = json_decode(json_encode($User), true);
			$_SESSION['MEMBER_ID'] = $UserArr[0]['member_id'];
			// $this->response(array('status' => true, 'User' => $User));
			redirect('HomePage/Profile');

		}
	}

	public function SendMailTo()
	{
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://mail.ndwn.co.th';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'info@ndwn.co.th';
		$config['smtp_pass']    = '6836zSdm4';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'text'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not

		$this->email->initialize($config);

		$input = $this->input->post();
		$this->email->from($input['mailFrom'], $input['mailName']);
		$this->email->to('info@ndwn.co.th');

		$this->email->subject($input['mailSubject']);
		$this->email->message($input['mailContent']);

		$this->email->send();

		// echo $this->email->print_debugger();
		redirect('/index');
	}
}
