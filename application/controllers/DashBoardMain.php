<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashBoardMain extends CI_Controller {
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
    $Group['Group1'] = $this->DashBoardModel->DashBoardGroup(1);
    $Group['Group2'] = $this->DashBoardModel->DashBoardGroup(2);
    $Group['Group3'] = $this->DashBoardModel->DashBoardGroup(3);
    $Group['Group4'] = $this->DashBoardModel->DashBoardGroup(4);

    $CodeTeam = $this->DashBoardModel->DashBoardTeam();
    $SumAccountPerTeam = array();
    for($i = 5 ; $i <= 13 ; $i++){
      $SumAccountPerTeam[$i-5] = $this->DashBoardModel->DashBoardGroupChartPer30Day($i);
    }
    // print_r($SumAccountPerTeam);
    $value = array(
      'Result' => array(
        'CodeTeam' => $CodeTeam,
        'Group' => $Group,
        'SumAccountPerTeam' => $SumAccountPerTeam,
      ),
      'View' => 'back/DashBoard/DashBoardMain'
    );
    $this->LoadPage($value);
  }
}
