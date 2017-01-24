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
    $this->load->view('back/Login');
  }
  public function AuthenAdmin()
  {
    $input = $this->input->post();
    $input['admin_password'] = base64_encode($input['admin_password']);
    // $this->debuger->prevalue($input);

    $Admin = $this->HomePageModel->AuthenAdmin($input);
    // $this->debuger->prevalue($Admin);

    if (count($Admin)>0) {
      $_SESSION['ADMIN_ID'] = $Admin[0]['admin_id'];
      $_SESSION['ADMIN_TEAM'] = $Admin[0]['admin_team'];
      $_SESSION['ADMIN_TYPE'] = $Admin[0]['admin_type'];

      // $this->debuger->prevalue($_SESSION);

      redirect('/DashBoardMain');
    } else {
      redirect('/Admin');
    }
  }
  public function Logout() {
    session_destroy();
    redirect('/Admin');
  }
}
