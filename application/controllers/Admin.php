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

    if (count($Admin)>0) {
      $_SESSION['ADMIN_ID'] = $Admin[0]['admin_id'];
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
