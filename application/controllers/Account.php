<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account extends CI_Controller
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
    $AccountList = json_decode(json_encode($this->Account_model->AllAccountList()), true);
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
    $this->Accounting_model->Account_Transfer($input);
    redirect($this->agent->referrer(), 'refresh');
  }

  // public function LoopNor()
  // {
  //   $member_id = 1;
  //   $adviser_id = 1;
  //   $upline_id = 263;
  //
  //   $index = 0;
  //   for ($i=1; $i <=345 ; $i++) {
  //     echo "<pre>";
  //     echo $upline_id;
  //     echo "<br>";
  //     $this->SaveAccount($member_id, $adviser_id, $upline_id);
  //
  //     $index++;
  //
  //     if ($index==3) {
  //       $upline_id++;
  //       $index=0;
  //     }
  //   }
  //
  // }
  // public function SaveAccount($member_id, $adviser_id, $upline_id)
  public function SaveAccount()
  {
    date_default_timezone_set("Asia/Bangkok");
    $member_id = $this->uri->segment(3);
    $adviser_id = $this->uri->segment(4);
    $upline_id = $this->uri->segment(5);

    // ดึงรายละเอียดของ อัปไลน์
    $Upline = $this->Account_model->FindAccountByID($upline_id);
    $AccountListByTeam = $this->Account_model->CountAccountTeam($Upline[0]['account_team']);
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

    $new_account_id = $this->Account_model->SaveAccount($AccountInput, $adviser_id);

    $this->FreeExtend($new_account_id, $member_id);
    // จบการบันทึก บัญชีใหม่ และ ลงบัญชีเงินได้ เรียบร้อย (ฟรีค่าธรรมเนียม)
    // ตรวจ ค่าการตลาด
    $DownlineClass = 1; // account_class_id = 1 หรือ NORMAL
    // echo "<pre>";
    // print_r($Upline);
    $RoundClass = 0;
    $this->CheckMarketingValue($Upline, $DownlineClass, $RoundClass);

    redirect('/Member/MemberProfile/'.$member_id);
  }
  // public function LoopUp()
  // {
  //   $account_id = 1106;
  //
  //   for ($i=1; $i <=3; $i++) {
  //     echo "<pre>";
  //     echo $account_id;
  //     echo "<br>";
  //     $this->UpgradeAccount($account_id);
  //     $account_id++;
  //   }
  // }
  // public function UpgradeAccount($account_id)
  public function UpgradeAccount()
  {
    $account_id = $this->uri->segment(3);
    $member_id = $this->uri->segment(4);
    // Use PV
    $MyAccountClass = $this->Account_model->FindAccountByID( $account_id );

    $next_account_class_id = $MyAccountClass[0]['account_class_id']+1;
    $NextClass = array();
    $NextClass = $this->Account_model->NextClass($next_account_class_id);
    //$this->debuger->prevalue($NextClass);
    $time =  Date('Y-m-d');
    $value = array(
      'point_value' => $NextClass[0]['account_class_pv'],
      'point_detail' => 'ยกระดับ',
      'point_date' => $time,
      'point_type' => 0,
      'member_id' => $member_id,
      'account_id' => $account_id,
    );

    $this->Account_model->AddAccountDetailUpclass($value);

    // UpgradeAccount
    $Upline = $this->Account_model->UpgradeAccount($account_id);
    $ThisAccount = $this->Account_model->FindAccountByID($account_id);
    $RoundClass = 0;
    $this->CheckMarketingValue($Upline, $ThisAccount[0]['account_class_id'] ,$RoundClass);
    redirect($this->agent->referrer(), 'refresh');
  }

  // public function LoopRe()
  // {
  //   $class_id = 2;
  //   $account_id = 14;
  //
  //   for ($i=1; $i <=3; $i++) {
  //     echo "<pre>";
  //     echo $account_id;
  //     echo "<br>";
  //     $this->RepeatAccount($account_id,$class_id);
  //     $account_id++;
  //   }
  // }

  // public function RepeatAccount($account_id,$class_id)
  public function RepeatAccount()
  {
    $account_id = $this->uri->segment(3);
    $class_id = $this->uri->segment(4);
    $member_id = $this->uri->segment(5);

    // Add Repeat
    $AccountRound = $this->HomePageModel->AccountRepeat($account_id,$class_id);
    $RoundClass = $AccountRound+1;
    $NextClass = $this->Account_model->NextClass($class_id);

    $time =  Date('Y-m-d');
    $value = array(
      'account_repeat_date' => $time,
      'account_repeat_class' => $class_id,
      'account_repeat_round' => $RoundClass,
      'account_id' => $account_id,
    );
    $this->Account_model->AddRepeat($value);

    //Used PV
    $value = array(
      'point_value' => $NextClass[0]['account_class_pv'],
      'point_detail' => 'ซื้อซ้ำ',
      'point_date' => $time,
      'point_type' => 0,
      'member_id' => $member_id,
      'account_id' => $account_id,
    );
    $this->Account_model->AddAccountDetailUpclass($value);

    //UpgradeAccount
    $ThisAccount = $this->Account_model->FindAccountByID($account_id);
    $Upline = $this->Account_model->FindAccountByID($ThisAccount[0]['account_upline_id']);
    $this->CheckMarketingValue($Upline, $class_id,$RoundClass);
    redirect($this->agent->referrer(), 'refresh');
  }

  public function CheckMarketingValue($Upline, $DownlineClass, $RoundClass)
  {
    // $this->debuger->prevalue(count($Upline));
    if (count($Upline)>0) {
      $Account = $Upline;
      // $this->debuger->prevalue($Account);

      // $account_id = $Account[0]['account_id']; // $account_id ที่ต้องการจัดตรวจสอบ การครบแผน
      // $account_class_id = $Account[0]['account_class_id']; // คลาสที่ต้องทำการเช็ค ให้เหมือนกัน หรือมากกว่า
      $max_row = $Account[0]['account_class_max_row']; // การสิ้นสุดของแต่ละ แถว ในแต่ละ class
      //$this->debuger->prevalue($max_row);
      if ($DownlineClass==1 || $DownlineClass==2) {
        $lvlDown = 1;
        $i=3;
      } else {
        $lvlDown = $DownlineClass+3;
        $i=$max_row;
      }
      // echo $DownlineClass;
      // echo "<br>";
      // echo $lvlDown;
      // echo "<br>";

      // $FindGoal = $this->Account_model->GetGoalClassLvl($Account[0]['account_class_id'] , $lvlDown);
      //
      // $goal = $FindGoal[0]['income_percent_goal']; // เป้าหมายการครบ เริ่มจาก 3
      // $this->debuger->prevalue($goal);

      // $GoalPerLevel = array(); // array เป้าหมายการครบ แต่ละ ระดับ
      // $i เริ่มที่ 3 เพราะ เป้าหมายการครบ เริ่มจาก 3 และ *3 เพื่อให้ได้จำนวน ที่จะหยุด ตามจำนวนชั้น ที่ account_class_id นั้นๆ กินได้
        // print_r($DownlineClass);
        // echo "a";
        // print_r($lvlDown);

      for ($i; $i <=$max_row; $i *= 3) {
        if ( count($Account)>0 ) { // ในกรณีที่ถึง รหัสของบริษัท แล้วจะไม่มีเกินขึ้นไปอีก
          // MV = MarketingValue // นับ จำนวน รหัสที่ class ตรงกัน ใน
          // print_r($Account);
          $FindGoal = $this->Account_model->GetGoalClassLvl($DownlineClass , $lvlDown);
          $goal = $FindGoal[0]['income_percent_goal'];
          $NextAccount = $this->CheckMVPerLevel($Account, $lvlDown, $goal, $DownlineClass, $i,$RoundClass);
          // $this->debuger->prevalue($NextAccount);
          $Account = $NextAccount;
          $lvlDown++;
           // เพื่อให้ เลื่อนเป็นจำนวน การสิ้นสุดของแต่ละ แถว ในแต่ละ class ถัดไป
        }
      }
    }
    // exit();
  }
  public function CheckMVPerLevel($Account, $lvlDown, $goal, $DownlineClass, $i,$RoundClass)
  {
    // echo "<pre>";

    // Account นี้ ที่กำลังยึดเป็นหลัก
    $ThisAccount = $Account;
    // นับ Downline
    if ($RoundClass!='' && $RoundClass!=0) {
      $Downline = $this->Account_model->RepeatPerLVL($ThisAccount, $lvlDown, $DownlineClass, $RoundClass);
    } else {
      $Downline = $this->Account_model->DownlinePerLVL($ThisAccount, $lvlDown, $DownlineClass);
    }

    // echo "<script>";
    // echo "console.log(".count($Downline).")";
    // print_r(count($Downline));
    // echo "</script>";

    // exit();
    $AmountDownline = count($Downline);
    // $this->debuger->prevalue($AmountDownline);
    $ModDownline = 1;
    if ($AmountDownline>0) {
      $ModDownline = $AmountDownline%$goal;
    }

    if ($ModDownline == 0) {
      if ($lvlDown==1) {
        $this->AdviserDividend($Downline, $ThisAccount, $lvlDown, $DownlineClass,$RoundClass);
      } else {
        $this->UplineDividend($ThisAccount, $lvlDown, $DownlineClass, $i, $goal,$RoundClass);
      }
    }
    $NextAccount = $this->Account_model->FindAccountByID($ThisAccount[0]['account_upline_id']);
    return $NextAccount;
  }
  public function UplineDividend($Upline, $lvl, $DownlineClass, $i, $goal,$RoundClass)
  {
    // เงินที่ อัปไลน์ จะได้
    $UplineMV = $this->Account_model->GetMVByClassLvl($DownlineClass , $lvl);
     $UplineMVAmount= ($UplineMV[0]['income_percent_point']*$UplineMV[0]['income_percent_amount'])/100;
    $lot = $UplineMV[0]['income_percent_lot'];
    // $this->debuger->prevalue($UplineMVAmount);
    $journal_dividend_amount = $UplineMVAmount/$lot;;
    // ลงค่าการตลาด ให้ Upline

    $FindDICode = $this->Account_model->FindDividend();
    $DIcode = "DI".sprintf("%05d",($FindDICode+1));

    // $this->debuger->prevalue($DIcode);
    $input = array(
      'journal_dividend_amount' => $journal_dividend_amount,
      'journal_dividend_type' => 2,
      'account_id' => $Upline[0]['account_id'],
      'member_id' => $Upline[0]['member_id'],
      'journal_dividend_class' => $DownlineClass,
      'journal_dividend_code' => $DIcode,
      'journal_dividend_round' => $RoundClass,
     );
    $new_journal_dividend_id = $this->Account_model->SaveDividend($input);
    // ลงบัญชี
    $code = "DR".DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");

    $AccountingInput = array(
      'accounting_date' =>  Date('Y-m-d'),
      'accounting_source_id' => $new_journal_dividend_id,
      'accounting_tax' => 0,
      'journals_id' => 4,
      'accounting_no' => $code,
      'accounting_status' => 2,
      // 'accounting_note' => "ค่าการตลาด บริษัท"
    );
    $new_accounting_id = $this->Account_model->AddAccounting($AccountingInput);
  }
  public function AdviserDividend($Downline, $Upline, $lvl, $DownlineClass,$RoundClass)
  {
    // เงินที่ อัปไลน์ จะได้
    $UplineMV = $this->Account_model->GetMVByClassLvl($DownlineClass , $lvl);
     $UplineMVAmount= ($UplineMV[0]['income_percent_point']*$UplineMV[0]['income_percent_amount'])/100;
    $lot = $UplineMV[0]['income_percent_lot'];

    foreach ($Downline as $row) {
      if ($row['account_upline_id'] != $row['account_adviser_id']) { // เช็คว่า ผู้ที่แนะนำ กับผู้ที่เป็น อัปไลน์ เป็นคนเดียวกันไหม
        // ดึงข้อมูล Adviser
        $Adviser = $this->Account_model->FindAccountByID($row['account_adviser_id']);
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
        $FindDICode = $this->Account_model->FindDividend();
        $DIcode = "DI".sprintf("%05d",($FindDICode+1));
        $input = array(
          'journal_dividend_amount' => $AdviserMVAmount,
          'journal_dividend_type' => 1,
          'account_id' => $Adviser[0]['account_id'],
          'member_id' => $Adviser[0]['member_id'],
          'journal_dividend_code' => $DIcode,
          'journal_dividend_round' => $RoundClass,
         );
        $new_journal_dividend_id = $this->Account_model->SaveDividend($input);
        // ลงบัญชี
        $code = "DR".DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");
        $input = array(
          'accounting_date' => Date('Y-m-d'),
          'accounting_source_id' => $new_journal_dividend_id,
          'accounting_no' => $code,
          'journals_id' => 3,
          'accounting_status' => 2,
          'accounting_note' => "ค่าการตลาด ผู้แนะนำ",
        );

        $this->AccountingModel->SaveAccounting($input);
      } // End if
    } // End foreach

    // ลงค่าการตลาด ให้ Upline
    $FindDICode = $this->Account_model->FindDividend();
    $DIcode = "DI".sprintf("%05d",($FindDICode+1));
    $input = array(
      'journal_dividend_amount' => $UplineMVAmount,
      'journal_dividend_type' => 2,
      'account_id' => $Upline[0]['account_id'],
      'member_id' => $Upline[0]['member_id'],
      'journal_dividend_class' => $DownlineClass,
      'journal_dividend_code' => $DIcode,
      'journal_dividend_round' => $RoundClass,

     );
    $new_journal_dividend_id = $this->Account_model->SaveDividend($input);
    // ลงบัญชี
    $code = "DR".DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");
    $input = array(
      'accounting_date' => Date('Y-m-d'),
      'accounting_source_id' => $new_journal_dividend_id,
      'journals_id' => 4,
      'accounting_status' => 2,
      'accounting_note' => "ค่าการตลาด ตามแผน",
      'accounting_no' => $code,
    );

    $this->AccountingModel->SaveAccounting($input);
  }
  public function FreeExtend($new_account_id, $member_id)
  {
    // เพิ่มการลงทะเบียนต่ออายุ ฟรี
    $expired =  Date('Y-m-d', strtotime("+365 day", strtotime(Date('Y-m-d'))));
    $FindEXCode = $this->Account_model->JounalExtendAccountAll();
    $EXcode = "EX".sprintf("%05d",($FindEXCode+1));
    $ExtendInput = array(
      'account_id' => $new_account_id,
      'member_id' => $member_id,
      'journal_extend_start_date' => Date('Y-m-d'),
      'journal_extend_expired_date' => $expired,
      'journal_extend_amount' => 0,
      'journal_extend_code' => $EXcode,
    );
    $new_journal_extend_id = $this->Account_model->SaveJournalExtend($ExtendInput);

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
    $new_accounting_id = $this->Account_model->AddAccounting($AccountingInput);
    $this->AccountingModel->ConfirmInvoice($new_accounting_id);
  }
}
