
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
    $this->db->insert('mlm_bookbank', $input);
    //redirect($this->agent->referrer(), 'refresh');

  }
	function ListBookBank_post()
		{
			$id = $this->post('id');
			// echo $id;
			$ListBookBank = $this->AccountModel->BookbankList($id);
			// print_r($GetMemberProfile);
			$this->response($ListBookBank);
		}

		public function DeleteBookBank_post()
	  {
			$input =  $this->post();
			print_r($input);
			$this->AccountModel->DeleteBookbank($input);
	  }
}
