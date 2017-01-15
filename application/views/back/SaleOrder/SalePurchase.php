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
                <div class="col-sm-3">
                  <img src="<?php echo base_url('assets/image/'.$Config[0]['mlm_config_logo'])?>" width="100" height="100" alt=""/>
                </div>
                <div class="col-sm-9" style="padding-top: 20px;">
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
                  <div class="col-md-3 col-sm-3"><strong>ชื่อผู้เกี่ยวข้อง</strong><br>
                  </div>
                  <div class="col-md-8 col-sm-8"><?php echo $Accounting[0]['member_prefix'].$Accounting[0]['member_firstname']." &nbsp;".$Accounting[0]['member_lastname'] ?><br>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4" style="margin-bottom:20px">
            <p class="text-center" id="border"><strong style="font-size:32px"><br>
              ใบเสร็จรับเงิน</strong></br>
              <strong><br>
                เลขที่ <?php echo "IN".sprintf("%05d", $Accounting[0]['accounting_id']); ?></strong><br>
                <strong>วันที่</strong><?php echo $this->thaidate->FullDate($Accounting[0]['accounting_date']) ?> </p>
              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12 table-responsive col-sm-12">
            <table width="100%" class="table invoice">
              <thead>
                <tr class="danger">
                  <th style="font-size:16px" class="text-center" width="10%">ลำดับ</th>
                  <th style="font-size:16px">รายการ</th>
                  <th style="font-size:16px" class="text-right" width="15%">ยอดเงิน</th>


                </tr>
              </thead>
              <tbody>
                <?php $item=1; $amount=0; foreach ($Accounting as $row): ?>
                  <tr >
                    <td style="font-size:14px"class="text-center" scope="row"><?php echo $item; ?></td>
                    <td style="font-size:14px">
                        <?php if ($row['accounting_system_note']!=''): ?>
                          <?php echo $row['accounting_system_note']; ?>
                          <?php else: ?>
                          <?php echo $row['journals_name']; ?>
                        <?php endif; ?>
                    </td>
                    <td style="font-size:14px" class="text-right"><?php echo number_format($row['accounting_amount']) ?></td>
                  </tr>
                  <?php $item++; $amount += ($row['accounting_amount']);
                                endforeach; ?>

                        <?php if (count($Accounting)<15): ?>
                          <?php
                          $row = 15 - count($Accounting);
                          for ($i=0; $i < $row; $i++) { ?>
                            <tr>
                              <td><span class="empty"></span></td>
                              <td></td>
                              <td></td>

                            </tr>
                            <?php } ?>
                          <?php endif; ?>
                          <!-- <tr>
                            <td></td>
                            <td>ราคาสุทธิ</td>
                            <td><?php echo $amount; ?> บาท</td>
                          </tr> -->
                </tbody>
              </table>
            </div>
            <div class="col-md-2 col-sm-offset-8 col-sm-2"><b>ราคาสุทธิ</div>
                <div class="col-md-2 col-sm-2"><?php echo $amount; ?> บาท</b></div>
            </div>
          </div>

          <div class="row" style="margin-top:50px">
            <div class="col-sm-6">
              <div class="row text-center">
                <div class="col-sm-12">ลงชื่อ................................................................เจ้าหน้าที่</div>
                <div class="col-sm-12">(.....................................................................)</div>
                <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row text-center">
                <div class="col-sm-12">ลงชื่อ..................................................................ผู้รับเงิน</div>
                <div class="col-sm-12">(.....................................................................)</div>
                <div class="col-sm-12">วันที่…...…เดือน……………..พ.ศ…………</div>
              </div>
            </div>
          </div>
        </div>
      </page>
    </div>
