<?php $var = $AccountingDetail[0]; ?>
<div class="row" style="    position: fixed;
right: 5%;
top: 0%;">
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ' style="margin-top:20px">
  <form class='form-group'>

    <button type='button' class='btn btn-lg btn-primary no-print' onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

  </form>

</div>
</div>

<div class='row '> </div>
<div class='row '>
  <page size="A4" style="color: #000;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-8">
              <div class="row">
                <div class="col-sm-4">
                  <img src="<?php echo base_url('assets/image/'.$Config[0]['mlm_config_logo'])?>" class="img-responsive" alt=""/>
                </div>
                <div class="col-sm-8" style="padding-top: 20px;">
                  <h3 class="text-center">บริษัท นว ดรากอน จำกัด</h3>
                </p>
              </div>

              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2 col-sm-2"><strong>ที่อยู่</strong><br>
                  </div>
                  <div class="col-md-10 col-sm-10"><?php echo $Config[0]['mlm_config_address'] ?>
                  </div>
                  <div class="col-md-8 col-sm-8"><strong>เบอร์ติดต่อ</strong> <?php echo $Config[0]['mlm_config_tel'] ?>
                  </div>
                  <div class="col-sm-12 col-md-12"><strong>&nbsp;</strong><br>
                  </div>
                  <div class="col-md-3 col-sm-3"><strong>ชื่อผู้สั่งซื้อ</strong><br>
                  </div>
                  <div class="col-md-6 col-sm-6"><?php echo $var['member']['member_prefix'].$var['member']['member_firstname']." ".$var['member']['member_lastname']; ?><br>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4" style="margin-bottom:20px">
            <p class="text-center" id="border"><strong style="font-size:32px"><br>
              ใบสั่งซื้อ</strong></br>
              <strong><br>
                เลขที่ <?php echo $var['accounting_no'] ?></strong><br>
                <strong>วันที่สั่งซื้อ</strong> <?php echo $this->thaidate->FullDate($var['accounting_date']); ?> </p>
              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12 table-responsive col-sm-12">
            <table width="100%" class="table invoice">
              <thead>
                <tr class="danger">
                  <th class="text-center" width="5%">ลำดับ</th>
                  <th width="10%">รหัสสินค้า</th>
                  <th>ชื่อสินค้า</th>
                  <th class="text-right" width="5%">จำนวน</th>
                  <th class="text-right" width="15%">ราคาต่อหน่วย</th>
                  <th class="text-right" width="15%">ราคารวม</th>


                </tr>
              </thead>
              <tbody>
                <?php $item=1; $amount=0; foreach ($AccountingDetail[0]['source_detail']['order_item'] as $row): ?>
                  <tr >
                    <td class="text-center" scope="row"><?php echo $item; ?></td>
                    <td><?php echo $row['products_code']; ?></td>
                    <td><?php echo $row['products_name']; ?></td>
                    <td class="text-right"><?php echo number_format($row['journal_sale_order_item_quantity']) ?></td>
                    <td class="text-right"><?php echo number_format($row['journal_sale_order_item_price']) ?></td>
                    <td class="text-right"><?php echo number_format($row['journal_sale_order_item_price']*$row['journal_sale_order_item_quantity']) ?></td>
                    <!-- <td class="text-right"><?php //echo $PurchaseOrder['material_po_quantity']; ?> <?php //echo $PurchaseOrder['material_unit']; ?></td> -->

                  </tr>
                  <?php $item++; $amount += ($row['journal_sale_order_item_price']*$row['journal_sale_order_item_quantity']); endforeach; ?>

                        <?php if (count($AccountingDetail)<10): ?>
                          <?php
                          $row = 10 - count($AccountingDetail);
                          for ($i=0; $i < $row; $i++) { ?>
                            <tr>
                              <td><span class="empty"></span></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>

                            </tr>
                            <?php } ?>
                          <?php endif; ?>
                </tbody>
              </table>
            </div>
            <div class="col-md-2 col-sm-offset-8 col-sm-2"><b>ราคาสุทธิ</div>
                <div class="col-md-2 col-sm-2"><?php echo $var['source_amount']; ?> บาท</b></div>
            </div>
          </div>

          <div class="row" style="margin-top:50px">
            <div class="col-sm-6">
              <div class="row text-center">
                <div class="col-sm-12">ลงชื่อ................................................................ผู้รับเงิน</div>
                <div class="col-sm-12">(.....................................................................)</div>
                <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row text-center">
                <div class="col-sm-12">ลงชื่อ..................................................................ผู้สั่งซื้อ</div>
                <div class="col-sm-12">(.....................................................................)</div>
                <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              </div>
            </div>
          </div>

          <div class="col-sm-12" style="margin-top:50px">
            <div class="row">
              <div class="col-md-12 col-sm-12" style="overflow-wrap:break-word;"><?php echo $Config[0]['shop_config'] ?>
              </div>
            </div>
          </div>

          </div>
        </div>
      </page>
    </div>
