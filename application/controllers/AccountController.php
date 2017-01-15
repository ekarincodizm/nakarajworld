<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccountController extends CI_Controller {
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION)){
      session_start();
    }
  }
  public function LoadPage($value){

    $data['Result'] = $value['Result'];
    $this->load->view('back/template/head', $data);
    $this->load->view($value['View']);
    $this->load->view('back/template/footer');
  }
  public function LoadDoc($value){

    $data['Result'] = $value['Result'];
    $this->load->view('back/document/doc_header', $data);
    $this->load->view($value['View']);
    $this->load->view('back/document/doc_footer');
  }
  public function index() {

    $value = array(
      'Result' => array(
        'Result' => "",
      ),
      'View' => 'back/blank'
    );
    $this->LoadPage($value);
  }
  public function AccountDetailPage()
  {
    $account_id = $this->uri->segment(3);

    $account = $this->member_models->SearchAccountByID($account_id);
    $account_his = $this->member_models->SearchAccountHistoryByAccountID($account[0]['account_id']);
    $countDL = $this->db->where('downline_count_upline_id',$account_id)->get('mlm_downline_count')->num_rows();
    // $this->debuger->prevalue($account_his);

    $value = array(
      'Result' => array(
        'MemberProfile' => $account,
        'AccountHistory' => $account_his,
        'TotalDownline' => $countDL
      ),
      'View' => 'back/member/account_detail'
    );

    $this->LoadPage($value);
  }
  public function PrintAccountInvoice()
  {
    $account_history_id = $this->uri->segment(3);
    $account_his = $this->db
    ->where('account_history_id' ,$account_history_id)
    ->join('mlm_account', 'mlm_account_history.account_id = mlm_account.account_id')
    ->get('mlm_account_history')->result_array();
    $value = array(
      'Result' => array(
        'MemberProfile' => $account_his,
        'AccountHistory' => $account_his,
      ),
      'View' => 'back/document/doc_account_invoice'
    );

    $this->LoadDoc($value);
  }
  public function SearchAccountByUplineCodePage() {
    $member_id = $this->uri->segment(3);
    $Member = $this->member_models->SearchMemberByID($member_id);

    $value = array(
      'Result' => array(
        'Member' => $Member,
      ),
      'View' => 'back/account/SearchAccountByUplineCodePage'
    );
    $this->LoadPage($value);
  }
  public function ResultAccountByUplineCodePage() {
    $member_id = $this->uri->segment(3);

    $account_team = substr($_POST['account_code'],0, 1);
    $account_level = substr($_POST['account_code'],1, 4);
    $account_code = substr($_POST['account_code'],5, 5);

    $input = array(
      'account_team' => $account_team,
      'account_level' => $account_level*1,
      'account_code' => $account_code,
    );
    $Adviser = $this->member_models->SearchAccountByMemberCode($input);
    // $this->debuger->prevalue($Result);
	
    if (count($Adviser)>0) {
	  $account_upline_id = $Adviser[0]['account_id'];
      $_SESSION['ADVISER_ACC_ID'] = $Adviser[0]['account_id'];
      redirect('/AccountController/ResultAccountByUplineID/'.$account_upline_id.'/'.$member_id);
    } else {
 
      $value = array(
        'Result' => array(
          'UserFullCode' => $_POST['account_code'],
          'Result' => 'null',
    
        ),
        'View' => 'back/account/SearchAccountByUplineCodePage'
      );
    }
    $this->LoadPage($value);
  }
  public function ResultAccountByUplineID() {
    $account_upline_id = $this->uri->segment(3);
    $Adviser = $this->member_models->SearchAccountByID($_SESSION['ADVISER_ACC_ID']);
    $Member = $this->member_models->SearchMemberByID($this->uri->segment(4));

    $Upline  = $this->member_models->SearchAccountByID($account_upline_id);
    $Downline  = $this->member_models->SearchDownlineByUplineID($account_upline_id);

    $value = array(
      'Result' => array(
        'Upline' => $Upline,
        'Downline' => $Downline,
        'Member' => $Member,
        'Adviser' => $Adviser,
      ),
      'View' => 'back/account/ChooseUplinePage'
    );

    $this->LoadPage($value);
  }
  public function ConfirmAccountPage(){
    $UplineID = $this->uri->segment(3);
    $MemberID = $this->uri->segment(4);
    $Adviser = $this->member_models->SearchAccountByID($_SESSION['ADVISER_ACC_ID']);
    $Member = $this->member_models->SearchMemberByID($MemberID);

    $UplineAccount  = $this->member_models->SearchAccountByID($UplineID);

    $value = array(
      'Result' => array(
        'Upline' => $UplineAccount,
        'Member' => $Member,
        'Adviser' => $Adviser,
      ),
      'View' => 'back/account/ConfirmAccountPage'
    );

    $this->LoadPage($value);
  }

  public function ProcessSaveAccount()
  {
    $upline_id = $this->uri->segment(3);
    $MemberID = $this->uri->segment(4);
    $Upline  = $this->member_models->SearchAccountByID($upline_id);
    // $this->debuger->prevalue($Upline);
    $last_user = $this->db
    ->where('account_team', $Upline[0]['account_team'])
    ->order_by('account_code', 'DESC')
    ->get('mlm_account')->result_array();

    date_default_timezone_set("Asia/Bangkok");
    $time =  Date('Y-m-d');
    $expired = strtotime($time);
    $expired = strtotime("+365 day", $expired);
    $expired =  Date('Y-m-d', $expired);

    $input = array(
      'account_team' => $Upline[0]['account_team'],
      'account_level' => $Upline[0]['account_level']+=1,
      'account_code' => $last_user[0]['account_code']+=1,

      'account_upline_id' => $upline_id,

      'member_id' => $MemberID,
      'account_adviser_id' => $_SESSION['ADVISER_ACC_ID'],

    );
    $this->member_models->add_account($input);
    $LastAccount = $this->member_models->SearchAccountByMemberCode($input);
    $LastAccountID = $LastAccount[0]['account_id'];

    $input2 = array(
      'account_id' => $LastAccountID,
      'account_history_register_date' => $time,
      'account_history_expired_date' => $expired,
    );
    $this->db->insert('mlm_account_history', $input2);

    $downline_id = $LastAccountID;
    $upline_id = $LastAccount[0]['account_upline_id'];
    $adviser_id = $LastAccount[0]['account_adviser_id'];

    do {
      $input = array(
        'downline_count_upline_id' => $upline_id,
        'downline_count_downline_id' => $downline_id,
      );
      $this->db->insert('mlm_downline_count', $input);
      $NewUpline = $this->member_models->SearchAccountByID($upline_id);
      $upline_id = $NewUpline[0]['account_upline_id'];
    } while ($upline_id == $adviser_id);


    $this->CheckPassiveIncome($LastAccount[0]['account_upline_id']);

    redirect('/MemberController/MemberProfilePage/'.$MemberID);
  }
  public function ProcessEnableAccount() {
    $account_history_id = $this->uri->segment(3);
    $input['account_history_status'] = 1;
    $this->db->where('account_history_id', $account_history_id)->update('mlm_account_history',$input);
    $account_history = $this->db->where('account_history_id' ,$account_history_id)->get('mlm_account_history')->result_array();
    $account = $this->db
    ->where('account_id' ,$account_history[0]['account_id'])
    ->get('mlm_account')->result_array();


    redirect($this->agent->referrer(), 'refresh');
  }
  public function bank_add()
  {
    $Account_id = $this->uri->segment(3);
    $AccountDetail = $this->db->where('account_id', $Account_id)->get('mlm_account')->result_array();
    $BankDetail = $this->db->get('mlm_bank')->result_array();

    $value = array(
      'Result' => array(
        'AccountDetail' => $AccountDetail,
        'BankDetail' => $BankDetail,

      ),
      'View' => 'back/account/bank_add'
    );

    $this->LoadPage($value);
  }
  public function bank_save()
  {
    $input = array(
      'bookbank_id' => $_POST['bookbank_id'],
      // 'bank_id' => $_POST['bank_id'],
      'bookbank_bank_branch' => $_POST['bookbank_bank_branch'],
      'bookbank_account' => $_POST['bookbank_account'],
      'bookbank_number' => $_POST['bookbank_number'],


    );


    $this->db->insert('mlm_bookbank', $input);


    redirect('/AccountController/AccountDetailPage');

  }
  public function CheckPassiveIncome($account_upline_id)
  {
    $dl = $this->db->where('account_upline_id', $account_upline_id)->get('mlm_account')->result_array();
    if (count($dl)==3) {
      $setting = $this->db->order_by('setting_id', 'DESC')->get('mlm_setting')->result_array();
      // downline 3 คนแรก
      $count_adviser = 0;
      foreach ($dl as $row) {
        if ($row['account_upline_id']!=$row['account_adviser_id']) {
          $account = $this->member_models->SearchAccountByID($row['account_id']);
          $input = array(
            'accounting_date' => Date('Y-m-d'),
            'accounting_source_id' => $row['account_id'],
            'accounting_amount' => $setting[0]['setting_adviser_income'],
            'journals_id' => 3,
            'member_id' => $account[0]['member_id'],
          );
          $this->db->insert('mlm_accounting', $input);
          $count_adviser++;
        }
      }
      if ($count_adviser!=3) {
        $account_detail = $this->member_models->SearchAccountByID($account_upline_id);
        $input = array(
          'accounting_date' => Date('Y-m-d'),
          'accounting_source_id' => $account_detail[0]['account_id'],
          'accounting_amount' => 500-(200*$count_adviser),
          'journals_id' => 5,
          'member_id' => $account_detail[0]['member_id'],
        );
        $this->db->insert('mlm_accounting', $input);
      }

      $level[2] = 270;
      $level[3] = 675;
      $level[4] = 1620;
      $level[5] = 4860;
      $l =2;


      $account_detail = $this->member_models->SearchAccountByID($account_upline_id);
      $account_detail = $this->member_models->SearchAccountByID($account_detail[0]['account_upline_id']);
      // $account_detail = $this->member_models->SearchAccountByID(35);
      // $this->debuger->prevalue($account_detail);
      $upline_id = $account_detail[0]['account_upline_id'];
      // $this->debuger->prevalue($upline_id);
      echo "<pre>";
      // print_r($upline_id);
      // print_r($account_detail);
      $date = ('Y-m-d');

      do {
        $input1 = array(
          'accounting_date' => $date,
          'accounting_source_id' => $account_detail[0]['account_id'],
          'accounting_amount' => $level[$l],
          'journals_id' => 4,
          'member_id' => $account_detail[0]['member_id'],
        );
        $this->db->insert('mlm_accounting', $input1);
        $account_detail = $this->db->where('account_id', $account_detail[0]['account_upline_id'])->get('mlm_account')->result_array();
        // $upline_id = $account_detail[0]['account_upline_id'];
        // print_r($upline_id);
        // print_r($account_detail);
        // print_r(count($account_detail));
        if ($l!=5) {
          $l++;
        }
      } while (count($account_detail)!=0);


    }
  }
}
