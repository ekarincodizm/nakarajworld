<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller{
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
    $ProductsList = $this->Products_model->ProductsList();
    $ProductsList = json_decode(json_encode($ProductsList), true);

    $value = array(
      'Result' => array(
        'ProductsList' => $ProductsList,
      ),
      'View' => 'back/Products/ProductsList'
    );
    $this->LoadPage($value);
  }
  public function NewProducts() {
    $value = array(
      'Result' => array(

      ),
      'View' => 'back/Products/ProductsForm'
    );
    $this->LoadPage($value);
  }
  public function EditProducts() {
    $products_id = $this->uri->segment(3);
    $ProductsDetail =$this->Products_model->ProductsDetail($products_id);
    $ProductsDetail = json_decode(json_encode($ProductsDetail), true);

    $value = array(
      'Result' => array(
        'ProductsDetail' => $ProductsDetail,
      ),
      'View' => 'back/Products/ProductsFormEdit'
    );
    $this->LoadPage($value);
  }

  public function SaveProducts()
  {
    $ProductsCode = $this->db->get('mlm_products')->num_rows();
    $ProductsCode = sprintf("%04d",($ProductsCode+1));
    date_default_timezone_set("Asia/Bangkok");
    if (!isset($_POST['products_id'])) {
      if ($_FILES["products_image"]["name"]!='') {
        $ext = pathinfo($_FILES["products_image"]["name"],PATHINFO_EXTENSION);
        $new_file = 'img'.$ProductsCode.'.'.$ext;
        copy($_FILES["products_image"]["tmp_name"],"assets/image/products/".$new_file);
      }
      $input = array(
        'products_id' => $_POST['products_name'],
        'products_detail' => $_POST['products_detail'],

        'products_name' => $_POST['products_name'],
        'products_pv' => $_POST['products_pv'],
        'products_price_narmal' => $_POST['products_price_narmal'],
        'products_price_discount' => $_POST['products_price_discount'],
        'products_unit' => $_POST['products_unit'],

        'products_image' => $new_file,
        'products_update_date' => Date('Y-m-d H:i:s'),

        'products_code' => "P".$ProductsCode,
      );
      $this->Products_model->AddProducts($input);
    } else {

      if ($_FILES["products_image"]["name"]!='') {
        // echo "เลือกไฟล์";
        // echo $_FILES["products_image"];
        // $this->debuger->prevalue($_FILES["products_image"]);

        $ext = pathinfo($_FILES["products_image"]["name"],PATHINFO_EXTENSION);
        $new_file = 'img'.$_POST['products_code'].'.'.$ext;
        copy($_FILES["products_image"]["tmp_name"],"assets/image/products/".$new_file);
      } else {
        // echo "ไม่ได้เลือกไฟล์";
        // $this->debuger->prevalue($_POST['products_image_old']);

        $new_file = $_POST['products_image_old'];
      }
      $input = array(
        'products_id' => $_POST['products_id'],

        'products_detail' => $_POST['products_detail'],
        'products_name' => $_POST['products_name'],
        'products_pv' => $_POST['products_pv'],
        'products_price_narmal' => $_POST['products_price_narmal'],
        'products_price_discount' => $_POST['products_price_discount'],
        'products_unit' => $_POST['products_unit'],

        'products_image' => $new_file,
        'products_update_date' => Date('Y-m-d H:i:s'),
        'products_code' => $_POST['products_code'],
      );
      $this->Products_model->UpdateProducts($input);

    }
    redirect('/Products');

  }
  public function Editstatus()
  {
    $products_id = $this->uri->segment(3);
    $productstatus = $this->uri->segment(4);

    if ($productstatus == 0) {
      $status = array('products_status' => 1 );
    } else {
      $status = array('products_status' => 0 );
    }

    $this->db->where('products_id',$products_id)->update('mlm_products',$status);

    redirect('Products');
  }
}
