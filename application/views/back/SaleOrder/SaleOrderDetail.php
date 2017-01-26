<?php  $var = $AccountingDetail[0]; ?>
<!-- <?php //echo "<pre>";print_r($AccountingDetail);exit(); ?> -->
<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <!-- <h1>เอกสารการบัญชี</h1> -->

    </div>
    <div class="row clearfix">
      <div class="col-md-9">
        <div class="card">
          <div class="header">
            <h2><?php echo "เลขที่บิล ".$var['source_code'] ?> </h2>
          </div>
          <div class="body">
            <div class="row">
              <div class="col-md-6">
                <h5>เกี่ยวกับเอกสาร</h5>
                <p>
                  วันที่ : <?php echo $this->thaidate->FullDate($var['accounting_date']); ?><br>
                  เลขที่บัญชี : : <?php echo $var['accounting_no']; ?><br>
                  บัญชี : <?php echo $var['journals_detail'] ?>
                </p>
              </div>
              <div class="col-md-6">
                <h5>ผู้เกี่ยวข้อง</h5>
                <?php echo $var['member']['member_prefix'].$var['member']['member_firstname']." ".$var['member']['member_lastname']; ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped">
                  <thead>

                    <tr>
                      <th>#</th>
                      <th>รายการ</th>
                      <th>ชื่อสินค้า</th>
                      <th class="text-right">จำนวน</th>
                      <th class="text-right">ราคาต่อหน่วย</th>
                      <th class="text-right">ยอดรวม</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $i=1; foreach ($var['source_detail']['order_item'] as $row): ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $var['journals_detail'] ?></td>
                      <td><?php echo $row['products_name'] ?></td>
                      <td class="text-right"><?php echo number_format($row['journal_sale_order_item_quantity']) ?></td>
                      <td class="text-right"><?php echo number_format($row['journal_sale_order_item_price']) ?> </td>
                      <td class="text-right"><?php echo number_format($row['journal_sale_order_item_quantity']*$row['journal_sale_order_item_price']) ?></td>
                    </tr>

                    <?php $i++; endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 text-right">

              </div>
              <div class="col-md-6 text-right">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>ราคา</td>
                      <td><?php echo $var['source_amount']?></td>
                      <td>บาท</td>
                    </tr>
                    <tr>
                      <td>ภาษี(7%)</td>
                      <td>ไม่มี</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>ราคาสุทธิ</td>
                      <td><?php echo $var['source_amount']?></td>
                      <td>บาท</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
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
              <?php if ($var['accounting_status']!=1): ?>
              <a class="btn btn-lg btn-block bg-teal waves-effect" href="<?php echo site_url('/Accounting/ConfirmInvoice/'.$var['accounting_id']); ?>">
                ชำระเงิน
              </a>
              <?php endif; ?>
              <a class="btn btn-lg btn-block bg-blue-grey waves-effect " target="_blank" href="<?php echo site_url('SaleOrder/resultSale/'.$var['source_detail'][0]['journal_sale_order_detail_id']); ?>">
                พิมพ์
              </a>
            </div>
          </div>
        </div>
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
      </div>
    </div>

  </section>
