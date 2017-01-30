<?php  $var = $AccountingDetail[0]; ?>
<?php //echo "<pre>";print_r($var);exit(); ?>
<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h1>เอกสารการบัญชี</h1>

    </div>
    <div class="row clearfix">
      <div class="col-md-9">
        <div class="card">
          <div class="header">
            <h2><?php echo "เลขที่บัญชี ".$var['accounting_no']." ".$var['journals_detail'] ?> </h2>
          </div>
          <div class="body">
            <div class="row">
              <div class="col-md-6">
                <h5>เกี่ยวกับเอกสาร</h5>
                <p>
                  วันที่ : <?php echo $this->thaidate->FullDate($var['accounting_date']); ?><br>
                  ต้นฉบับ : : <?php echo $var['source_code']; ?><br>
                </p>
              </div>
              <div class="col-md-6">
                <h5>ผู้เกี่ยวข้อง</h5>
                <?php echo $var['member']['member_prefix'].$var['member']['member_firstname']." ".$var['member']['member_lastname']; ?>
              </div>
            </div>

            <!-- Load Template ของแต่ละ ตาราง -->
            <?php $this->load->view('back/Accounting/'.$var['source_detail']['Template']); ?>
          </div>

        </div>
      </div>
      <div class="col-md-3">
        <div class="row">
          <div class="card">
            <?php if ($var['accounting_status']==0): ?>
              <div class="body bg-deep-orange">
                <p class="text-center" style="font-size: 50px;">ค้างชำระ</p>
              </div>
            <?php elseif($var['accounting_status']==1): ?>
              <div class="body bg-light-green">
                <p class="text-center" style="font-size: 50px;">ชำระแล้ว</p>
              </div>
            <?php else: ?>
              <div class="body bg-blue-grey">
                <p class="text-center" style="font-size: 50px;">ดำเนินการ</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="card">
            <div class="body">

              <!-- พิมพ์ -->
              <?php $type = $var['journals_id'] ?>
              <?php $status = $var['accounting_status']?>
              <?php if ($status!=0): ?>

                <?php if ($type==1): ?>
                  <a class="btn btn-lg btn-block bg-blue-grey waves-effect" target="_blank" href="<?php echo site_url('SaleOrder/resultFee/'.$var['accounting_id']); ?>">
                    พิมพ์
                  </a>
                <?php elseif ($type==2): ?>
                  <a class="btn btn-lg btn-block bg-blue-grey waves-effect" target="_blank" href="<?php echo site_url('SaleOrder/resultExtend/'.$var['accounting_id']); ?>">
                    พิมพ์
                  </a>
                <?php elseif ($type==3 || $type==4 || $type==5 || $type==6): ?>
                  <a class="btn btn-lg btn-block bg-blue-grey waves-effect" target="_blank" href="<?php echo site_url('SaleOrder/resultDividend/'.$var['accounting_id']); ?>">
                    พิมพ์
                  </a>
                <?php elseif ($type==7): ?>
                  <a class="btn btn-lg btn-block bg-blue-grey waves-effect" target="_blank" href="<?php echo site_url('SaleOrder/resultSaleOrder/'.$var['accounting_id']); ?>">
                    พิมพ์
                  </a>
                <?php endif; ?>

              <?php endif; ?>

              <!-- ชำระ -->
              <?php $type = $var['journals_id'] ?>
              <?php $status = $var['accounting_status']?>
              <?php if ($status!=1): ?>

                  <a class="btn btn-lg btn-block bg-teal waves-effect" href="<?php echo site_url('/Accounting/ConfirmInvoice/'.$var['accounting_id']); ?>">
                    ชำระเงิน
                  </a>

              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php if ($var['journals_id']==7): ?>
          <div class="row">
            <div class="card">
              <div class="header text-center">
                หลักฐานการชำระเงิน
              </div>
              <div class="body">
                <?php if ($var['source_detail'][0]['journal_sale_order_detail_slip']!=''): ?>
                  <img src="<?php echo base_url('assets/image/slip/'.$var['source_detail'][0]['journal_sale_order_detail_slip']); ?>" class="img-rounded img-responsive" >
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>

      </div>
    </div>

  </section>
