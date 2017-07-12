<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION))
    {
      session_start();
    }
  }

  public function index() {
    $Config = $this->Config_model->Config();
    $Result = array(
      'Config' => $Config,
    );

    $this->load->view('back/Login',$Result);
  }
  public function AuthenAdmin()
  {
    $input = $this->input->post();
    $input['admin_password'] = base64_encode($input['admin_password']);
    // $this->debuger->prevalue($input);

    $Admin = $this->Homepage_model->AuthenAdmin($input);
    // $this->debuger->prevalue($Admin);

    if (count($Admin)>0) {
      $_SESSION['ADMIN_ID'] = $Admin[0]['admin_id'];
      $_SESSION['ADMIN_TEAM'] = $Admin[0]['admin_team'];
      $_SESSION['ADMIN_TYPE'] = $Admin[0]['admin_type'];

      // $this->debuger->prevalue($_SESSION);

      redirect('/DashBoardMain');
    } else {
      redirect('/admin');
    }
  }
  public function Logout() {
    session_destroy();
    redirect('/admin');
  }
}
