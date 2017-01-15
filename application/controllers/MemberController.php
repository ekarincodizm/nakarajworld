<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MemberController extends CI_Controller{
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
        $member_list =  $this->member_models->AllMember();
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
        $account_list = $this->db
        ->where('member_id', $member_id)
        ->get('mlm_account')->result_array();
        $i=0;
        $countDL=0;
        foreach ($account_list as $row) {
            $account_list[$i]['adviser'] = $this->db->where('account_id', $row['account_adviser_id'])->get('mlm_account')->result_array();
            $account_list[$i]['upline'] = $this->db->where('account_id', $row['account_upline_id'])->get('mlm_account')->result_array();
            $i++;
            $countDL += $this->db->where('downline_count_upline_id', $row['account_id'])->get('mlm_downline_count')->num_rows();
        }

        $value = array(
            'Result' => array(
                'MemberProfile' => $member_profile,
                'AccountList' => $account_list,
                'TotalDownline' => $countDL
            ),
            'View' => 'back/member/member_profile'
        );

        $this->LoadPage($value);
    }
    public function member_edit() {
        $id = $this->uri->segment(3);
        $member = $this->db->where('member_id', $id)->get('mlm_member')->result_array();

        $value = array(
            'Result' => array(
                'member' => $member,
            ),
            'View' => 'back/member/member_edit'
        );

        $this->LoadPage($value);
    }
    public function member_save()
    {
        $input = array(
            'member_id' => $_POST['member_id'],
            'member_prefix' => $_POST['member_prefix'],
            'member_firstname' => $_POST['member_firstname'],
            'member_lastname' => $_POST['member_lastname'],
            'member_citizen_id' => $_POST['member_citizen_id'],
            'member_born' => $_POST['member_born'],
            'member_age' => $_POST['member_age'],
            'member_email' => $_POST['member_email'],
            'member_address' => $_POST['member_address'],
            'member_phone' => $_POST['member_phone'],
            'member_id_card_type' => $_POST['member_id_card_type'],
            'member_line_id' => $_POST['member_line_id'],
            'member_skype' => $_POST['member_skype'],
            'member_whatapp' => $_POST['member_whatapp'],
            'member_contact_etc' => $_POST['member_contact_etc1'].$_POST['member_contact_etc2'],

        );

        $this->db->where('member_id',$input['member_id'])->update('mlm_member', $input);


        redirect('/MemberController');
    }
    public function member_status()
    {
        $id = $this->uri->segment(3);
        $MemberStatus = $this->db->where('member_id', $id)->get('mlm_member')->result_array();


        if ($MemberStatus[0]['member_status']==0) {
            $input['member_status'] = 1;
        } else {
            $input['member_status'] = 0;
        }

        $this->db->where('member_id', $id)->update('mlm_member', $input);

        redirect('/MemberController');
    }
    public function account_status()
    {
        $id = $this->uri->segment(3);
        $AccountStatus = $this->db->where('account_id', $id)->get('mlm_account')->result_array();


        if ($AccountStatus[0]['account_status']==0) {
            $input['account_status'] = 1;
        } else {
            $input['account_status'] = 0;
        }

        $this->db->where('account_id', $id)->update('mlm_account', $input);


        redirect('/MemberController/MemberProfilePage/'.$AccountStatus[0]['member_id']);
    }

    public function ApprovedMember()
    {
        $member_id = $this->uri->segment(3);
		$setting = $this->db->order_by('setting_id', 'DESC')->get('mlm_setting')->result_array();
		$input = array(
			'accounting_date' => Date('Y-m-d'),
			'accounting_source_id' => '',
			'accounting_amount' => $setting[0]['setting_register_fee'],
			'journals_id' => 1,
			'member_id' => $member_id,
		);
		$this->db->insert('mlm_accounting', $input);

        redirect('/AccountingController/');
    }






}
