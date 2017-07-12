<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends CI_Controller{
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
    $SuperAdmin = $this->Permission_model->SuperAdmin();
    $TeamAdmin = $this->Permission_model->TeamAdmin();
    // $this->debuger->prevalue($SuperAdmin);

    $value = array(
      'Result' => array(
        'SuperAdmin' => $SuperAdmin,
        'TeamAdmin' => $TeamAdmin,

      ),
      'View' => 'back/Permission/PermissionSetting'
    );
    $this->LoadPage($value);
  }
  public function SaveAdmin()
  {
    $AdminForm = $this->input->post();
    $AdminForm['admin_password'] = base64_encode($AdminForm['admin_password']);

    $AdminType = $this->uri->segment(3);
    $MemberID = $this->uri->segment(4);
    $this->Permission_model->UpdateAdmin($AdminForm);
    redirect($this->agent->referrer(), 'refresh');

  }
}
