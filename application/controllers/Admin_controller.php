<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_controller extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION))
    {
      session_start();
    }
  }
  public function LoadPage($value){

    $data['Result'] = $value['Result'];
    $this->load->view('back/template/head', $data);
    $this->load->view($value['View']);
    $this->load->view('back/template/footer');
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
  public function profile() {

    $value = array(
      'Result' => array(
        'Result' => "",
      ),
      'View' => 'back/profile'
    );
    $this->LoadPage($value);
  }
  public function downline() {

    $Member = $this->db->get('mlm_member')->result_array();
    $AdminCode = $this->db->where('member_counselor', 'Admin')->get('mlm_member')->result_array();
    $Member = $this->db->where('member_counselor', $AdminCode[0]['member_code'])->get('mlm_member')->result_array();

    $value = array(
      'Result' => array(
        // 'Member' => $Member,
        // 'AdminCode' => $AdminCode,
      ),
      'View' => 'back/downline'
    );
    $this->LoadPage($value);
  }
  public function downline_detail() {

    $Code = $this->uri->segment(3); // Code ผู้แนะนำ
    $MemberCount = $this->db->where('member_counselor', $Code)->get('mlm_member')->num_rows();
    $Counselor = $this->db->where('member_code', $Code)->get('mlm_member')->result_array(); // ดึงตารางผู้้แนะนำออกมา
    $Member = $this->db->where('member_counselor', $Code)->get('mlm_member')->result_array(); // ดึงตารางเครื่อข่ายออกมา
    // $MemberCount = $this->db->where('member_counselor', $Code)->get('mlm_member')->num_rows();

    $value = array(
      'Result' => array(
        'Member' => $Member,
        'Counselor' => $Counselor,
        'MemberCount' => $MemberCount,

      ),
      'View' => 'back/downline_detail'
    );
    $this->LoadPage($value);
  }
  public function income() {

    $value = array(
      'Result' => array(
        'Result' => "",
      ),
      'View' => 'back/income'
    );
    $this->LoadPage($value);
  }
  public function MemberListPage() {

    $member_list = $this->db->order_by('member_status', 'DESC')->get('mlm_member')->result_array();
    $value = array(
      'Result' => array(
        'MemberList' => $member_list,
      ),
      'View' => 'back/member/member_list'
    );

    $this->LoadPage($value);
  }
  public function MemberProfilePage() {
    $member_id = $this->uri->segment(3);
    $member_profile = $this->db->where('member_id', $member_id)->get('mlm_member')->result_array();
    $account_list = $this->db->where('member_id', $member_id)->get('mlm_account')->result_array();
    $_SESSION['MEMBERID'] = $member_id;

    $value = array(
      'Result' => array(
        'MemberProfile' => $member_profile,
        'AccountList' => $account_list,
      ),
      'View' => 'back/member/member_profile'
    );

    $this->LoadPage($value);
  }

  public function user_detail_by_id() {
    $member_upline_id = $this->uri->segment(3);
    $Upline  = $this->member_models->search_account_by_member_id($member_upline_id);
    $Downline  = $this->member_models->search_downline($member_upline_id);
    $value = array(
      'Result' => array(
        'Upline' => $Upline,
        'Downline' => $Downline
      ),
      'View' => 'back/mlm_network/member_detail'
    );

    $this->LoadPage($value);
  }
  public function user_edit_by_id() {
    $member_id = $this->uri->segment(3);
    $MemberDetail  = $this->member_models->search_account_by_member_id($member_id);

    $value = array(
      'Result' => array(
        'MemberDetail' => $MemberDetail,
      ),
      'View' => 'back/mlm_network/member_edit'
    );

    $this->LoadPage($value);
  }
  public function three_form_new() {
    $UplineID = $this->uri->segment(3);
    $UplineAccount = $this->member_models->search_account_by_member_id($UplineID);
    $NewAccount = $this->member_models->search_member_by_id($_SESSION['MEMBERID']);
    $Upline = $this->member_models->search_member_by_id($UplineID);
    $value = array(
      'Result' => array(
        'UplineAccount' => $UplineAccount,
        'NewAccount' => $NewAccount,
        'Upline' => $Upline,

      ),
      'View' => 'back/member/three_form_new'
    );

    $this->LoadPage($value);
  }
  public function update_user() {

    $input = array(
      'member_username' => $_POST['member_username'],
      'member_detail' => $_POST['member_detail'],
      'member_phone' => $_POST['member_phone'],
      'member_citizen_id' => $_POST['member_citizen_id'],

    );

    $this->db->where('member_id', $_POST['member_id'])->update('mlm_member', $input);

    $Upline  = $this->member_models->search_account_by_member_id($_POST['member_id']);
    $Downline  = $this->member_models->search_downline($_POST['member_id']);
    $value = array(
      'Result' => array(
        'Upline' => $Upline,
        'Downline' => $Downline
      ),
      'View' => 'back/mlm_network/member_detail'
    );

    $this->LoadPage($value);
  }
  public function add_account() {
    $member_id = $this->uri->segment(3);
    $upline_id = $this->uri->segment(4);
    // $Member  = $this->member_models->search_account_by_member_id($member_id);
    $Upline  = $this->member_models->search_account_by_id($upline_id);

    $last_user = $this->db
    ->where('account_team', $Upline[0]['account_team'])
    ->order_by('account_code', 'DESC')
    ->get('mlm_account')->result_array();

    // $code_prefix = substr($last_user[0]['account_code'], -5 , 1);
    // $code_run = substr($last_user[0]['account_code'], 1);
    // $code_run = ($code_run*1);
    // $code_run = $code_run+=1;
    // $member_code = $code_prefix.sprintf("%04d", $code_run);
    // $this->debuger->prevalue($member_code);

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

      'member_id' => $member_id,
      'account_register_date' => $time,
      'account_expired_date' => $expired,
    );
    $this->member_models->add_account($input);


    redirect('/Admin_controller/member_profile/'.$_SESSION['MEMBERID']);

  }
  public function member_list2() {

    $Member = $this->db->order_by('member_status', 'DESC')->get('mlm_member')->result_array();

    $value = array(
      'Result' => array(
        'Member' => $Member,
      ),
      'View' => 'back/mlm_network/mlm_list'
    );
    $this->LoadPage($value);
  }
  public function team_detail() {
    $TeamType = $this->uri->segment(3);
    $Member = $this->db->where('member_team', $TeamType)->order_by('member_code', 'DESC')->get('mlm_member')->result_array();

    $value = array(
      'Result' => array(
        'Member' => $Member,
      ),
      'View' => 'back/mlm_network/team_detail'
    );
    $this->LoadPage($value);
  }
  public function account_success() {
    $member = $this->member_models->search_member_by_id($_SESSION['MEMBERID']);
    if ($member[0]['member_status']==2) {
      $input2['member_status']=1;
      $this->db->where('member_id', $_SESSION['MEMBERID'])->update('mlm_member', $input2);
    }
    $account_id = $this->uri->segment(3);
    $input['account_status'] = 1;

    $this->db->where('account_id', $account_id)->update('mlm_account',$input);

    redirect($this->agent->referrer(), 'refresh');
  }
}
