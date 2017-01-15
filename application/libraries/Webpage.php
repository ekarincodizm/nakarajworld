<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Webpage {

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
  
} /* End of file Someclass.php */
