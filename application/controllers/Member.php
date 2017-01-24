<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION))
    {
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
    $MemberList = $this->MemberModel->MemberListWhithPV();
    $MemberList = json_decode(json_encode($MemberList), true);

    $value = array(
      'Result' => array(
        'MemberList' => $MemberList
      ),
      'View' => 'back/Member/MemberList'
    );
    $this->LoadPage($value);
  }
  public function MemberProfile() {
    $id = $this->uri->segment(3);
    $Profile = json_decode(json_encode($this->HomePageModel->LoadProfile( $id )), true);
    $today = getdate();
     $d1 = new DateTime($today["year"].'-'.$today["mon"].'-'.$today["mday"]);
     $d2 = new DateTime($Profile[0]['member_born']);
     $diff = $d2->diff($d1);
     $Profile[0]['member_age'] = $diff->y;

    $AccountList = json_decode(json_encode($this->AccountModel->AccountByMember( $id)), true);
    if ($Profile[0]['member_id_card_type']==1) {
      $Profile[0]['member_id_card_type_name'] = 'บัตรประชาชน';
    } elseif ($Profile[0]['member_id_card_type']==2) {
      $Profile[0]['member_id_card_type_name'] = 'Passport';
    } elseif ($Profile[0]['member_id_card_type']==3) {
      $Profile[0]['member_id_card_type_name'] = 'Work Permit';
    }
    // $this->debuger->prevalue($Profile);
    $pv = $this->HomePageModel->allpv($id);
    // $AccountList = json_decode(json_encode($this->AccountModel->AccountByMember($id)), true);
    $value = array(
      'Result' => array(
        'Profile' => $Profile,
        'AccountList' => $AccountList,
        'PV' => $pv,
      ),
      'View' => 'back/Member/MemberProfile'
    );
    $this->LoadPage($value);
  }
  public function AccountDetail() {
    $id = $this->uri->segment(3);
    $Account = json_decode(json_encode($this->AccountModel->AccountByID( $id )), true);
    $Profile = json_decode(json_encode($this->HomePageModel->LoadProfile( $Account[0]['member_id'] )), true);
    $AllDownline = json_decode(json_encode($this->AccountModel->AllDownlineByAccount( $id )), true);
    $ThreeDownline = json_decode(json_encode($this->AccountModel->ThreeDownline( $id )), true);
    $Upline = json_decode(json_encode($this->AccountModel->AccountByID( $Account[0]['account_upline_id'])), true);
    $Adviser = json_decode(json_encode($this->AccountModel->AccountByID( $Account[0]['account_adviser_id'])), true);
    $AdviserList = json_decode(json_encode($this->AccountModel->AdviserList( $Account[0]['account_id'])), true);
    $Account2 = json_decode(json_encode($this->MemberModel->MemberList()), true);

    // $this->debuger->prevalue($Account[0]['account_id']);

    $JounalExtendAccount = json_decode(json_encode($this->AccountModel->JounalExtendAccount( $Account[0]['account_id'])), true);
    $this->debuger->prevalue($JounalExtendAccount);


    $HistoryAccount = json_decode(json_encode($this->AccountModel->JounalExtendAccount( $Account[0]['account_id'])), true);

    if ($Account[0]['bookbank_id']!=0) {
      $BookbankDetail = json_decode(json_encode($this->AccountModel->BookbankDetail( $Account[0]['bookbank_id'])), true);
      // $this->debuger->prevalue($BookbankDetail);
    } else {
      $BookbankDetail = 'false';
    }
    $BookbankList = json_decode(json_encode($this->AccountModel->BookbankList( $Account[0]['member_id'])), true);

    $BankList = $this->db->get('mlm_bank')->result_array();

    $value = array(
      'Result' => array(
        'Profile' => $Profile,
        'Account' => $Account,
        'AllDownline' => $AllDownline,
        'ThreeDownline' => $ThreeDownline,
        'Upline' => $Upline,
        'Adviser' => $Adviser,
        'AdviserList' => $AdviserList,

        'JounalExtendAccount' => $JounalExtendAccount,
        'BookbankDetail' => $BookbankDetail,
        'BookbankList' => $BookbankList,

        'BankList' => $BankList,

        'member' => $Account2,

      ),
      'View' => 'back/Account/AccountDetail'
    );
    $this->LoadPage($value);
  }

  public function AccountDetailExtend() {
    $id = $this->uri->segment(3);

    $JounalExtendAccount = $this->AccountModel->JounalExtendAccount($id);

    $HistoryAccount = $this->AccountModel->JounalExtendAccount($id);


  }
  public function FindAccountByAdviser() {
    $id = $this->uri->segment(3);
    $Member = json_decode(json_encode($this->HomePageModel->LoadProfile($id)), true);
    $value = array(
      'Result' => array(
        'Member' => $Member
      ),
      'View' => 'back/Account/FindAccountByAdviser'
    );
    $this->LoadPage($value);
  }
  public function FindAccountByCode() {
    $member_id = $this->uri->segment(3);
    $account_team = $_POST['account_team'];
    $account_level = substr($_POST['account_code'],0, 4);
    $account_code = substr($_POST['account_code'],5, 5);
    // $this->debuger->prevalue($account_code);
    $input = array(
      'account_team' => $account_team,
      'account_level' => $account_level*1,
      'account_code' => $account_code,
    );
    $Adviser = json_decode(json_encode($this->AccountModel->FindAccountByCode($input)), true);

    if (count($Adviser)>0) {
      $adviser_id = $Adviser[0]['account_id'];
      redirect('/Member/SelectUpline/'.$member_id.'/'.$adviser_id.'/'.$adviser_id);
    } else {
      redirect('/Member/FindAccountByAdviser/'.$member_id);

      // $value = array(
      //   'Result' => array(
      //     'UserFullCode' => $_POST['account_code'],
      //     'Result' => 'null',
      //   ),
      //   'View' => 'back/Account/FindAccountByAdviser'
      // );
    }
    $this->LoadPage($value);
  }
  public function SelectUpline() {
    $member_id = $this->uri->segment(3);
    $adviser_id = $this->uri->segment(4);
    $upline_id = $this->uri->segment(5);

    $Member = json_decode(json_encode($this->HomePageModel->LoadProfile($member_id)), true);
    $AccountUpline = json_decode(json_encode($this->AccountModel->AccountByID($upline_id)), true);
    $AccountAdviser = json_decode(json_encode($this->AccountModel->AccountByID($adviser_id)), true);
    $DownlineList = json_decode(json_encode($this->AccountModel->AccountListByUpline($upline_id)), true);
    // $this->debuger->prevalue($AccountUpline);

    $value = array(
      'Result' => array(
        'Member' => $Member,
        'AccountUpline' => $AccountUpline,
        'AccountAdviser' => $AccountAdviser,
        'DownlineList' => $DownlineList
      ),
      'View' => 'back/Account/SelectUpline'
    );
    $this->LoadPage($value);
  }
  public function SaveAccount(){
    date_default_timezone_set("Asia/Bangkok");
    $member_id = $this->uri->segment(3);
    $adviser_id = $this->uri->segment(4);
    $upline_id = $this->uri->segment(5);

    $Member = json_decode(json_encode($this->HomePageModel->LoadProfile($member_id)), true);
    $AccountUpline = json_decode(json_encode($this->AccountModel->AccountNonJoinByID($upline_id)), true);
    $AccountAdviser = json_decode(json_encode($this->AccountModel->AccountNonJoinByID($adviser_id)), true);
    $AccountListByTeam = json_decode(json_encode($this->AccountModel->AccountListByTeam($AccountUpline[0]['account_team'])), true);

    //Insert New Account + Relation Downline
    $time =  Date('Y-m-d');
    $expired = strtotime($time);
    $expired = strtotime("+365 day", $expired);
    $expired =  Date('Y-m-d', $expired);
    $AccountInput = array(
      'account_team' => $AccountUpline[0]['account_team'],
      'account_level' => $AccountUpline[0]['account_level']+=1,
      'account_code' => $AccountListByTeam[0]['account_code']+=1,
      'account_upline_id' => $upline_id,
      'account_adviser_id' => $adviser_id,
      'member_id' => $member_id,
    );

    $NewAccountID = $this->AccountModel->SaveAccount($AccountInput, $adviser_id);
    // echo $NewAccountID;
    //Insert New Account History
    $ExtendInput = array(
      'account_id' => $NewAccountID,
      'member_id' => $member_id,
      'journal_extend_start_date' => $time,
      'journal_extend_expired_date' => $expired,
      'journal_extend_amount' => 0
    );
    $ExtendNewID = $this->AccountModel->SaveJournalExtend($ExtendInput);

    $AccountingInput = array(
      'accounting_date' => $time,
      'accounting_source_id' => $ExtendNewID,
      'accounting_tax' => 0,
      'accounting_status' => 1,
      'journals_id' => 2,
    );
    $this->AccountModel->SaveAccountingExtend($AccountingInput);
    //Check Bussiness Code
    $arr = 0;
    // $id = $NewAccountID;
    $goal = 3;
    $lvlDown = 1;
    $lvlUp = 1;
    $GoalPerLevel = array();
    for ($i=3; $i <=243; $i *= 3) {
      if ( $upline_id!=0 && $upline_id!='' ) {
        $GoalPerLevel[$arr] = $this->CountCodePerLevel($upline_id, $lvlDown, $goal, $lvlUp);
        $upline_id = $GoalPerLevel[$arr]['NextAccID'];
        $goal *= 3;
        $lvlDown++;
        $lvlUp+=1;
        $arr++;
      }
    }
    // $this->debuger->prevalue($GoalPerLevel);

    redirect('/Member/MemberProfile/'.$member_id);
  }

  public function CountCodePerLevel($upline_id, $lvlDown, $goal, $lvlUp)
  {
    $GoalCheck = array();
    // $Downline["Level".$lvlUp] = $lvlUp; // ชั้นที่ต้องนับขึ้น
    $GoalCheck["Goal"] = $goal;//จำนวนเช็คครบ 3, 9, 27, 81, 243 // N*3
    $GoalCheck["GoalStatus"] = 'false';
    $GoalCheck["Count"] = 0;
    $GoalCheck["Level".$lvlUp] = array(); //ชั้นที่จะต้องนับลง
    $GoalCheck["MemberID"] = "";
    $GoalCheck["ThisAccID"] = "";
    $GoalCheck["NextAccID"] = "";


    $ThisAccount = json_decode(json_encode($this->AccountModel->AccountNonJoinByID($upline_id)), true);
    if (count($ThisAccount)>0) {
      $AllDownline = json_decode(json_encode($this->AccountModel->AllDownlineByAccount($ThisAccount[0]['account_id'])), true);
      // print_r($AllDownline);
      // $DownlineLit = json_decode(json_encode($this->AccountModel->AccountListByUpline($Upline[0]['account_upline_id'])), true);
      $GoalCheck["MemberID"] = $ThisAccount[0]['member_id'];
      $GoalCheck["ThisAccID"] = $ThisAccount[0]['account_id'];
      $GoalCheck["NextAccID"] = $ThisAccount[0]['account_upline_id'];

      foreach ($AllDownline as $row) {
        $AccountDetail = json_decode(json_encode($this->AccountModel->AccountNonJoinByID($row['downline_count_downline_id'])), true);
        // $this->debuger->prevalue($AccountDetail);

        // print_r($Result);
        $CurrectLvl = $AccountDetail[0]['account_level'];
        $ThisLvl = $ThisAccount[0]['account_level']+$lvlDown;

        // echo "ชั้นที่ ".$lvlUp." เป้าหมาย ".$goal." lvl ของคนนี้ ".$ThisAccount[0]['account_level']." + ".$lvlDown." lvl ที่ต้องการ ".$ThisLvl.' เทียบกับ '.$CurrectLvl;
        // echo "<br>";
        if ($CurrectLvl==$ThisLvl) {
          // print_r($row);

          $GoalCheck["Count"] ++;
          array_push($GoalCheck["Level".$lvlUp], $AccountDetail[0]);
        }
      }
      if ($GoalCheck["Count"]==$goal) {
        $GoalCheck["GoalStatus"] = 'true';
        $Plan = 1;
        $income_percent = $this->db
        ->where('income_percent_level', $lvlUp)
        ->where('income_percent_plan', $Plan)
        ->get('mlm_income_percent_setting')
        ->result_array();
        $income_adviser = $this->db
        ->get('mlm_fee_setting')
        ->result_array();

        $accounting_amount = $income_percent[0]['income_percent_point']*$income_percent[0]['income_percent_amount']/100;
        $income_adviser_total = 0;
        // $this->debuger->prevalue($GoalCheck["Level".$lvlUp]);

        if ($lvlUp==1) {
          $text_note = '';
          foreach ($GoalCheck["Level".$lvlUp] as $row) {
            if ($row['account_upline_id']!=$row['account_adviser_id']) {
              // หักเงิน
              $accounting_amount -= $income_adviser[0]['setting_adviser_income'];
              $income_adviser_total += $income_adviser[0]['setting_adviser_income'];
              $text_note = 'หักผู้แนะนำ '.$income_adviser_total;

              // ลงบัญชี
              $Account = json_decode(json_encode($this->AccountModel->AccountNonJoinByID($row['account_adviser_id'])), true);
              $input = array(
                'accounting_date' => Date('Y-m-d'),
                'accounting_source_id' => $Account[0]['account_id'],
                'accounting_amount' => $income_adviser[0]['setting_adviser_income'],
                'journals_id' => 3,
                'member_id' => $Account[0]['member_id'],
              );
              $this->db->insert('mlm_accounting', $input);
            }
          }
          // ลงบัญชีเงินได้ ของ Upline
          $input = array(
            'accounting_date' => Date('Y-m-d'),
            'accounting_source_id' => $ThisAccount[0]['account_id'],
            'accounting_amount' => $accounting_amount,
            'journals_id' => 4,
            'member_id' => $ThisAccount[0]['member_id'],
            'accounting_system_note' => 'ค่าการตลาด ครบ '.$goal." รหัส ".$text_note,
          );
          $this->db->insert('mlm_accounting', $input);
        }else {
          $input = array(
            'accounting_date' => Date('Y-m-d'),
            'accounting_source_id' => $ThisAccount[0]['account_id'],
            'accounting_amount' => $accounting_amount,
            'journals_id' => 4,
            'member_id' => $ThisAccount[0]['member_id'],
            'accounting_system_note' => 'ค่าการตลาด ครบ '.$goal." รหัส ",
          );
          $this->db->insert('mlm_accounting', $input);
        }

      }
    }
    return $GoalCheck;
  }

  public function AddBookbank()
  {
    $member_id = $this->uri->segment(3);
    $input = array(
      'bank_id' => $_POST['bank_id'],
      'bookbank_account' => $_POST['bookbank_account'],
      'bookbank_number' => $_POST['bookbank_number'],
      'bookbank_bank_branch' => $_POST['bookbank_bank_branch'],
      'member_id' =>$member_id,
    );
    $this->db->insert('mlm_bookbank', $input);
    redirect($this->agent->referrer(), 'refresh');

  }
  public function SaveBookbankToAccount()
  {
    $account_id = $this->uri->segment(3);
    $bookbank_id = $this->uri->segment(4);
    $input = array(
      'bookbank_id' => $bookbank_id,
      'account_id' =>$account_id,
    );
    $this->db->where('account_id', $account_id)->update('mlm_account', $input);
    redirect($this->agent->referrer(), 'refresh');

  }
  public function DeleteBookBank(){
    $member_id = $this->uri->segment(3);
    $bookbank_id = $this->uri->segment(4);
    $input = array(
      'bookbank_id' => $bookbank_id,
      'member_id' =>$member_id,
    );
    $this->AccountModel->DeleteBookbank( $input );
  }
  public function ApprovedMember()
  {
    $member_id = $this->uri->segment(3);
    $setting = $this->db->order_by('setting_id', 'DESC')->get('mlm_fee_setting')->result_array();

    $maxJounalFreeId = $this->db->AccountModel->JounalFreeAccountAll();

  $input = array(
    'journal_fee_amount' => $setting[0]['setting_register_fee'],
    'journal_fee_type' => 1,
    'member_id' => $member_id,
    'journal_fee_code' => "FE".sprintf("%05d", $maxJounalFreeId),
  );

  $check = $this->MemberModel->checkaccounting($member_id);

  if (!empty($check)){
    redirect('/Accounting/');
  }

  $this->db->insert('mlm_journal_fee', $input);
  redirect('/Accounting/');
  }

  public function NewMember()
  {
    $value = array(
      'Result' => array(
        'loadJQ' => 'true'
      ),
      'View' => 'back/Member/MemberForm'
    );
    $this->LoadPage($value);
  }
  public function EditMember()
  {
    $member_id = $this->uri->segment(3);
    $Profile = json_decode(json_encode($this->HomePageModel->LoadProfile( $member_id )), true);

    $value = array(
      'Result' => array(
        'Profile' => $Profile,
        'loadJQ' => 'true'

      ),
      'View' => 'back/Member/MemberFormEdit'
    );
    $this->LoadPage($value);
  }
  public function SubmitProfile()
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

    redirect('/Member/MemberProfile/'.$member_id);

	}
  public function ResultMember() {
    $Profile = array();
    $AccountList = array();
    if (isset($_SESSION['MEMBER_ID'])) {
      $Profile = json_decode(json_encode($this->HomePageModel->LoadProfile( $this->uri->segment(3) )), true);
      $AccountList = json_decode(json_encode($this->AccountModel->AccountByMember( $this->uri->segment(3))), true);
      if ($Profile[0]['member_id_card_type']==1) {
        $Profile[0]['member_id_card_type_name'] = 'บัตรประชาชน';
      } elseif ($Profile[0]['member_id_card_type']==2) {
        $Profile[0]['member_id_card_type_name'] = 'Passport';
      } elseif ($Profile[0]['member_id_card_type']==3) {
        $Profile[0]['member_id_card_type_name'] = 'Work Permit';
      }
    }
    $value = array(
      'Result' => array(
        'Profile' => $Profile,
        'AccountList' => $AccountList,
      ),
      'View' => 'back/Member/MemberResult'
    );
    $this->LoadResultUser($value);
  }

  public function LoadResultUser($value){

    $data = $value['Result'];
    $this->load->view('back/document/doc_header', $data);
    $this->load->view($value['View']);
    $this->load->view('back/document/doc_footer');
  }
}
