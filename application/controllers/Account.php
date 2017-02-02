<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if(!isset($_SESSION))
    {
      session_start();
    }
  }
  public function LoadPage($value)
  {
    $data = $value['Result'];
    $this->load->view('back/template/head', $data);
    $this->load->view($value['View']);
    $this->load->view('back/template/footer');
  }

  public function index()
  {
    $AccountList = json_decode(json_encode($this->AccountModel->AllAccountList()), true);
    $value = array(
      'Result' => array(
        'AccountList' => $AccountList,
      ),
      'View' => 'back/Account/AllAccount'
    );
    $this->LoadPage($value);
  }
  public function AccountPermission()
  {
    $input = $this->input->post();
    $this->AccountingModel->Account_Transfer($input);
    redirect($this->agent->referrer(), 'refresh');
  }

  public function LoopNor()
  {
    $member_id = 37;
    $adviser_id = 1;
    // $upline_id = 94;

    $upline_id = array(
      0 => 94,
      1 => 95,
      2 => 105,
      3 => 106,
      4 => 107,
      5 => 108,
      6 => 109,
      7 => 110,
      8 => 121,
    );
    $arr=0;
    $index = 0;
    for ($i=1; $i <=27 ; $i++) {
      echo "<pre>";
      echo $upline_id[$arr];
      echo "<br>";
      $this->SaveAccount($member_id, $adviser_id, $upline_id[$arr]);

      $index++;

      if ($index==3) {
        $arr++;
        $index=0;
      }
    }

  }
  public function SaveAccount($member_id, $adviser_id, $upline_id)
  {
    date_default_timezone_set("Asia/Bangkok");
    // $member_id = $this->uri->segment(3);
    // $adviser_id = $this->uri->segment(4);
    // $upline_id = $this->uri->segment(5);

    // ดึงรายละเอียดของ อัปไลน์
    $Upline = $this->AccountModel->FindAccountByID($upline_id);
    print_r($Upline);
    $AccountListByTeam = $this->AccountModel->CountAccountTeam($Upline[0]['account_team']);
    //เพิ่ม Account ใหม่ และ เพิ่มการนับ downline
    $account_level = $Upline[0]['account_level']+1;
    $AccountInput = array(
      'account_team' => $Upline[0]['account_team'],
      'account_level' => $account_level,
      'account_code' => $AccountListByTeam+1,
      'account_upline_id' => $upline_id,
      'account_adviser_id' => $adviser_id,
      'member_id' => $member_id,
    );

    $new_account_id = $this->AccountModel->SaveAccount($AccountInput, $adviser_id);

    $this->FreeExtend($new_account_id, $member_id);
    // จบการบันทึก บัญชีใหม่ และ ลงบัญชีเงินได้ เรียบร้อย (ฟรีค่าธรรมเนียม)
    // ตรวจ ค่าการตลาด
    $DownlineClass = 1; // account_class_id = 1 หรือ NORMAL
    $this->CheckMarketingValue($Upline, $DownlineClass);

    // redirect('/Member/MemberProfile/'.$member_id);
  }
  public function CheckMarketingValue($Upline, $DownlineClass)
  {
    // $this->debuger->prevalue(count($Upline));
    if (count($Upline)>0) {
      $Account = $Upline;
      // $account_id = $Account[0]['account_id']; // $account_id ที่ต้องการจัดตรวจสอบ การครบแผน
      // $account_class_id = $Account[0]['account_class_id']; // คลาสที่ต้องทำการเช็ค ให้เหมือนกัน หรือมากกว่า
      $max_row = $Account[0]['account_class_max_row']; // การสิ้นสุดของแต่ละ แถว ในแต่ละ class
      // $this->debuger->prevalue($max_row);
      $lvlDown = 1; // นับ ระดับลง

      // $FindGoal = $this->AccountModel->GetGoalClassLvl($Account[0]['account_class_id'] , $lvlDown);
      //
      // $goal = $FindGoal[0]['income_percent_goal']; // เป้าหมายการครบ เริ่มจาก 3
      // $this->debuger->prevalue($goal);

      // $GoalPerLevel = array(); // array เป้าหมายการครบ แต่ละ ระดับ
      // $i เริ่มที่ 3 เพราะ เป้าหมายการครบ เริ่มจาก 3 และ *3 เพื่อให้ได้จำนวน ที่จะหยุด ตามจำนวนชั้น ที่ account_class_id นั้นๆ กินได้
      for ($i=3; $i <=$max_row; $i *= 3) {
        if ( count($Account)>0 ) { // ในกรณีที่ถึง รหัสของบริษัท แล้วจะไม่มีเกินขึ้นไปอีก
          // MV = MarketingValue // นับ จำนวน รหัสที่ class ตรงกัน ใน
          $FindGoal = $this->AccountModel->GetGoalClassLvl($Account[0]['account_class_id'] , $lvlDown);
          $goal = $FindGoal[0]['income_percent_goal'];
          $NextAccount = $this->CheckMVPerLevel($Account, $lvlDown, $goal, $DownlineClass, $i);
          $Account = $NextAccount;
          $lvlDown++;
           // เพื่อให้ เลื่อนเป็นจำนวน การสิ้นสุดของแต่ละ แถว ในแต่ละ class ถัดไป
        }
      }
    }
    // exit();
  }
  public function CheckMVPerLevel($Account, $lvlDown, $goal, $DownlineClass, $i)
  {
    // echo "<pre>";

    // Account นี้ ที่กำลังยึดเป็นหลัก
    $ThisAccount = $Account;
    // นับ Downline
    $Downline = $this->AccountModel->DownlinePerLVL($ThisAccount, $lvlDown, $DownlineClass);

    // echo "<script>";
    // echo "console.log(".count($Downline).")";
    // print_r(count($Downline));
    // echo "</script>";

    // exit();
    $AmountDownline = count($Downline);
    $ModDownline = 1;
    if ($AmountDownline>0) {
      $ModDownline = $AmountDownline%$goal;
    }

    if ($ModDownline == 0) {
      if ($goal==3) {
        $this->AdviserDividend($Downline, $ThisAccount, $lvlDown, $DownlineClass);
      } else {
        $this->UplineDividend($ThisAccount, $lvlDown, $DownlineClass, $i, $goal);
      }
    }
    $NextAccount = $this->AccountModel->FindAccountByID($ThisAccount[0]['account_upline_id']);
    return $NextAccount;
  }
  public function UplineDividend($Upline, $lvl, $DownlineClass, $i, $goal)
  {
    // เงินที่ อัปไลน์ จะได้
    $UplineMVAmount = $this->AccountModel->GetMVByClassLvl($Upline[0]['account_class_id'] , $lvl);
    $lot = $i/$goal;
    // $this->debuger->prevalue($UplineMVAmount);
    $journal_dividend_amount = $UplineMVAmount/$lot;;
    // ลงค่าการตลาด ให้ Upline

    $FindDICode = $this->AccountModel->FindDividend();
    $DIcode = "DI".sprintf("%05d",($FindDICode+1));
    // $this->debuger->prevalue($DIcode);
    $input = array(
      'journal_dividend_amount' => $journal_dividend_amount,
      'journal_dividend_type' => 2,
      'account_id' => $Upline[0]['account_id'],
      'member_id' => $Upline[0]['member_id'],
      'journal_dividend_class' => $DownlineClass,
      'journal_dividend_code' => $DIcode,
     );
    $new_journal_dividend_id = $this->AccountModel->SaveDividend($input);
    // ลงบัญชี
    $code = "DR".DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");

    $AccountingInput = array(
      'accounting_date' =>  Date('Y-m-d'),
      'accounting_source_id' => $new_journal_dividend_id,
      'accounting_tax' => 0,
      'journals_id' => 5,
      'accounting_no' => $code,
      'accounting_note' => "ค่าการตลาด บริษัท"
    );
    $new_accounting_id = $this->AccountModel->AddAccounting($AccountingInput);
  }
  public function AdviserDividend($Downline, $Upline, $lvl, $DownlineClass)
  {
    // เงินที่ อัปไลน์ จะได้
    $UplineMVAmount = $this->AccountModel->GetMVByClassLvl($Upline[0]['account_class_id'] , $lvl);

    foreach ($Downline as $row) {
      if ($row['account_upline_id'] != $row['account_adviser_id']) { // เช็คว่า ผู้ที่แนะนำ กับผู้ที่เป็น อัปไลน์ เป็นคนเดียวกันไหม
        // ดึงข้อมูล Adviser
        $Adviser = $this->AccountModel->FindAccountByID($row['account_adviser_id']);
        $AdviserClass = $Adviser[0]['account_class_id'];
        $DownlineClass = $row['account_class_id'];
        // เช็ค Adviser กับ Downline เป็น แผนไหน (NORMAL หรือมากกว่า) เพื่อระบุเงิน Adviser
        if ($AdviserClass >1 && $DownlineClass >1) {
          $AdviserMVAmount = 500;
        } else {
          $AdviserMVAmount = 100;
        }
        //หักค่า Adviser
        $UplineMVAmount = $UplineMVAmount - $AdviserMVAmount;

        // ลงค่าการตลาด
        $FindDICode = $this->AccountModel->FindDividend();
        $DIcode = "DI".sprintf("%05d",($FindDICode+1));
        $input = array(
          'journal_dividend_amount' => $AdviserMVAmount,
          'journal_dividend_type' => 1,
          'account_id' => $Adviser[0]['account_id'],
          'member_id' => $Adviser[0]['member_id'],
          'journal_dividend_code' => $DIcode,
         );
        $new_journal_dividend_id = $this->AccountModel->SaveDividend($input);
        // ลงบัญชี
        $code = "DR".DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");
        $input = array(
          'accounting_date' => Date('Y-m-d'),
          'accounting_source_id' => $new_journal_dividend_id,
          'accounting_no' => $code,
          'journals_id' => 3,
          'accounting_note' => "ค่าการตลาด ผู้แนะนำ",
        );

        $this->AccountingModel->SaveAccounting($input);
      } // End if
    } // End foreach

    // ลงค่าการตลาด ให้ Upline
    $FindDICode = $this->AccountModel->FindDividend();
    $DIcode = "DI".sprintf("%05d",($FindDICode+1));
    $input = array(
      'journal_dividend_amount' => $UplineMVAmount,
      'journal_dividend_type' => 2,
      'account_id' => $Upline[0]['account_id'],
      'member_id' => $Upline[0]['member_id'],
      'journal_dividend_class' => $DownlineClass,
      'journal_dividend_code' => $DIcode,
     );
    $new_journal_dividend_id = $this->AccountModel->SaveDividend($input);
    // ลงบัญชี
    $code = "DR".DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");
    $input = array(
      'accounting_date' => Date('Y-m-d'),
      'accounting_source_id' => $new_journal_dividend_id,
      'journals_id' => 4,
      'accounting_note' => "ค่าการตลาด ตามแผน",
      'accounting_no' => $code,
    );

    $this->AccountingModel->SaveAccounting($input);
  }
  public function FreeExtend($new_account_id, $member_id)
  {
    // เพิ่มการลงทะเบียนต่ออายุ ฟรี
    $expired =  Date('Y-m-d', strtotime("+365 day", strtotime(Date('Y-m-d'))));
    $FindEXCode = $this->AccountModel->JounalExtendAccountAll();
    $EXcode = "EX".sprintf("%05d",($FindEXCode+1));
    $ExtendInput = array(
      'account_id' => $new_account_id,
      'member_id' => $member_id,
      'journal_extend_start_date' => Date('Y-m-d'),
      'journal_extend_expired_date' => $expired,
      'journal_extend_amount' => 0,
      'journal_extend_code' => $EXcode,
    );
    $new_journal_extend_id = $this->AccountModel->SaveJournalExtend($ExtendInput);

    // เพิ่มรายการบัญชี ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่
    $code = "DR".DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");
    $AccountingInput = array(
      'accounting_date' =>  Date('Y-m-d'),
      'accounting_source_id' => $new_journal_extend_id,
      'accounting_tax' => 0,
      'journals_id' => 2,
      'accounting_no' => $code,
      'accounting_note' => "ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่",
    );
    $new_accounting_id = $this->AccountModel->AddAccounting($AccountingInput);
    $this->AccountingModel->ConfirmInvoice($new_accounting_id);
  }
}
