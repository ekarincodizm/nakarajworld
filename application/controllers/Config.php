<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends CI_Controller{
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

  // public function index(){
  //   $Config['config'] = $this->ConfigModel->Config();
  //   $this->load->view('HomePage',$Config);
  // }

  public function index() {
    $Config_id = $this->uri->segment(3);
    $ConfigDetail =$this->Config_model->Config($Config_id);
    $ConfigDetail = json_decode(json_encode($ConfigDetail), true);

    $value = array(
      'Result' => array(
        'ConfigDetail' => $ConfigDetail,
      ),
      'View' => 'back/Config/ConfigFormEdit'
    );
    $this->LoadPage($value);
  }

  public function ConfigBG() {
    $Config_id = $this->uri->segment(3);
    $ConfigDetail =$this->Config_model->Config($Config_id);
    $ConfigDetail = json_decode(json_encode($ConfigDetail), true);

    $value = array(
      'Result' => array(
        'ConfigDetail' => $ConfigDetail,
      ),
      'View' => 'back/Config/BGEdit'
    );
    $this->LoadPage($value);
  }

  public function ConfigDetail() {
    $Config_id = $this->uri->segment(3);
    $ConfigDetail =$this->Config_model->Config($Config_id);
    $ConfigDetail = json_decode(json_encode($ConfigDetail), true);

    $value = array(
      'Result' => array(
        'ConfigDetail' => $ConfigDetail,
      ),
      'View' => 'back/Config/ConfigFormEditDetail'
    );
    $this->LoadPage($value);
  }

  public function SaveConfigDetail()
  {
    // $ProductsCode = $this->db->get('mlm_config')->num_rows();
    $Config = $this->db->get('mlm_config');
    //$Config = sprintf("%04d",($Config+1));
    $input = array(
      'mlm_config_id' => $_POST['mlm_config_id'],
      'mlm_config_detail' => $_POST['mlm_config_detail'],
    );
    $this->Config_model->UpdateConfig($input);

    redirect('/Config/ConfigDetail');

  }

  public function ShopConfigFooter()
  {
    $Config = $this->db->get('mlm_config');
    $input = array(
      'mlm_config_id' => $_POST['mlm_config_id'],
      'shop_config' => $_POST['shop_config'],
    );
    $this->Config_model->UpdateConfig($input);
    redirect('/Config/ShopConfig');
  }

  public function ShopConfig() {
    $Config_id = $this->uri->segment(3);
    $ConfigDetail =$this->Config_model->Config($Config_id);
    $ConfigDetail = json_decode(json_encode($ConfigDetail), true);

    $value = array(
      'Result' => array(
        'ConfigDetail' => $ConfigDetail,
      ),
      'View' => 'back/SaleOrder/EditShopConfig'
    );
    $this->LoadPage($value);
  }

  public function SaveConfig()
  {
    // $ProductsCode = $this->db->get('mlm_config')->num_rows();
    $Config = $this->db->get('mlm_config');
    //$Config = sprintf("%04d",($Config+1));

    if ($_FILES["mlm_config_logo"]["name"]!='') {
      // echo "เลือกไฟล์";
      // echo $_FILES["products_image"];
      // $this->debuger->prevalue($_FILES["products_image"]);
      $ext = pathinfo($_FILES["mlm_config_logo"]["name"],PATHINFO_EXTENSION);
      $new_file = 'logo'.'.'.$ext;
      //unlink("base_url("$_POST['mlm_config_logo_old']")");
      //unlink('base_url(assets/image/'.$_POST['mlm_config_logo_old'].')');
      //unlink('http://localhost/nakarajworld/assets/image/logo.png');
      copy($_FILES["mlm_config_logo"]["tmp_name"],"assets/image/".$new_file);
    } else {
      // echo "ไม่ได้เลือกไฟล์";
      // $this->debuger->prevalue($_POST['products_image_old']);

      $new_file = $_POST['mlm_config_logo_old'];
    }
    $input = array(
      'mlm_config_id' => $_POST['mlm_config_id'],
      'mlm_config_email' => $_POST['mlm_config_email'],
      'mlm_config_tel' => $_POST['mlm_config_tel'],
      'mlm_config_name' => $_POST['mlm_config_name'],
      'mlm_config_address' => $_POST['mlm_config_address'],
      'mlm_config_logo' => $new_file,
    );
    $this->Config_model->UpdateConfig($input);

    redirect('/Config');

  }
  public function SaveBG()
  {
    // $ProductsCode = $this->db->get('mlm_config')->num_rows();
    $Config = $this->db->get('mlm_config');
    //$Config = sprintf("%04d",($Config+1));

    if ($_FILES["mlm_config_bg"]["name"]!='') {
      // echo "เลือกไฟล์";
      // echo $_FILES["products_image"];
      // $this->debuger->prevalue($_FILES["products_image"]);
      $ext = pathinfo($_FILES["mlm_config_bg"]["name"],PATHINFO_EXTENSION);
      $new_file = 'bg'.'.'.$ext;
      //unlink("base_url("$_POST['mlm_config_logo_old']")");
      //unlink('base_url(assets/image/'.$_POST['mlm_config_logo_old'].')');
      //unlink('http://localhost/nakarajworld/assets/image/logo.png');
      copy($_FILES["mlm_config_bg"]["tmp_name"],"assets/theme/front-end/images/".$new_file);
    } else {
      // echo "ไม่ได้เลือกไฟล์";
      // $this->debuger->prevalue($_POST['products_image_old']);

      $new_file = $_POST['mlm_config_bg_old'];
    }
    $input = array(
      'mlm_config_id' => $_POST['mlm_config_id'],
      'mlm_config_bg' => $new_file,
    );
    $this->Config_model->UpdateConfig($input);

    redirect('/Config/ConfigBG');
  }
}
