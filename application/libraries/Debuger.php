<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Debuger  {

  public function prevalue($value)
  {
    echo "<pre>";
    print_r($value);
    exit();
  }
  public function DeCodeMD5($md5)
  {
    $ret = '';

    for ( $i = 0; $i < 32; $i += 2 ) {
        $ret .= chr( hexdec( $md5{ $i + 1 } ) + hexdec( $md5{ $i } ) * 16 );
    }

    return $ret;
  }

  public function load_back_js($strName)
  {
    $js_url = base_url('assets/theme/back-end/js')."/".$strName.".js";
    echo "<script src='".$js_url."'></script>";
  }
  public function load_back_plugins($strName)
  {
    $js_url = base_url('assets/theme/back-end/plugins')."/".$strName.".js";
    echo "<script src='".$js_url."'></script>";
  }
  public function load_back_plugins_css($strName)
  {
    $css_url = base_url('assets/theme/back-end/plugins')."/".$strName.".css";
    echo "<link rel='stylesheet' href='".$css_url."'>";
  }
  public function load_back_css($strName)
  {
    $css_url = base_url('assets/theme/back-end/css')."/".$strName.".css";
    echo "<link rel='stylesheet' href='".$css_url."'>";
  }
  public function front_load_css($strName)
  {
    $css_url = base_url('assets/theme/front-end/css')."/".$strName.".css";
    echo "<link rel='stylesheet' href='".$css_url."'>";
  }
  public function front_load_js($strName)
  {
    $js_url = base_url('assets/theme/front-end/js')."/".$strName.".js";
    echo "<script src='".$js_url."'></script>";
  }
  public function LoadPage($value){
		$data['Result'] = $value['Result'];
		$this->load->view('front/Template/head', $data);
		$this->load->view($value['View']);
		$this->load->view('front/Template/footer');
	}
} /* End of file Someclass.php */
