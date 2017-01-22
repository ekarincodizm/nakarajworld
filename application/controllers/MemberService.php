
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';
class MemberService extends REST_Controller
{
	public function AddBookBank_post()
  {
		$input =  $this->post();
		print_r($input);
		// $this->db->insert('admin', $input);
		//
    // $member_id = $this->uri->segment(3);
    // $input = array(
    //   'bank_id' => $_POST['bank_id'],
    //   'bookbank_account' => $_POST['bookbank_account'],
    //   'bookbank_number' => $_POST['bookbank_number'],
    //   'bookbank_bank_branch' => $_POST['bookbank_bank_branch'],
    //   'member_id' =>$member_id,
    // );
    $this->db->insert('mlm_bookbank', $input);
    //redirect($this->agent->referrer(), 'refresh');

  }


}
